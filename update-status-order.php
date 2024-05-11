<?php
require 'config.php';
if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
if(isset($_POST['status']) && isset($_POST['orderId'])) {
    $status = $_POST['status'];
    $orderId = $_POST['orderId'];
  
    $connection = new Connection();


    $query = "UPDATE tb_order SET status = '$status' WHERE idorder = '$orderId'";
    $result = mysqli_query($connection->conn, $query);


}
?>
