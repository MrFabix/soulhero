<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['redirectTo'] = $_SERVER["REQUEST_URI"];
    header("Location: /login.php");
    exit;
}
