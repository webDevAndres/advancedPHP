<?php
session_start();	//provide access to the current session

$_SESSION['user_id'] ='';
session_unset();	//remove all session variables related to current session
session_destroy();	//remove current session

header('Location: user-login.php');


?>