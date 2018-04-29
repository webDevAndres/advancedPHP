<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cms edit</title>
    <style>
        body {
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: .95;
            height: 100vh;
            text-align: center;
        }
    </style>

</head>

<body>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

        <label for="cms_page_title">Page Title</label>
        <?php if(isset($cmsErrorsArray['page_title'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['page_title']?>
        </div>

        <?php } ?>

        <input type="text" name="cms_page_title" value="<?php echo (isset($cmsDataArray['cms_title']) ? $cmsDataArray['cms_title'] : '');?>">
        <br>


        <label for="content">Content</label>
        <?php if(isset($cmsErrorsArray['content'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['content']?>
        </div>

        <?php } ?>
        <textarea name="cmsContent"><?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : '');?></textarea>
        <br>

        <label for="">Keywords</label>
        <?php if(isset($cmsErrorsArray['keywords'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['keywords']?>
        </div>

        <?php } ?>
        <input type="keywords" name="keywords" value="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : '');?>">
        <br>

        <label for="">url Key</label>
        <?php if(isset($cmsErrorsArray['url_key'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['url_key']?>
        </div>

        <?php } ?>
        <input type="url_key" name="url_key" value="<?php echo (isset($cmsDataArray['url_key']) ? $cmsDataArray['url_key'] : '');?>">
        <br>


        <label for="">Header</label>
        <?php if(isset($cmsErrorsArray['header'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['header']?>
        </div>

        <?php } ?>
        <input type="header" name="header" value="<?php echo (isset($cmsDataArray['header']) ? $cmsDataArray['header'] : '');?>">

         <label for="">cms data image</label>
        <?php if(isset($cmsErrorsArray['cmsDataImage'])) 
    {?>

        <div>
            <?php echo $cmsErrorsArray['cmsDataImage']?>
        </div>

        <?php } ?>
        <input type="cms_data_image" name="cms_data_image" value="<?php echo (isset($cmsDataArray['cms_data_image']) ? $cmsDataArray['cms_data_image'] : '');?>">
        <br>

        <input type="hidden" name="cms_data_id" value="<?php echo (isset($cmsDataArray['cms_data_id']) ? $cmsDataArray['cms_data_id'] : '');?>">
        <br>

        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</body>

</html>