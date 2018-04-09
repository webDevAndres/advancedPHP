<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article edit</title>
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
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">

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
        <br><br>
        file: <input type="file" name="profileImage"/>
            <br>
        <input type="hidden" name="user_id" value="<?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : '');?>">
        <br>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</body>

</html>