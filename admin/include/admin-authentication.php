<?php
/**
 * Initializes the admin session and checks that the user is an authenticated 
 * administrator
 */

session_name("PAWS_SESSION_ID");
session_start();
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] ||
        !isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: login.php');
}
