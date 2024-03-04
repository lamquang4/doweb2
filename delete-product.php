<?php
require 'config.php';
if (!isset($_GET['pid'])) {
    header('Location: admin-product.php');
    exit(); 
  }
$connection = new Connection();
$pid = $_GET['pid'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$delete_sql = "DELETE FROM product WHERE id=$pid";
if (mysqli_query($connection->conn, $delete_sql)) {
    echo "<script>alert('Delete Successful');</script>";
    header("Location: admin-product.php?page={$page}");
    exit;
} else {
    echo "<script>alert('Delete Fail');</script>";
}