<?php
session_start(); 

if(isset($_SESSION["loginad"])) {
    unset($_SESSION["loginad"]); 
}

header("Location: login-admin.php");
exit();
?>