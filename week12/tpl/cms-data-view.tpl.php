<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" value="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($cmsDataArray['page_title']) ? $cmsDataArray['page_title'] : ''); ?></title>

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


        <h1><?php echo (isset($cmsDataArray['header']) ? $cmsDataArray['header'] : '') ?></h1>
        <div>
            <?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?>
        </div>
    </body>
</html>