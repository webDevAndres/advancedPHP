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
       
        $_SESSION["user_id"] = $userID;
        header('location: user-list.php');
    }
    else
    {
        echo "username and password not found";
    }
}
require_once('../tpl/user-login.tpl.php');
?>