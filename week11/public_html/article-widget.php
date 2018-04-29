<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new newsArticles();

$articleList = $newsArticle->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : "articleDate"),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : "desc"),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

// var_dump($articleList);

    $articleList = array_slice($articleList, 0, ((isset($_GET['numberofArticles']) ? $_GET['numberofArticles'] : 5)));


include('../tpl/article-widget.tpl.php');

?>