<?php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();

// load the content if we have it
if (isset($_REQUEST['cms_url_key'])) {
    $cms_data_id = $cmsData->loadFromUrlKey($_REQUEST['cms_url_key']);
    $cmsData->load($cms_data_id['cms_data_id']);
    $cmsDataArray = $cmsData->data;
    
}
else {
    echo 'Doesnt work';
}

require_once('../tpl/cms-data-view.tpl.php');
?>
