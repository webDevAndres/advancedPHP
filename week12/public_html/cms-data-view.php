<?php
require_once('../inc/cmsData.class.php');
require_once('../inc/NewsArticles.class.php');

$cmsData = new cmsData();
$newsArticle = new newsArticles();

$cmsDataArray = array();

$articleList = $newsArticle->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : "articleDate"),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : "desc"),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

// load the content if we have it
if (isset($_REQUEST['cms_url_key'])) {
    $cms_data_id = $cmsData->loadFromUrlKey($_REQUEST['cms_url_key']);
    $cmsData->load($cms_data_id['cms_data_id']);
    $cmsDataArray = $cmsData->data;
    
}
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

$articleList = array_slice($articleList, 0, ((isset($_GET['numberofArticles']) ? $_GET['numberofArticles'] : 5)));

require_once('../tpl/cms-data-view.tpl.php');
?>
