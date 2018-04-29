<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-view.php?articleID=1
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();

// load the article if we have it
if (isset($_REQUEST['cms_data_id']) && $_REQUEST['cms_data_id'] > 0) 
{
    $cmsData->load($_REQUEST['cms_data_id']);
    $cmsDataArray = $cmsData->data;
}
require_once('../tpl/article-view.tpl.php');
?>
