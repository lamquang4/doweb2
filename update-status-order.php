<?php
require 'config.php';

if(isset($_POST['status']) && isset($_POST['orderId'])) {
    $status = $_POST['status'];
    $orderId = $_POST['orderId'];
  
    $connection = new Connection();

    if($status != 2) {
        $checkQuantityQuery = "SELECT COUNT(*) AS shortage FROM order_detail od INNER JOIN product p ON od.id = p.id WHERE od.idorder = '$orderId' AND p.soluong < od.sl_mua";
        $checkQuantityResult = mysqli_query($connection->conn, $checkQuantityQuery);
        $row = mysqli_fetch_assoc($checkQuantityResult);
        $shortage = $row['shortage'];

        if($shortage > 0) {
            echo "shortage";
            exit; 
        }
    }

    $query = "UPDATE tb_order SET status = '$status' WHERE idorder = '$orderId'";
    $result = mysqli_query($connection->conn, $query);

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
