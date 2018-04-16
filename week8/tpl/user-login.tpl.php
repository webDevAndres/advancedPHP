
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user login</title>
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
    <p>Guest password and username: guest</p>
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

        <input type="text" name="password" value="<?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : '');?>">
        <br>

        <input type="submit" name="login" value="Login">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</body>

</html>