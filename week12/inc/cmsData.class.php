<?php
require_once('Base.class.php');

class cmsData extends Base {

    function __construct()
    {
        // still run parent functionality
       parent::__construct();

       $this->tableName = "cms_data";
       $this->keyField = "cms_data_id";
       $this->columnNames = array( "page_title", "keywords", "header", "content","url_key");
    }


     function sanitize($dataArray)
    {
        //sanitize the data based on rules
        //  $dataArray['articleTitle'] = filter_var($dataArray['articleTitle'], FILTER_SANITIZE_STRING);
        // $dataArray['articleContent'] = filter_var($dataArray['articleContent'], FILTER_SANITIZE_STRING);
        // $dataArray['articleAuthor'] = filter_var($dataArray['articleAuthor'], FILTER_SANITIZE_STRING);
        // $dataArray['articleDate'] = filter_var($dataArray['articleDate'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }

    function validate()
    {
        $isValid = false;

        // if an error, store to errors array using column name as key

        //validate the data elements and article data property
        // if (empty($this->data['articleTitle'])) {
        //     $this->errors['articleTitle'] = "Please enter a title";
        // }
        // if (empty($this->data['articleContent'])) {
        //     $this->errors['articleContent'] = "Please enter Content";
        // }
        // if (empty($this->data['articleAuthor'])) {
        //     $this->errors['articleAuthor'] = "Please enter an Author";
        // } 
        
        // $year = substr($this->data['articleDate'], 0, 4);
        // $month = substr($this->data['articleDate'], 5,2);
        // $day = substr($this->data['articleDate'], 8,2);

        // if (empty($this->data['articleDate'])) {
        //     $this->errors['articleDate'] = "Please enter a Date";
        // }
        // elseif (!checkdate($month,$day,$year)) {
        //     $this->errors['articleDate'] = "Enter a valid date (yyyy-mm-dd)";
            
        // }

        // if(empty($this->errors)){
        //     $isValid = true;
        // }
        return $isValid;
    }

    function saveImage($imageFileData)
    {
        move_uploaded_file 
        (
            $imageFileData['tmp_name'], dirname(__FILE__) . "../public_html/images/cmsData_" . $this->data[$this->keyField] . ".jpg"
        );
    }


}

?>