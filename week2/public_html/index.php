<?php 
// define variables and set to empty values

$firstNameError = "";
$lastNameError = "";
$dateOfBirthError = "";
$emailError = "";
$messageError = "";

$firstName = "";
$lastName = "";
$dateOfBirth = "";
$email = "";
$message = "";
$honeypot = "";

// set form flag to false
$validForm = false;

function validateFirstName() {
    global $firstName,$firstNameError,$validForm;
    if (!preg_match("/^[^-\s][a-zA-Z \s-]*$/", $firstName)) {
        $firstNameError = "cannot be empty and Special characters not allowed";
        $validForm = false;
    }
    else {
        $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }
  
}

function validateLastName() {
    global $lastName,$lastNameError,$validForm;
    if (!preg_match("/^[^-\s][a-zA-Z \s-]*$/", $lastName)) {
        $lastNameError = "cannot be empty and Special characters not allowed";
        
$validForm = false;
    }
    else {
        $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }
}

function validateDateOfBirth() {
    global $dateOfBirth,$dateOfBirthError,$validForm;
    if (!filter_var($dateOfBirth, FILTER_VALIDATE_INT) === false) {
        $dateOfBirthError = "cannot be empty";
        $validForm = false;
    } 
}
function validateEmail() {
    global $email,$emailError,$validForm;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email";
        $validForm = false;
    } 
}

function validateMessage() {
    global $message,$messageError,$validForm;
    if (!preg_match("/^[^-\s][a-zA-Z0-9 \s-]*$/", $message)) {
        $messageError = "cannot be empty and Special characters not allowed";
        $validForm = false;
    }
    else {
        $message = filter_var($message, FILTER_SANITIZE_STRING);
    }
}

function validateHoneyPot() {
    global $honeyPot,$validForm;
    if (!empty($_POST["honeyPot"])) {
        $honeyPot = test_input($_POST["honeyPot"]);
        $validForm= false;
    }
}

// form validation
if(isset($_POST['submit'])) {  
   $firstName = $_POST["firstName"];
   $lastName = $_POST["lastName"];
   $dateOfBirth = $_POST["dateOfBirth"];
   $email = $_POST["email"];
   $message = $_POST["message"];
   $honeyPot = $_POST["honeyPot"];
  
     // set form flag to true
  $validForm = true;


    validateFirstName();
    validateLastName();
    validateDateOfBirth();
    validateEmail();
    validateMessage();
    validateHoneyPot();
}
  if ($validForm) {
    //send email
      include 'Email.php';
      $contactEmail = new Email(""); //instantiate
      $contactEmail->setRecipient($email);                            //person receiving the email
      $contactEmail->setSender("contact@andresmonline.com");           //the email that is sending the form
      $contactEmail->setSubject("We have received your message.");
      $contactEmail->setMessage("Thank you for your form submission. Below is a copy of your message.\nfirst Name: " . $firstName . "\nlast Name: " . $lastName . "\nDate of Birth: " . $dateOfBirth . "\nEmail: " . $email . "\nMessage: " . $message);
      $emailStatus = $contactEmail->sendCustomerMail();
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advanced PHP week 2</title>
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="container">
        <h1>Simple form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
                <div class="col-m-4 col-4">
                    <label for="firstName">First Name:</label>
                    
                </div>
                <div class="col-m-8 col-8">
                    <input type="text" name="firstName" id="firstName" placeholder="your name">
                    <span class="error">
              <?php echo $firstNameError; ?>
            </span>
                </div>
            </div>
            <div class="row">
                <div class="col-m-4 col-4">
                    <label for="lastName">Last Name:</label>
                </div>
                <div class="col-m-8 col-8">
                    <input type="text" name="lastName" id="lastName" placeholder="your last name">
                    <span class="error">
              <?php echo $lastNameError; ?>
            </span>
                </div>
            </div>
            <div class="row">
                <div class="col-m-4 col-4">
                    <label for="dateOfBirth">Date of Birth:</label>
                </div>
                <div class="col-m-8 col-8">
                    <input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="mm/dd/yyyy">
                    <span class="error">
              <?php echo $dateOfBirthError; ?>
            </span>
                </div>
            </div>
            <div class="row">
                <div class="col-m-4 col-4">
                    <label for="email">Email:</label>
                </div>
                <div class="col-m-8 col-8">
                    <input type="text" name="email" id="email" placeholder="your email">
                    <span class="error">
              <?php echo $emailError; ?>
            </span>
                </div>
            </div>
            <div class="row">
                <div class="col-m-4 col-4">
                    <label for="message">Message:</label>
                </div>
                <div class="col-m-8 col-8">
                    <textarea name="message" id="message" placeholder="Write something.."></textarea>
                    <span class="error">
              <?php echo $messageError; ?>
            </span>
                </div>
            </div>
            <div class="row">
                <!-- do not fill -->
          <input type="hidden" name="honeyPot">
                <div class="col-m-12">
                    <input type="reset" name="reset" id="reset">
                    <input type="submit" name="submit" id="submit">

                </div>
            </div>
        </form>
    </div>
</body>

</html>