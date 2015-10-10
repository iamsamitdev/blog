<?php 
session_start();

// Clear facebook login session
session_unset();
unset($_SESSION['token']);

// Clear all session
session_destroy();

// Redirect to login page (index.php)
header("location:index.php");
?>