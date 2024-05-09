<?php
require 'config.php';
if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}



$connection = new Connection();
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$username = $_POST['customer'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$statuscur = isset($_GET['status']) ? $_GET['status'] : '';
    $updatequery = "UPDATE tb_customer SET fullname='$fullname', email='$email', phone='$phone', birthday='$birthday' WHERE username='$username'";

    if (mysqli_query($connection->conn, $updatequery)) {
  
            echo "<script> window.location.href='admin-user.php?page={$page}&status={$statuscur}'; </script>";
           
  
    } else {
        echo "<script> alert('Fail'); window.location.href='admin-user.php?page={$page}&status={$statuscur}'; </script>";
    }


