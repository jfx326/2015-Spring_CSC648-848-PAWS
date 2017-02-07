<?php
/**
 * Form handler for admin login
 */

session_name("PAWS_SESSION_ID");
session_start();

require_once __DIR__ . '/../../models/RegisteredUser.php';
require_once __DIR__ . '/../../exceptions/DoesNotExist.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

try {
    $user = RegisteredUser::$objects->getByEmail($email);
} catch (DoesNotExist $e) {
    fail();
}

if ($user->checkPassword($password) && $user->admin) {
    succeed();
} else {
    fail();
}

/**
 * Login failed: store an error message for display and return to login page.
 */
function fail() {
    $_SESSION['loginErrorMessage'] = "Login incorrect";
    header('Location: ../login.php');
}

/**
 * Login succeeded: mark the user as authenticated.
 *
 * @param RegisteredUser The authenticated user
 */
function succeed($user) {
    global $user;
    $_SESSION['loggedIn'] = true;
    $_SESSION['admin'] = true;
    $_SESSION['userDisplayName'] = $user->displayName;
    $_SESSION['userId'] = $user->id;
    $_SESSION['userEmail'] = $user->email;
    $user->dateLastLoggedIn =
            RegisteredUser::$objects->formatDateTime(new DateTime());
    $user->save();
    header('Location: ../index.php');
}
