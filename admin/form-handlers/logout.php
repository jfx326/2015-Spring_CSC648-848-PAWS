<?php
/*
 * Logs the user out
 */

session_name("PAWS_SESSION_ID");
session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['admin']);
unset($_SESSION['userDisplayName']);
unset($_SESSION['userId']);
unset($_SESSION['userEmail']);
header('Location: ../login.php');
