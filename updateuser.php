<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $select = new Select(); 
    $username = $_POST["username"];
    $newEmail = trim($_POST["email"]);
    $newFullname = trim($_POST["fullname"]);
    $newPhone = trim($_POST["phone"]);
    $newBirthday = $_POST["birthday"];
    $newGender = isset($_POST["gender"]) ? $_POST["gender"] : '';


    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $fileName = $username . '_' . $file['name']; 
        $filePath = 'imguser/' . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
      
        $updateImagePathQuery = "UPDATE tb_customer SET imguser='$filePath' WHERE username='$username'";
        $resultImagePath = mysqli_query($select->conn, $updateImagePathQuery);
        if (!$resultImagePath) {
            die('Error updating user image path: ' . mysqli_error($select->conn));
        }
    }

    $updateQuery = "UPDATE tb_customer SET email='$newEmail', fullname='$newFullname', phone='$newPhone', birthday='$newBirthday', gender='$newGender' WHERE username='$username'";
    $result = mysqli_query($select->conn, $updateQuery);

    if (!$result) {
        die('Error updating user: ' . mysqli_error($select->conn));
    }
}
?>
