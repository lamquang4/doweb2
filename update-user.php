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
$username = $_POST['customer'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
   
    $updatequery = "UPDATE tb_customer SET fullname='$fullname', email='$email', phone='$phone' WHERE username='$username'";

    if (mysqli_query($connection->conn, $updatequery)) {
        echo "<script> alert('Success'); </script>";
        header("Location: admin-user.php?page={$page}");
        exit;
    } else {
        echo "<script> alert('Fail'); </script>";
    }


