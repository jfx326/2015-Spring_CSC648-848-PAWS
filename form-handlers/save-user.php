<?php 
session_name("PAWS_SESSION_ID");
session_start();

require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../models/Message.php';
require_once __DIR__ . '/../messaging/MessagingService.php';
        
/*
 * Validates entries and stores them in the RegisteredUser model.
 */
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "This page must be requested using POST.";
    die();
}

// Insterting new user.
if (empty($_POST['id'])) {
    $user = new RegisteredUser();
} 

// Making sure all fields are valid.
if (formValidation()) {
    
    // Saving user to database.
    $user->email = $_POST['email'];
    $user->displayName = $_POST['displayName'];
    $user->dateRegistered = date("Y-m-d H:i:s");
    $user->dateLastLoggedIn = date("Y-m-d H:i:s");
    $user->setPassword($_POST['password']);
    $user->createVerificationHash();
    $user->save();

    // Generating a verification email.
    $message = new Message();
    $message->recipientId = $user->id;
    $message->subject = 'PAWS Signup Verification';
    $message->body = 'Thanks for signing up for an account at PAWS!

Your account has been created but is inactive until you click the link:
http://www.sfsuswe.com/~s15g08/verify.php?email='.$user->email.'&hash='.$user->verificationHash.'
'; 
    
    MessagingService::getInstance()->emailMessage($message);
    
    $_SESSION["successmsg"] = "Registration successful. Please check your email"
            . " to validate your account.";

    header('Location: ../user-confirmation.php');
   
// Failed to validate. Go back to registration page an display error message.
} else {
    header('Location: ../user-registration.php');
}


/**
 * Checks if all fields are valid and creates error messages.
 * 
 * @return boolean $valid
 */
function formValidation() {
    $valid = true;
    $error = "";
    
    // No fields can be empty.
    if ($_POST['displayName'] == NULL || 
            $_POST['email'] == NULL || 
            $_POST['password'] == NULL) {
        $error.= "All fields are required.<br/>";
    }
    
    // Checking for proper username.
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['displayName'])) {
        $error.= "Only letters and white space allowed for Display Name<br/>";
    }
    
    // Validating that an email address was entered.
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error.= "You did not enter a proper email address.<br/>";
    }
    
    // Make sure email doesn't already exist.
    try {
        $user = RegisteredUser::$objects->getByEmail($_POST["email"]);
        if ($user != null) {
            $error.= "Sorry, that email address is taken.<br/>";
        }
        $user = RegisteredUser::$objects->getByDisplayName($_POST["displayName"]);
        if ($user != null) {
            $error.= "Sorry, that display name is taken.<br/>";
        }
    } catch (exception $e){}
    
    // Passwords need to match.
    if ($_POST['password'] != $_POST['password2']) {
        $error.= "Passwords did not match.<br/>";
    }
    
    // Password must be length 8 or higher.
    if (strlen($_POST['password']) < 8) {
        $error.= "Password must have at least a length of 8 characters.<br/>";
    }
    
    if ($error != "") {
        $_SESSION["errormsg"] = $error;
        $valid = false;
    }
    return $valid;
}

?>
