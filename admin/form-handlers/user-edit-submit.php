<?php
/**
 * Takes a POST request from the user-edit form, validates the form data, and if 
 * valid, saves the new or existing user to the database.
 */

require_once __DIR__ . '/../../models/RegisteredUser.php';
require_once __DIR__ . '/../../exceptions/DoesNotExist.php';

include __DIR__ . '/../include/admin-authentication.php';

$_SESSION['formErrors'] = array();

$userId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT,
        array("options" => array("default" => 0)));
$newUser = ($userId == 0);

if ($newUser) {
    $user = new RegisteredUser();
} else {
    $user = RegisteredUser::$objects->get($userId);
}

$user->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (!$user->email) {
    $_SESSION['formErrors']['email'] = "Invalid email address";
} else {
    try {
        $existingUser = RegisteredUser::$objects->getByEmail($user->email);
    } catch (DoesNotExist $e) {
        $existingUser = false;
    }
    if ($existingUser && $existingUser->id != $user->id) {
        $_SESSION['formErrors']['email'] =
                "A user with that email address already exists.";
    }
}

$user->displayName = filter_input(INPUT_POST, 'displayName',
        FILTER_SANITIZE_STRING);
if ($user->displayName) {
    $user->displayName = trim($user->displayName);
}
if (!$user->displayName || empty($user->displayName)) {
    $_SESSION['formErrors']['displayName'] = "Invalid display name";
} else {
    try {
        $existingUser = RegisteredUser::$objects->getByDisplayName(
                $user->displayName);
    } catch (DoesNotExist $e) {
        $existingUser = false;
    }
    if ($existingUser && $existingUser->id != $user->id) {
        $_SESSION['formErrors']['displayName'] =
                "A user with that display name already exists.";
    }
}

$user->accountEnabled = filter_input(INPUT_POST, 'accountEnabled',
        FILTER_VALIDATE_BOOLEAN);

$user->admin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_BOOLEAN);

if (strlen($_POST['password']) > 0) {
    if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['formErrors']['password'] = "Passwords do not match.";
    } else {
        $user->setPassword($_POST['password']);
    }
} elseif ($newUser) {
    $_SESSION['formErrors']['password'] = "Password is required.";
}

if (count($_SESSION['formErrors']) == 0) {
    // No errors, so save the user and return to the user list
    if ($newUser) {
        $user->dateRegistered = RegisteredUser::$objects->formatDateTime(
                new DateTime());
    }
    $user->save();
    unset($_SESSION['formErrors']);
    $_SESSION['message'] = "Successfully saved user $user->email";
    header('Location: ../user-list.php');
} else {
    // There were errors in the form
    $_SESSION['userBeingEdited'] = $user;
    header('Location: ../user-edit.php');
}
