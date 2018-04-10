<?php 
require_once '../inc/Users.class.php';

$Users = new Users();

$userData = "";
$userDataList="";

if(isset($_GET['user_id']) && $_GET['user_id'] > 0)
{
    if ($Users->load($_GET['user_id']))
    {
        $userData = $Users->data;

        $userData = json_encode($userData);
    }
    echo $userData;
}
else {
    $userDataList = $Users->getList(
        null, null,
        (isset($_GET['filter_Column'])  && isset($_GET['filter_Text']) ? $_GET['filter_Column'] : null),
        (isset($_GET['filter_text'])  && isset($_GET['filter_Text']) ? $_GET['filter_Column'] : null)
    );
    
    
    if(is_array($userDataList))
    {
        $userDataList = json_encode($userDataList);
    }
    
        echo $userDataList;
}

// web service to pull a list of articles





?>