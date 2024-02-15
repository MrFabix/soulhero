<?php
    session_start();

    if(!$_SESSION["loggedin"]){
        $_SESSION["redirectTo"] = $_SERVER["REQUEST_URI"];
        header("Location: ../login.php");
    }
?>
