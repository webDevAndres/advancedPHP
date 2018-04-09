<?php
require_once('Base.class.php');

class Users extends Base
{
     function __construct()
    {
      // still run parent functionality
      parent::__construct();
        
      $this->tableName = "users";
      $this->keyField = "user_id";
      $this->columnNames = array
      (
         "userName",
         "password",
         "user_level"            
      );
    }


     function sanitize($dataArray)
    {
        //sanitize the data based on rules
        $dataArray['userName'] = filter_var($dataArray['userName'], FILTER_SANITIZE_STRING);
        $dataArray['password'] = filter_var($dataArray['password'], FILTER_SANITIZE_STRING);

        if (isset($dataArray['user_level']))
        {
            $this->$dataArray['user_level'] = filter_var($dataArray['user_level'], FILTER_SANITIZE_STRING);
        }
        

        return $dataArray;
    }

    function validate()
    {
        $isValid = false;

        // if an error, store to errors using column name as key

        //validate the data elements and article data property
        if (empty($this->data['userName'])) {
            $this->errors['userName'] = "Please enter a username";
        }
        if (empty($this->data['password'])) {
            $this->errors['password'] = "Please enter a password";
        }
        if (empty($this->data['user_level'])) {
            $this->errors['user_level'] = "Please enter a user level";
        } 

        if(empty($this->errors)){
            $isValid = true;
        }
        return $isValid;
    }



    function checkLogin ($userName, $password) 
    {
        $checkUserID = null;
        $sql = "SELECT " . $this->keyField . " FROM " . $this->tableName . " WHERE userName = ? && password = ?";
       
        $stmt = $this->db->prepare($sql);

            $stmt->execute(array($userName, $password));
          
            $checkUserID = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($checkUserID == false) 
            {
                $this->errors['password'] = "password doesn't match username";
            }

            else 
            {
                $checkUserID = $checkUserID['user_id'];
               
            }

            return $checkUserID;
    }
}

class Users2
{
    // using var is the same as public
    public $userData = array();
    public $errors = array();

    public $db = null;

     function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'wdv441', 'wdv441');
    }

     function set($dataArray)
    {
        $this->userData = $dataArray;
    }

     function sanitize($dataArray)
    {
        //sanitize the data based on rules
        $dataArray['userName'] = filter_var($dataArray['userName'], FILTER_SANITIZE_STRING);
        $dataArray['password'] = filter_var($dataArray['password'], FILTER_SANITIZE_STRING);

        if (isset($dataArray['user_level']))
        {
            $this->$dataArray['user_level'] = filter_var($dataArray['user_level'], FILTER_SANITIZE_STRING);
        }
        

        return $dataArray;
    }

     function load($user_id)
    {

        $isLoaded = false;
        //load info from database
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id=?");
        $stmt->execute(array($user_id));

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
        
        // determine if insert or update based on user_id
        // save data from userData property to database
        if (empty($this->userData['user_id']))
        {
            $stmt = $this->db->prepare(
                "INSERT INTO users 
                    (userName, password, user_level) 
                 VALUES (?, ?, ?)");
               
            $isSaved = $stmt->execute(array(
                    $this->userData['userName'],
                    $this->userData['password'],
                    $this->userData['user_level']
                )
            );
            
            if ($isSaved) 
            {
                $this->userData['user_id'] = $this->db->lastInsertId();
            }
        } 
        else 
        {
            $stmt = $this->db->prepare(
                "UPDATE users SET 
                    userName = ?,
                    password = ?,
                    user_level = ?
                WHERE user_id = ?"
            );
                    
            $isSaved = $stmt->execute(array(
                    $this->userData['userName'],
                    $this->userData['password'],
                    $this->userData['user_level'],
                    $this->userData['user_id']
                )
            );            
        }
                        
        return $isSaved;
    }



     function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $articleList = array();
        $sql = "SELECT * FROM Users ";

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

    function checkLogin ($userName, $password) 
    {
        $user_id = "";
        $stmt = $this->db->prepare(
            "SELECT user_id FROM users
            WHERE userName = ? && password = ?");

            $stmt->execute(array($userName, $password));
            $checkUserID = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($checkUserID == false) 
            {
                $this->errors['password'] = "password doesn't match username";
            }

            else 
            {
                $checkUserID = $checkUserID['user_id'];
            }

            return $checkUserID;
    }
}
?>