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
    $allowTypes = array('png');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["fimage1"]["tmp_name"], $targetFilePath)) {
           
            $image = $fileName;
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file.'); window.location.href='admin-product.php';</script>";
        }
    } 
}


$connection = new Connection();
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$date_add = $_POST['date_add'];
$ml = $_POST['ml'];
$calo = $_POST['calo'];
$fatg = $_POST['fatg'];
$sodiummg = $_POST['sodiummg'];
$carbong = $_POST['carbong'];
$sugarg = $_POST['sugarg'];
$proteing = $_POST['proteing'];
$type = $_POST['type'];
$brand = $_POST['brand'];
$status = $_POST['status'];
$id = $_POST['pid'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
  $statuscur = $_GET['status'];
  $text = $_GET['text'];
  $categoryQuery = "SELECT idloai FROM category WHERE brand = '$brand' AND type = '$type'";
  $categoryResult = mysqli_query($connection->conn, $categoryQuery);
  
  if($categoryResult) {
  
      if(mysqli_num_rows($categoryResult) > 0) {
          $categoryRow = mysqli_fetch_assoc($categoryResult);
          $idloai = $categoryRow['idloai'];
      }else{
        echo '<script>alert("Wrong category.");</script>';
      }
  }
    $updatequery = "UPDATE product SET idloai='$idloai',name='$name', price='$price', image='$image', date_add='$date_add', ml='$ml', calo='$calo', fatg='$fatg', sodiummg='$sodiummg', carbong='$carbong', sugarg='$sugarg', proteing='$proteing', status='$status' WHERE id='$id'";

    if (mysqli_query($connection->conn, $updatequery)) {
 
            echo "<script>alert('Update Successful'); window.location.href='admin-product.php?page={$page}&status={$statuscur}&text={$text}'; </script>";
        
       
    } else{
        echo "<script> window.location.href='admin-product.php?page={$page}&status={$statuscur}&text={$text}'; </script>";
    }


