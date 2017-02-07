<?php
session_name("PAWS_SESSION_ID");
session_start();

/*
 * Authenticates user and starts their session.
 */
require_once __DIR__ . '/../models/RegisteredUser.php';

$loginURL = '../user-registration.php';
        
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "This page must be requested using POST.";
    die();
}

$loginErrorMessage = "Email or password invalid.";

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email == false) {
    $_SESSION["loginErrorMessage"] = $loginErrorMessage;
    header("Location: $loginURL");
}

try {
    $user = RegisteredUser::$objects->getByEmail($email);
    if ($user->checkPassword($_POST['password'])) {
        
        // There was a match! Now checking if enabled.
        if (!$user->checkIfEnabled()) {
            $_SESSION["loginErrorMessage"] = "Looks like you haven't clicked your "
            . "verification link. If you didn't see it please check your "
            . "spam folder.";
            header("Location: $loginURL");
        } else {
            $_SESSION['loggedIn'] = true;
            $_SESSION['userDisplayName'] = $user->displayName;
            $_SESSION['userId'] = $user->id;
            $_SESSION['userEmail'] = $user->email;
            $user->dateLastLoggedIn = date("Y-m-d H:i:s");
            header('Location: ../index.php');
        }
    } else {
        // Bad password
        $_SESSION["loginErrorMessage"] = $loginErrorMessage;
        header("Location: $loginURL");
    }
} catch (Exception $e) {
    $_SESSION["loginErrorMessage"] = $loginErrorMessage;
    header("Location: $loginURL");
}
?>
