<?php 
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleList = $newsArticle->getList();

// var_dump($articleList);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article List</title>

    <style>
        body {
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: .95;
            height: 100vh;
        }

        table {
            background-color: white;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 15px;
        }

        th {
            text-align: left;
        }

        table {
            border-spacing: 5px;
            margin: auto;
        }

        header {
            text-align: center;
            font-size: 2em;
        }

        td a {
            text-decoration:none;
            font-size: 20px;
        }

        .button {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <h2>Articles</h2>
    </header>

<table>
<tr >
    <td class="button"><a href="article-edit.php"?>Add new article</a></td>
</tr>

</table>

    <table>

        <tr>
            <th>Article Title</th>
            <th>Article Content</th>
            <th>Article Author</th>
            <th>Article Date</th>
            <th colspan="2">Options</th>
            
        </tr>

        <?php foreach ($articleList as $articleInfo) { ?>
        <tr>
            <td>
                <?php echo $articleInfo['articleTitle'];?>
            </td>
            <td>
                <?php echo $articleInfo['articleContent'];?>
            </td>
            <td>
                <?php echo $articleInfo['articleAuthor'];?>
            </td>
            <td>
                <?php echo $articleInfo['articleDate'];?>
            </td>

            <td class="button">
                <a href="article-edit.php?articleID=<?php echo $articleInfo['articleID'];?>">Edit</a>
            </td>
            <td class="button">
                <a href="article-view.php?articleID=<?php echo $articleInfo['articleID'];?>">View</a>
            </td>       
        </tr>

        <?php } ?>
    </table>

</body>

</html>