<?php
require_once '../inc/NewsArticles.class.php';

$newsArticle = new NewsArticles();

$articleDataArray = array();

// load article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}

if (isset($_POST['cancel']))
{
    header("location: article-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['save'])) {
    $articleDataArray = $_POST;
    //sanitize

    $articleDataArray = $newsArticle->sanitize($articleDataArray);
    $newsArticle->set($articleDataArray);
    //validate
    if ($newsArticle->validate()) 
    {
        //  save
        if ($newsArticle->save()) 
        {
            header("location: article-save-success.php");
            exit;
        } 
        else 
        {
            $articleErrorsArray[] = "Save failed";
        }
    } 
    else 
    {
        $articleErrorsArray = $newsArticle->errors;
        $articleDataArray = $newsArticle->articleData;
    }

}
require_once('../tpl/article-edit.tpl.php');

?>