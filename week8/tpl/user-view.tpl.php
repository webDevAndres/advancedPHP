<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article view</title>
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
    <p><a href="user-edit.php?user_id=<?php echo $userDataArray['user_id'];?>">edit user</a></p>
    <p><a href="user-list.php">user list</a></p>
        Username: <?php echo (isset($userDataArray['userName']) ? $userDataArray['userName'] : ''); ?><br>
        user_level <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
        
    </body>
</html>