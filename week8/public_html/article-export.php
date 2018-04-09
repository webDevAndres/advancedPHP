<?php
require_once('../inc/NewsArticles.class.php');

$articles = new NewsArticles();
$articles->export("newsarticles.csv");



?>