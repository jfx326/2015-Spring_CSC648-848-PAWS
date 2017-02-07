<?php
require_once __DIR__ . '/../models/RegisteredUser.php';
/* 
 * This script updates the password for users who are already registered and
 * requested a password change.
 */

// Password validation.
$email = $_GET['email'];
$hash = $_GET['hash'];
$user = RegisteredUser::$objects->getByEmail($_GET['email']);

if (isset($_POST['password']) && (isset($_POST['password2']))) {
    if ($_POST['password'] == $_POST['password2'] && 
            strlen($_POST['password']) > 7) {
        $user->setPassword($_POST['password']);
        $user->save();
        $_SESSION['message'] = "Password successfully reset.";
        header("Location: ../index.php");
    } else {
        $_SESSION['errormsg'] = "Passwords did not match or meet the 8 character"
                . " requiremnts. Please create a new password";
        
        header("Location: ../reset-password-confirmed.php?email=" . $email . 
                "&hash=" . $hash);
    }
} else {
    $_SESSION['errormsg'] = "You must enter the same password twice.";
    header("Location: ../reset-password-confirmed.php?email=" . $email . 
                "&hash=" . $hash);
}