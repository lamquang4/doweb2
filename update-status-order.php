<?php
require 'config.php';

if(isset($_POST['status']) && isset($_POST['orderId'])) {
    $status = $_POST['status'];
    $orderId = $_POST['orderId'];
  
    $connection = new Connection();
    $query = "UPDATE tb_order SET status = '$status' WHERE idorder = '$orderId'";
    $result = mysqli_query($connection->conn, $query);
    

    //cap nhat so luong san pham trong kho khi status = 1
    if($status == 1) { 
 
        $orderDetailQuery = "SELECT * FROM order_detail WHERE idorder = '$orderId'";
        $orderDetailResult = mysqli_query($connection->conn, $orderDetailQuery);

        while($row = mysqli_fetch_assoc($orderDetailResult)) {
            $productId = $row['id'];
            $quantity = $row['sl_mua'];

            $updateProductQuery = "UPDATE product SET soluong = soluong - $quantity WHERE id = '$productId'";
            mysqli_query($connection->conn, $updateProductQuery);
        }
    }
  
}
?>