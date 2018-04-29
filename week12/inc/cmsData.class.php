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
         $dataArray['page_title'] = filter_var($dataArray['page_title'], FILTER_SANITIZE_STRING);
        $dataArray['content'] = filter_var($dataArray['content'], FILTER_SANITIZE_STRING);
        $dataArray['keywords'] = filter_var($dataArray['keywords'], FILTER_SANITIZE_STRING);
        $dataArray['url_key'] = filter_var($dataArray['url_key'], FILTER_SANITIZE_STRING);
        $dataArray['header'] = filter_var($dataArray['header'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }

    function validate()
    {
        $isValid = false;

        // if an error, store to errors array using column name as key

        //validate the data elements and article data property
        if (empty($this->data['page_title'])) {
            $this->errors['page_title'] = "Please enter a title";
        }
        if (empty($this->data['content'])) {
            $this->errors['content'] = "Please enter Content";
        }
        if (empty($this->data['keywords'])) {
            $this->errors['keywords'] = "Please enter some keywords";
        }
        if (empty($this->data['url_key'])) {
            $this->errors['url_key'] = "Please enter a url key";
        } 
        if (empty($this->data['header'])) {
            $this->errors['header'] = "Please enter a header";
        } 
        

        if(empty($this->errors)){
            $isValid = true;
        }
        return $isValid;
    }

    function saveImage($imageFileData)
    {
        move_uploaded_file 
        (
            $imageFileData['tmp_name'], dirname(__FILE__) . "/../public_html/images/cms_data_" . $this->data[$this->keyField] . ".jpg"
        );
    }

    function loadFromUrlKey($url_key)
    {
       
        $isLoaded = false;
        //load info from database
        $stmt = $this->db->prepare("SELECT cms_data_id FROM " . $this->tableName ." WHERE " . $url_key ."=?");
        $stmt->execute(array($url_key));

        if ($stmt->rowCount() == 1) {
            $cms_data_id = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->set($cms_data_id);
            $isLoaded = true;
        }
        return $cms_data_id;
    }
}

?>