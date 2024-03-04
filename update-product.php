<?php
require 'config.php';
if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
$connection = new Connection();
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$soluong = $_POST['soluong'];
$date_add = $_POST['date_add'];
$ml = $_POST['ml'];
$calo = $_POST['calo'];
$fatg = $_POST['fatg'];
$fat = $_POST['fat'];
$sodiummg = $_POST['sodiummg'];
$sodium = $_POST['sodium'];
$carbong = $_POST['carbong'];
$carbon = $_POST['carbon'];
$sugarg = $_POST['sugarg'];
$proteing = $_POST['proteing'];
$type = $_POST['type'];
$id = $_POST['pid'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
   
    $updatequery = "UPDATE product SET name='$name', type='$type', price='$price', image='$image', soluong='$soluong', date_add='$date_add', ml='$ml', calo='$calo', fatg='$fatg', fat='$fat', sodiummg='$sodiummg', sodium='$sodium', carbong='$carbong', carbon='$carbon', sugarg='$sugarg', proteing='$proteing' WHERE id=$id";

    if (mysqli_query($connection->conn, $updatequery)) {
        echo "<script> alert('Success'); </script>";
        header("Location: admin-product.php?page={$page}");
        exit;
    } else {
        echo "<script> alert('Fail'); </script>";
    }