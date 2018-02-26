<?php 
// Think about the components of a web application.  
//Which components would make sense to be applied at a base class level (ie used by multiple business objects)?
// Define a base class that contains stubbed functions that could be reused.
// Define a child class that represents a user in the system that 
//extends the base class and adds in any properties or stubbed functions specific to a user.

// Components of a web app
// collection,validation, save, load, edit, delete, search

// I think....

class email {

        protected $name;
        protected $email;
        protected $message;

        function getName() 
        {

            //get user name
            return $this->name;
        }

        function getEmail() 
        {
            //get user email
            return $this->email;
        }

        function getMessage() 
        {
            // get user message
            return $this->message;
        }
}

class User extends Email 
{

}

$userOneInfo = new User();
$userOneInfo->name = "Tony";
$userOneInfo->email = "TonyNumberOne@gmail.com";
$userOneInfo->message = "You are great.";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advanced PHP week 3</title>

<body>

</body>

</html>