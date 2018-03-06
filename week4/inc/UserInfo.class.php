<?php 
// Think about the components of a web application.  
//Which components would make sense to be applied at a base class level (ie used by multiple business objects)?
// Define a base class that contains stubbed functions that could be reused.
// Define a child class that represents a user in the system that 
//extends the base class and adds in any properties or stubbed functions specific to a user.

// Components of a web app
// collection,validation, save, load, edit, delete, search

// I think....

class UserLoginInformation {

        protected $userName;
        protected $userPassword;
        protected $userEmail;
     

       // function stubs


function getUserName()
{

    return $this->userName;



function getUserPassword()
{

    return $this->userPassword;
}


function getUserEmail() 
{


return $this->userEmail;
}

function loadUserInformation($tableName,$tableData)
{

    return $tableData;
}

// validate
function validateInput($inputArray) 
{


return $validatedInputArray;
}

// save
function saveInput($tableName,$inputArray)
{

    return $inputArray;
}

}

class user extends UserLoginInformation
{

}

$user = new User();

$user->userName = "ChuckTheDuck";
$user->userPassword = "Hockey4LifePuck1234";
$user->userEmail = "TheDuckChuck@aol.com";

    loadTableData($tableName, $username);
    validateTableData($tableData, $username);
    saveTableData($validatedInputArray);

    loadTableData($tableName, $userPassword);
    validateTableData($tableData, $userPassword);
    saveTableData($validatedInputArray);

    loadTableData($tableName, $userEmail);
    validateTableData($tableData, $userEmail);
    saveTableData($validatedInputArray);

?>
