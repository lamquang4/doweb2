<?php
require 'config.php';

if(isset($_POST['status']) && isset($_POST['orderId'])) {
    $status = $_POST['status'];
    $orderId = $_POST['orderId'];
  
    $connection = new Connection();
    $query = "UPDATE tb_order SET status = '$status' WHERE idorder = '$orderId'";
    $result = mysqli_query($connection->conn, $query);
    
  
}
?>