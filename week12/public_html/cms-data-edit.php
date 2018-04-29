<?php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();
$cmsErrorsArray = array();

// load cms if we have it
if (isset($_REQUEST['cms_data_id']) && $_REQUEST['cms_data_id'] > 0) {
    $cmsData->load($_REQUEST['cms_data_id']);
    $cmsDataArray = $cmsData->data;
}

if (isset($_POST['cancel']))
{
    header("location: cms-data-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['save'])) {
    $cmsDataArray = $_POST;
    //sanitize
    $cmsDataArray = $cmsData->sanitize($cmsDataArray);
    $cmsData->set($cmsDataArray);
    //validate
    if ($cmsData->validate()) 
    {
        //  save
        if ($cmsData->save()) 
        {
            $cmsData->saveImage($_FILES['cms_data_image']);

            header("location: cms-data-save-success.php");
            exit;
        } 
        else 
        {
            $cmsErrorsArray[] = "Save failed";
        }
    } 
    else 
    {
        $cmsErrorsArray = $cmsData->errors;
        $cmsDataArray = $cmsData->data;
    }

}
require_once('../tpl/cms-data-edit.tpl.php');

?>