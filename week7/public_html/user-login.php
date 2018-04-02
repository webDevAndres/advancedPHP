<?php 
session_start();
require_once('../inc/Users.class.php');

$user = new Users();

$userDataArray = array();

$userErrorArray = array();

if (isset($_REQUEST['login']))
{
    $userDataArray = $_POST;

    $user->sanitize($userDataArray);
    $user->set($userDataArray);

    $userID = $user ->checkLogin($userDataArray['userName'], $userDataArray['password']);

    if($userID)
    {
        // echo "user ID matches a username and password";
        $_SESSION["userID"] = $userID;
        header('location: user-edit.php');
    }
    else
    {
        echo "username and password not found";
    }
}
require_once('../tpl/user-login.tpl.php');
?>