<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
 $newsArticle->load(1);

// $article = array(
//     "articleID" => "",
//     "articleTitle" => "Test article 2",
//     "articleContent" => "content",
//     "articleAuthor" => "Andres",
//     "articleDate" => "2018-03-05"
// );

// $newsArticle->set($article);

// var_dump($newsArticle->articleData);

// var_dump($newsArticle->save());

// var_dump($newsArticle->articleData);

$newsArticle->articleData['articleTitle'] = "Test Article 3a";

// var_dump($newsArticle->save());

// var_dump($newsArticle);

?>