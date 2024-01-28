<?php
require('config.php');
session_name("admin_session"); 
   
$_SESSION = array();
session_destroy();
   
header("Location: login-admin.php");
?>