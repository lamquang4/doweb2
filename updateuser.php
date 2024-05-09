<?php
    require 'config.php';

    $connection = new Connection();
    $select = new Select();
    if(isset($_SESSION["username"])){
        $user = $select->selectUserById($_SESSION["username"]);
        
      }else{
        header("Location: login.php");
    }
    
    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
        header("Location: login.php");
    exit();
    }
    $username = $connection->conn->real_escape_string($_POST["username"]);
    $email = $connection->conn->real_escape_string(trim($_POST["email"]));
    $fullname = $connection->conn->real_escape_string(trim($_POST["fullname"]));
    $phone = $connection->conn->real_escape_string(trim($_POST["phone"]));
    $birthday = $connection->conn->real_escape_string($_POST["birthday"]);
    $gender = $connection->conn->real_escape_string(isset($_POST["gender"]) ? $_POST["gender"] : '');
$city = $connection->conn->real_escape_string($_POST["city"]);
    $district = $connection->conn->real_escape_string($_POST["district"]);
    $ward = $connection->conn->real_escape_string($_POST["ward"]);
    $duong = $connection->conn->real_escape_string(trim($_POST["duong"]));
    $sonha = $connection->conn->real_escape_string(trim($_POST["sonha"]));

    if (isset($_FILES['userImage']) && $_FILES['userImage']['size'] > 0) {
        $file = $_FILES['userImage'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName = $username . '.' . $fileExtension;
        $filePath = 'imguser/' . $fileName;

        $allowedExtensions = array('png', 'jpeg', 'jpg');
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "<script>alert('Invalid file type. Please upload a PNG, JPEG, or JPG file.'); window.location.href='user.php';</script>";
            exit;
        }
    
        $maxWidth = 500;
        $maxHeight = 500;
        list($width, $height) = getimagesize($file['tmp_name']);
        if ($width > $maxWidth || $height > $maxHeight) {
            echo "<script>alert('Image dimensions exceed the maximum allowed size of 500x500.'); window.location.href='user.php';</script>";
            exit;
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $updateImagePathQuery = "UPDATE tb_customer SET imguser='$filePath' WHERE username='$username'";
            $resultImagePath = mysqli_query($connection->conn, $updateImagePathQuery);
            if (!$resultImagePath) {
                die('Error updating user image path: ' . mysqli_error($connection->conn));
            }
        } else {
            echo "<script>alert('Failed to upload image. Please try again.'); window.location.href='user.php';</script>";
            exit;
        }
    }

    $updateQuery = "UPDATE tb_customer SET email='$email', fullname='$fullname', phone='$phone', birthday='$birthday', gender='$gender', city='$city', ward='$ward', district='$district', sonha='$sonha', duong='$duong' WHERE username='$username'";
    if (mysqli_query($connection->conn, $updateQuery)) {
        echo "<script> window.location.href='user.php'; </script>";
       
        exit;
    } else {
        echo "<script> window.location.href='user.php'; </script>";
    }

?>
