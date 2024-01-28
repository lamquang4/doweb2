<?php
require('config.php');
session_name("user_session"); 
   
$_SESSION = array();
session_destroy();
   
header("Location: login.php");
?>