<?php
require 'config.php';
if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fimage1'])) {
    $targetDir = "assets/images/sp/";
    $fileName = basename($_FILES["fimage1"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["fimage1"]["tmp_name"], $targetFilePath)) {
           
            $image = $fileName;
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
        }
    } else {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG files are allowed to upload.'); </script>";
    }
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
$brand = $_POST['brand'];
$id = $_POST['pid'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
   
    $updatequery = "UPDATE product SET name='$name', brand='$brand', type='$type', price='$price', image='$image', soluong='$soluong', date_add='$date_add', ml='$ml', calo='$calo', fatg='$fatg', fat='$fat', sodiummg='$sodiummg', sodium='$sodium', carbong='$carbong', carbon='$carbon', sugarg='$sugarg', proteing='$proteing' WHERE id=$id";

    if (mysqli_query($connection->conn, $updatequery)) {
        echo "<script> alert('Success'); </script>";
        header("Location: admin-product.php?page={$page}");
        exit;
    } else {
        echo "<script> alert('Fail'); </script>";
    }


