<?php
require 'config.php';
if (!isset($_GET['pid'])) {
    header('Location: admin-product.php');
    exit(); 
  }
$connection = new Connection();
$pid = $_GET['pid'];
$delete_sql = "DELETE FROM product WHERE id=$pid";
if (mysqli_query($connection->conn, $delete_sql)) {
    echo "<script>alert('Delete Successful');</script>";
    header('Location: admin-product.php');
    exit;
} else {
    echo "<script>alert('Delete Fail');</script>";
}