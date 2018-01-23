<?php

function randomNameGenerator () 
    {
        $names = array("Tom","Cindy","Alex","Sam","Carry","Drew","Richard","Bart","Lenny","Marge");
        $randomNumber = rand(0,20);
    if ($randomNumber <= 9) 
        {
        echo "Hello" . " " . $names[$randomNumber];
        }
    else 
        {
            echo "Name List:";
            echo "<br>";
            foreach($names as $name) {
                
                echo  $name;
                echo "<br>";
            }
        }
    }

 
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advanced PHP week 1</title>

    <!-- custom styles -->
    <link rel="stylesheet" href="css/responsive.css">


</head>

<body>
    <section class="header">
        <div class="row">
            <div class="col-m-12 col-12">
               <h1>Advanced PHP Week 1</h1>
            </div>
        </div>
    </section>

    <section class="mainInfo">
        <div class="row">
            <div class="col-m-12 col-12">
            <?php randomNameGenerator();?>
          
            </div>
        </div>
    </section>

</body>

</html>