<?php 
session_name("PAWS_SESSION_ID");
session_start();
require_once __DIR__ . '/../models/RegisteredUser.php';
require_once __DIR__ . '/../models/Message.php';
require_once __DIR__ . '/../messaging/MessagingService.php';
require_once __DIR__ . '/../exceptions/DoesNotExist.php';

/**
 * Sends a verification email for password resets.
 */

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email == false) {
    $_SESSION["errormsg"] = "Invalid email address";
    header('Location: ../reset-password-form.php');
}

try {
    $user = RegisteredUser::$objects->getByEmail($_POST['email']);
} catch (DoesNotExist $e) {
    $_SESSION["errormsg"] = "Invalid email address.";
    header('Location: ../reset-password-form.php');
}

$user->createVerificationHash();
$user->save();
$message = new Message();
$message->recipientId = $user->id;
$message->subject = 'PAWS Password Reset';
$message->body = '

Looks like you requested a password reset. Click the link to reset it.
http://www.sfsuswe.com/~s15g08/product-prototype/reset-password-confirmed.php?email='
. $user->email . '&hash=' . $user->verificationHash.'
'; 

MessagingService::getInstance()->emailMessage($message);
$_SESSION["errormsg"] = "Password reset email sent. Please look out for it!";
header('Location: ../reset-password-form.php');
