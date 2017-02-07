<?php

/**
 * Generates RegisteredUsers and stores them in the database for testing
 */

const MAX_USERS_TO_GENERATE = 20;

require_once __DIR__ . '/../models/RegisteredUser.php';
        
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "This page must be requested using POST.";
    die();
}

$usersToGenerate = filter_input(INPUT_POST, 'usersToGenerate', FILTER_VALIDATE_INT);
if (empty($usersToGenerate)
            || $usersToGenerate < 1
            || $usersToGenerate > MAX_USERS_TO_GENERATE) {
    echo "Number of users to generate must be between 1 and "
            . MAX_USERS_TO_GENERATE;
    die();
}

const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';
for ($i = 0; $i < $usersToGenerate; $i++) {
    $user = new RegisteredUser();
    $user->displayName = str_shuffle(ALPHABET);
    $user->email = "$user->displayName@example.com";
    $user->dateRegistered = date('Y-m-d H:i:s');
    $user->dateLastLoggedIn = date('Y-m-d H:i:s');
    $user->accountEnabled = false;
    $user->admin = false;
    $user->setPassword($user->displayName);
    $user->save();
}

echo "Done.";