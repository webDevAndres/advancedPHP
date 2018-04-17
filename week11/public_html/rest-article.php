<?php 
require_once '../inc/NewsArticles.class.php';

$newsArticles = new NewsArticles();

$newsArticleData = "";
$newsArticleList="";

if(isset($_GET['articleID']) && $_GET['articleID'] > 0)
{
    if ($newsArticles->load($_GET['articleID']))
    {
        $newsArticleData = $newsArticles->data;

        $newsArticleData = json_encode($newsArticleData);
    }
    echo $newsArticleData;
}
else {
    $newsArticleList = $newsArticles->getList(
        null, null,
        (isset($_GET['filter_Column'])  && isset($_GET['filter_Text']) ? $_GET['filter_Column'] : null),
        (isset($_GET['filter_text'])  && isset($_GET['filter_Text']) ? $_GET['filter_Column'] : null)
    );
    
    
    if(is_array($newsArticleList))
    {
        $newsArticleList = json_encode($newsArticleList);
    }
    
        echo $newsArticleList;
}

// web service to pull a list of articles





?>