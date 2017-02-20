<?php
/**
 * Created by PhpStorm.
 * User: fridurmus
 * Date: 2/20/17
 * Time: 1:04 AM
 */
session_start();

//Unset Session values.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect back out to the index.
header("Location: ../index.php");
?>