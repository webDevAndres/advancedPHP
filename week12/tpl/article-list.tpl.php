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
        <h2>News Articles</h2>
    </header>



    <p>
        <a href="article-edit.php" ?>Add new article</a>
    </p>

    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
        <label for="filterColumn">Search</label>
        <select name="filterColumn">
            <option value="articleTitle">Article Title</option>
            <option value="articleAuthor">Article Author</option>
            <option value="articleDate">Article Date</option>
            <option value="articleContent">Article Content</option>
            &nbsp;
            <input type="text" name="filterText"> &nbsp;
            <input type="submit" name="filter" value="Search">
        </select>

    </form>

    <table>

        <tr>
            <th>Article Title&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC">D</a>
            </th>
            <th>Article Author&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a>
            </th>
            <th>Article Date&nbsp;-&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC">A</a>&nbsp;
                <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=DESC">D</a>
            </th>
            <th colspan="2">Options</th>

        </tr>

        <?php foreach ($articleList as $articleData) 
        { ?>
        <tr>
            <td>
                <?php echo $articleData['articleTitle'];?>
            </td>
            <td>
                <?php echo $articleData['articleAuthor'];?>
            </td>
            <td>
                <?php echo $articleData['articleDate'];?>
            </td>

            <td class="button">
                <a href="article-edit.php?articleID=<?php echo $articleData['articleID'];?>">Edit</a>
            </td>
            <td class="button">
                <a href="article-view.php?articleID=<?php echo $articleData['articleID'];?>">View</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>