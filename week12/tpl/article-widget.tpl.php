<div>
<ul>
<?php foreach($articleList as $articleData)
{?>
    <li><a href=""><?php echo $articleData['articleTitle']; ?> - <?php echo $articleData['articleDate']; ?></a></li>
<?php }?>
</ul>
</div>