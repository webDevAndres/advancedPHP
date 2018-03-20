<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

    <label for="">Title</label>
    <?php if(isset($articleErrorsArray['articleTitle'])) 
    {?>

<div><?php echo $articleErrorsArray['articleTitle']?></div>

    <?php } ?>

    <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : '');?>"> <br>


    <label for="content">Content</label>
    <?php if(isset($articleErrorsArray['articleContent'])) 
    {?>

<div><?php echo $articleErrorsArray['articleContent']?></div>

    <?php } ?>
    <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : '');?></textarea><br>


    <label for="">Author</label>
    <?php if(isset($articleErrorsArray['articleAuthor'])) 
    {?>

<div><?php echo $articleErrorsArray['articleAuthor']?></div>

    <?php } ?>
    <input type="articleAuthor" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : '');?>"><br>


    <label for="">Date</label>
    <?php if(isset($articleErrorsArray['articleDate'])) 
    {?>

<div><?php echo $articleErrorsArray['articleDate']?></div>

    <?php } ?>
    <input type="articleDate" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : '');?>"><br>

    <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : '');?>"><br>

    <input type="submit" name="save" value="Save">
    <input type="submit" name="cancel" value="Cancel">
    </form>
</body>
</html>