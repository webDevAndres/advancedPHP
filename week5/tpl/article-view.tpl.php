<html>
    <body>
    <p>Return <a href="article-list.php">to article list</a></p>
        title: <?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?><br>
        content: <?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?><br>
        author: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?><br>
        date: <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?><br>
    </body>
</html>