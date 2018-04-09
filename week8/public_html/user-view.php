<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-view.php?$user_id=1
require_once('../inc/Users.class.php');

$user = new Users();

$userDataArray = array();

// load the user if we have it
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0) 
{
    $user->load($_REQUEST['user_id']);
    $userDataArray = $user->data;
}
require_once('../tpl/user-view.tpl.php');
?>