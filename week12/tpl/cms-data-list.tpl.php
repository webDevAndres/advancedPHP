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
        <h2>cms Data List</h2>
    </header>



    <p>
        <a href="cms-data-edit.php" ?>Add new CMS data</a>
    </p>

    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
        <label for="filterColumn">Search</label>
        <select name="filterColumn">
            <option value="page_title">page title</option>
            <option value="header">header</option>
            <option value="url_key">url key</option>
            &nbsp;
            <input type="text" name="filterText"> &nbsp;
            <input type="submit" name="filter" value="Search">
        </select>

    </form>

    <table>

        <tr>
            <th>page title&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=page_title&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=page_title&sortDirection=DESC">D</a>
            </th>
            <th>Header&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=header&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=header&sortDirection=DESC">D</a>
            </th>
            <th>URL Key&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=url_key&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=url_key&sortDirection=DESC">D</a>
            </th>
            <th colspan="2">Options</th>

        </tr>

        <?php foreach ($cmsDataList as $cmsPageData) 
        { ?>
        <tr>
            <td>
                <?php echo $cmsPageData['page_title'];?>
            </td>
            <td>
                <?php echo $cmsPageData['header'];?>
            </td>
            <td>
                <?php echo $cmsPageData['url_key'];?>
            </td>

            <td class="button">
                <a href="cms-data-edit.php?cms_data_id=<?php echo $cmsPageData['cms_data_id'];?>">Edit</a>
            </td>
            <td class="button">
                <a href="cms-data-view.php?cms_data_id=<?php echo $cmsPageData['cms_data_id'];?>">View</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>