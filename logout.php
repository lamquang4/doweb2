<?php
session_start();
   
if(isset($_SESSION["login"])) {
    unset($_SESSION["login"]); 
}
unset($_SESSION['shopping_cart']);
header("Location: login.php");
exit;
?>