<?php
session_start();
require_once('../inc/Users.class.php');

$user = new Users();

$userDataArray = array();

$userErrorArray = array();
// load user if we have it
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0) {
    $user->load($_REQUEST['user_id']);
    $userDataArray = $user->data;
}

if (isset($_POST['cancel']))
{
    header("location: user-list.php");
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
            $user->saveImage($_FILES['profileImage']);
            header("location: user-list.php");
            exit;
        } 
        else 
        {
            $userErrorArray[] = "Save failed";
        }
    } 
    else 
    {
        $userErrorArray = $user->errors;
        $userDataArray = $user->data;
    }

}
require_once('../tpl/user-edit.tpl.php');

?>

