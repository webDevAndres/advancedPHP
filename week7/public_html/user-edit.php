<?php
session_start();
require_once '../inc/Users.class.php';

$user = new Users();

$userDataArray = array();

$userErrorArray = array();

$_REQUEST['user_id'] =  $_SESSION["userID"];

// load article if we have it
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0) {
    $user->load($_REQUEST['user_id']);
    $userDataArray = $user->userData;
}

if (isset($_POST['cancel']))
{
    header("location: article-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['save'])) {
    $userDataArray = $_POST;
    //sanitize

    $userDataArray = $user->sanitize($userDataArray);
    $user->set($userDataArray);
    //validate
    if ($user->validate()) 
    {
        //  save
        if ($user->save()) 
        {
            header("location: article-save-success.php");
            exit;
        } 
        else 
        {
            $userErrorArray[] = "Save failed";
            echo "FAILED FAILED FAILED";
        }
    } 
    else 
    {
        $userErrorArray = $user->errors;
        $userDataArray = $user->userData;
    }

}
require_once('../tpl/user-edit.tpl.php');

?>

