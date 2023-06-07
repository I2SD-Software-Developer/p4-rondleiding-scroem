<?php

session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logging out
header("Location: ../aanmeldpagina/index.php"); // Replace "login.php" with the actual login page URL
exit;

?>
