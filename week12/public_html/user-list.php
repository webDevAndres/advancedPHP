<?php 
require_once('../inc/Users.class.php');

$user = new Users();

$userList = $user->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

    
$curlSession = curl_init();

if($curlSession)
{
    // weather api
    $url = "http://api.weatherunlocked.com/api/forecast/51.50,-0.12?app_id=4d027a5f&app_key=180f2565ad758dc4d93995e8bdb37719";
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curlSession, CURLOPT_HTTPHEADER, array('Content-type: application/json'));

    $weatherWidget = curl_exec($curlSession);

    curl_close($curlSession);

    $weatherWidget = json_decode($weatherWidget,true);
   

    
}

require_once('../tpl/user-list.tpl.php');
?>
