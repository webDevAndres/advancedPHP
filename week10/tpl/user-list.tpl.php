<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>article List</title>

    <style>
        body {
            background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            opacity: .95;
            height: 100vh;
            text-align: center;
        }

        table {
            background-color: white;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 15px;
        }

        table {
            border-spacing: 5px;
            margin: auto;
        }

        header {
            font-size: 2em;
        }

        td a {
            text-decoration: none;
            font-size: 20px;
        }

        .button {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <h2>Users</h2>
    </header>
    
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
        <label for="filterColumn">Search</label>
        <select name="filterColumn">
            <option value="userName">Username</option>
            <option value="user_level">User level</option>
            &nbsp;
            <input type="text" name="filterText"> &nbsp;
            <input type="submit" name="filter" value="Search">
        </select>

    </form>

    <table>

        <tr>
            <th>Username&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userName&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userName&sortDirection=DESC">D</a>
            </th>
            <th>user_level&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=DESC">D</a>
            </th>
            <th colspan="2">Options</th>

        </tr>

        <?php foreach ($userList as $userData) 
        { ?>
        <tr>
            <td>
                <?php echo $userData['userName'];?>
            </td>
            <td>
                <?php echo $userData['user_level'];?>
            </td>

            <td class="button">
                <a href="user-edit.php?user_id=<?php echo $userData['user_id'];?>">Edit</a>
            </td>
            <td class="button">
                <a href="user-view.php?user_id=<?php echo $userData['user_id'];?>">view</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>