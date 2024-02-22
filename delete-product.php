<?php
require 'config.php';
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