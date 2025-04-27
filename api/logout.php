<?php
//logout.php
session_start();
include '../include/config.php';
// Unset all session variables
session_unset();
// Destroy the session
session_destroy();
// Redirect to the login page
header("Location: /");
