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
$username = $_POST['manager'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
   
    $updatequery = "UPDATE tb_manager SET fullname='$fullname', email='$email', phone='$phone' WHERE username='$username'";

    if (mysqli_query($connection->conn, $updatequery)) {
        if(isset($_GET['status'])) {
            echo "<script> alert('Success'); window.location.href='admin-strator.php?page={$page}&status={$_GET['status']}'; </script>";
        } else {
            echo "<script> alert('Success'); window.location.href='admin-strator.php?page={$page}'; </script>";
        }
    } else {
        echo "<script> alert('Fail'); </script>";
    }


