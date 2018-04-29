<?php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();
// load the article if we have it
if (isset($_REQUEST['cms_url_key']) && $_REQUEST['cms_url_key'] > 0) 
{
    $cms_data_id = $cms_data->loadFromUrlKey($_REQUEST['cms_url_key']);
    $cmsData->load($cms_data_id);
    $cmsDataArray = $cmsData->data;
}
else {
    echo 'Doesnt work';
}

require_once('../tpl/cms-data-view.tpl.php');
?>
