<?php
require_once('Base.class.php');

class NewsArticles extends Base
{

     function __construct()
    {
        // still run parent functionality
       parent::__construct();

       $this->tableName = "newsarticles";
       $this->keyField = "articleID";
       $this->columnNames = array( "articleTitle", "articleContent", "articleAuthor", "articleDate");
    }


     function sanitize($dataArray)
    {
        //sanitize the data based on rules
         $dataArray['articleTitle'] = filter_var($dataArray['articleTitle'], FILTER_SANITIZE_STRING);
        $dataArray['articleContent'] = filter_var($dataArray['articleContent'], FILTER_SANITIZE_STRING);
        $dataArray['articleAuthor'] = filter_var($dataArray['articleAuthor'], FILTER_SANITIZE_STRING);
        $dataArray['articleDate'] = filter_var($dataArray['articleDate'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }


     function validate()
    {
        $isValid = false;

        // if an error, store to errors array using column name as key

        //validate the data elements and article data property
        if (empty($this->data['articleTitle'])) {
            $this->errors['articleTitle'] = "Please enter a title";
        }
        if (empty($this->data['articleContent'])) {
            $this->errors['articleContent'] = "Please enter Content";
        }
        if (empty($this->data['articleAuthor'])) {
            $this->errors['articleAuthor'] = "Please enter an Author";
        } 
        
        $year = substr($this->data['articleDate'], 0, 4);
        $month = substr($this->data['articleDate'], 5,2);
        $day = substr($this->data['articleDate'], 8,2);

        if (empty($this->data['articleDate'])) {
            $this->errors['articleDate'] = "Please enter a Date";
        }
        elseif (!checkdate($month,$day,$year)) {
            $this->errors['articleDate'] = "Enter a valid date (yyyy-mm-dd)";
            
        }

        if(empty($this->errors)){
            $isValid = true;
        }
        return $isValid;
    }

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $articleList = array();
        $sql = "SELECT * FROM newsarticles ";

        if(!is_null($filterColumn) && !is_null($filterText))
        {
            $sql .= "WHERE " . $filterColumn . " LIKE ?";
        }

        if(!is_null($sortColumn))
        {
            $sql .= "ORDER BY " . $sortColumn;
            if(!is_null($sortDirection))
            {
                $sql .= " " . $sortDirection;
            }
        }
        
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));
            
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $articleList;
    }

    function export($xportFile) 
    {
        $success = true;

        $fileHandle = fopen($exportFile, "w");

        if($fileHandle)
        {
            $articleList = $this->getList();

            $headerRow = false;
            foreach ($articleList as $articleData)
            {
                if(!$headerRow)
                {
                    fputcsv($fileHandle, array_keys($articleData));
                    $headerRow = true;
                }

                fputcsv($fileHandle, $articleData);
               
            }
            fclose($fileHandle);

        }
        else
        {
            $success = false;
        }
        return $success;
    }

    function import($importFile)
    {
        $success = true;
        
        $fileHandle = fopen($importFile, "r");

        if($fileHandle)
        {
            $headerColumns = array();

            while (!feof($fileHandle))
            {
                $articleData = fgetscv($fileHandle);
                if(empty($headerColumns))
                {
                    $headerColumns = $articleData;
                }
                else
                {
                    if(is_array($articleData))
                    {
                        $articleData = array_combine($headerColumns, $articlceData);

                        $this->set($articleData);
                        $this->save();
                    }
                   
                }
            }

            fclose($fileHandle);

        }
        else
        {
            $success = false;
        }
        return $success;
    }

    function saveImage($imageFileData)
    {
        move_uploaded_file 
        (
            $imageFileData['tmp_name'], dirname(__FILE__) . "../public_html/images/article_" . $this->data[$this->keyField] . ".jpg"
        );
    }
}








class NewsArticles2
{
    // using var is the same as public
    public $articleData = array();
    public $errors = array();

    public $db = null;

     function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'wdv441', 'wdv441');
    }

     function set($dataArray)
    {
        $this->articleData = $dataArray;
    }

     function sanitize($dataArray)
    {
        //sanitize the data based on rules
        // $dataArray['articleTitle'] = filter_var($dataArray['articleTitle'], FILTER_SANITIZE_STRING);
        $dataArray['articleContent'] = filter_var($dataArray['articleContent'], FILTER_SANITIZE_STRING);
        $dataArray['articleAuthor'] = filter_var($dataArray['articleAuthor'], FILTER_SANITIZE_STRING);
        $dataArray['articleDate'] = filter_var($dataArray['articleDate'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }

     function load($articleID)
    {

        $isLoaded = false;
        //load info from database
        $stmt = $this->db->prepare("SELECT * FROM newsarticles WHERE articleID=?");
        $stmt->execute(array($articleID));

        if ($stmt->rowCount() == 1) {
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            // var_dump($dataArray);
            $this->set($dataArray);

            $isLoaded = true;
        }

        // var_dump($stmt->rowCount());

        return $isLoaded;
    }

    function save() 
    {
        $isSaved = false;
        
        // determine if insert or update based on articleID
        // save data from articleData property to database
        if (empty($this->articleData['articleID']))
        {
            $stmt = $this->db->prepare(
                "INSERT INTO newsarticles 
                    (articleTitle, articleContent, articleAuthor, articleDate) 
                 VALUES (?, ?, ?, ?)");
               
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate']
                )
            );
            
            if ($isSaved) 
            {
                $this->articleData['articleID'] = $this->db->lastInsertId();
            }
        } 
        else 
        {
            $stmt = $this->db->prepare(
                "UPDATE newsarticles SET 
                    articleTitle = ?,
                    articleContent = ?,
                    articleAuthor = ?,
                    articleDate = ?
                WHERE articleID = ?"
            );
                    
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate'],
                    $this->articleData['articleID']
                )
            );            
        }
                        
        return $isSaved;
    }

     function validate()
    {
        $isValid = false;

        // if an error, store to errors using column name as key

        //validate the data elements and article data property
        if (empty($this->articleData['articleTitle'])) {
            $this->errors['articleTitle'] = "Please enter Content";
        }
        if (empty($this->articleData['articleContent'])) {
            $this->errors['articleContent'] = "Please enter Content";
        }
        if (empty($this->articleData['articleAuthor'])) {
            $this->errors['articleAuthor'] = "Please enter an Author";
        } 
        
        $year = substr($this->articleData['articleDate'], 0, 4);
        $month = substr($this->articleData['articleDate'], 5,2);
        $day = substr($this->articleData['articleDate'], 8,2);

        if (empty($this->articleData['articleDate'])) {
            $this->errors['articleDate'] = "Please enter a Date";
        }
        elseif (!checkdate($month,$day,$year)) {
            $this->errors['articleDate'] = "Enter a valid date (yyyy-mm-dd)";
            
        }

        if(empty($this->errors)){
            $isValid = true;
        }
        return $isValid;
    }

     function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $articleList = array();
        $sql = "SELECT * FROM newsarticles ";

        if(!is_null($filterColumn) && !is_null($filterText))
        {
            $sql .= "WHERE " . $filterColumn . " LIKE ?";
        }

        if(!is_null($sortColumn))
        {
            $sql .= "ORDER BY " . $sortColumn;
            if(!is_null($sortDirection))
            {
                $sql .= " " . $sortDirection;
            }
        }
        
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));
            
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $articleList;
    }
}
?>