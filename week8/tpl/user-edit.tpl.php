<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user edit</title>
    <style>
        body {
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: .95;
            height: 100vh;
            text-align: center;
        }

        img {
            width: 10%;
            height: auto;
            padding: 5px;
            background-color: white;
            border: 2px solid black;
        }
    </style>

</head>

<body>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
    <label for="profileImage">Profile Image</label><br>
    <?php if (file_exists(dirname(__FILE__) . "/../public_html/images/profile_" . isset($userDataArray['user_id']) . ".jpg"))
    { ?>
        <img src="images/profile_<?php echo $userDataArray['user_id'] . '.jpg'; ?>" alt="profile Image">
           
     <?php } else
    { ?>
        <img src="images/defaultProfile.jpg" alt="profile Image">
       
   <?php } ?> 
        <br>
        <p>Change profile image <input type="file" name="profileImage"/></p>
        <br>
        <br>
        <label for="">user name</label>
        <?php if(isset($userErrorArray['userName'])) 
    {?>

        <div>
            <?php echo $userErrorArray['userName']?>
        </div>

        <?php } ?>

        <input type="text" name="userName" value="<?php echo (isset($userDataArray['userName']) ? $userDataArray['userName'] : '');?>">
        <br>


         <label for="">password</label>
        <?php if(isset($userErrorArray['password'])) 
    {?>

        <div>
            <?php echo $userErrorArray['password']?>
        </div>

        <?php } ?>

        <input type="password" name="password" value="<?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : '');?>">
        <br>

        <label for="">User Level</label>
        <?php if(isset($userErrorArray['user_level'])) 
    {?>

        <div>
            <?php echo $userErrorArray['user_level']?>
        </div>

        <?php } ?>
        <input type="user_level" name="user_level" value="<?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : '');?>">
            <br>
        <input type="hidden" name="user_id" value="<?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : '');?>">
        <br>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</body>

</html>