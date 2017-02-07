<?php 
session_name("PAWS_SESSION_ID");
session_start();

/*
 * Clears session and logs user out.
 */


// Unset all of the session variables.
$_SESSION = array();
unset($_SESSION['loggedIn']);
unset($_SESSION['userDisplayName']);
unset($_SESSION['userId']);
unset($_SESSION['userEmail']);

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session.
session_destroy();
header('Location: ../index.php');

?>

