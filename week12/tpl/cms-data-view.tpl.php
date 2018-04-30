<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" value="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo (isset($cmsDataArray['page_title']) ? $cmsDataArray['page_title'] : ''); ?>
    </title>

    <style>
        body {
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: .95;
            height: 100vh;
            text-align: center;
        }

        ul {
            list-style-type:none;
        }
    </style>

</head>

<body>
    <?php if (file_exists(dirname(__FILE__) . "/../public_html/images/cms_data_" . $cmsDataArray['cms_data_id'] . ".jpg"))
        { ?>
    <div id="banner">
        <img src="images/cms_data_<?php echo $cmsDataArray['cms_data_id'] . ".jpg "; ?>" width="300" />
    </div>
    <?php }?>

    <h1>
        <?php echo (isset($cmsDataArray['header']) ? $cmsDataArray['header'] : '') ?>
    </h1>
    <div>
        <?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?>
    </div>
    <!-- weather widget -->
    <div class="weatherWidget">
        <h2>Weather</h2>
        <?php
    for ($x = 0; $x<= 1; $x++) 
    {
    echo 'Day: ' . $weatherWidget['Days'][$x]['date'] .' Max temp: ' . $weatherWidget['Days'][$x]['temp_max_f'] . ' ' .$weatherWidget['Days'][$x]['Timeframes'][$x]['wx_desc'] . '<br>';
    }
    ?>
    </div>
    <div>
        <!-- article Widget -->
        <h2>News Articles</h2>
        <ul>
            <?php foreach($articleList as $articleData)
{?>
            <li>
                <a href="">
                    <?php echo $articleData['articleTitle']; ?> -
                    <?php echo $articleData['articleDate']; ?>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>
</body>

</html>