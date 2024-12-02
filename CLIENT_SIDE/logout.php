<?php
session_start();
// If the user confirms logout
//if (isset($_POST['logout'])) {
    // Destroy the session
    session_unset();
    session_destroy();
    // Redirect to the login page or home page
    header("Location: login.php");
    exit();
//}
?>