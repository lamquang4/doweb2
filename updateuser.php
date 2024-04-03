<?php
    require 'config.php';
    $connection = new Connection();

    $username = $_POST["username"];
    $email = trim($_POST["email"]);
    $fullname = trim($_POST["fullname"]);
    $phone = trim($_POST["phone"]);
    $birthday = $_POST["birthday"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
$city = $_POST["city"];
    $district = $_POST["district"];
    $ward = $_POST["ward"];
    $duong = trim($_POST["duong"]);
    $sonha = trim($_POST["sonha"]);

    if (isset($_FILES['userImage'])) {
        $file = $_FILES['userImage'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = $username . '.' . $fileExtension; 
        $filePath = 'imguser/' . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
      
        $updateImagePathQuery = "UPDATE tb_customer SET imguser='$filePath' WHERE username='$username'";
        $resultImagePath = mysqli_query($connection->conn, $updateImagePathQuery);
        if (!$resultImagePath) {
            die('Error updating user image path: ' . mysqli_error($connection->conn));
        }
    }

    $updateQuery = "UPDATE tb_customer SET email='$email', fullname='$fullname', phone='$phone', birthday='$birthday', gender='$gender', city='$city', ward='$ward', district='$district', sonha='$sonha', duong='$duong' WHERE username='$username'";
    if (mysqli_query($connection->conn, $updateQuery)) {
        echo "<script> alert('Success'); window.location.href='user.php'; </script>";
       
        exit;
    } else {
        echo "<script> alert('Fail'); </script>";
    }

?>
