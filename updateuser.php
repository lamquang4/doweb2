<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require 'config.php';

    $select = new Select(); 
    $id = $_GET["id"];
    $newUsername = $_GET["username"];
    $newEmail = $_GET["email"];
    $newFullname = $_GET["fullname"];
    $newPhone = $_GET["phone"];
    $newAddress = $_GET["diachi"];
    $newBirthday = $_GET["birthday"];
    $newGender = isset($_GET["gender"]) ? $_GET["gender"] : ''; 
    $phonePattern = '/^0[1-9]\d{8,9}$/';
    if (!preg_match($phonePattern, $newPhone)) {
      echo "<script>alert('Invalid phone number.')</script>";
      echo "<script>setTimeout(function(){ window.location='user.php'; }, 500);</script>";
        exit;
    }
    $updateQuery = "UPDATE tb_user SET username='$newUsername', email='$newEmail', fullname='$newFullname', diachi='$newAddress', phone='$newPhone', birthday='$newBirthday', gender='$newGender' WHERE id=$id";
    $result = mysqli_query($select->conn, $updateQuery);

    if (!$result) {
        die('Error updating user: ' . mysqli_error($select->conn));
    }

    header("Location: user.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $select = new Select();
    $id = $_POST["id"];

    $currentUser = $select->selectUserById($id);
    $existingImage = $currentUser['imguser'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
     
        $imageTmpName = $_FILES['image']['tmp_name'];
        $newImageFileName = 'imguser/' . $id . '_' . $_FILES['image']['name'];
        move_uploaded_file($imageTmpName, $newImageFileName);


        if ($existingImage != 'assets/images/pic/usernew.png' && file_exists($existingImage)) {
            unlink($existingImage);
        }

        $updateImageQuery = "UPDATE tb_user SET imguser='$newImageFileName' WHERE id=$id";
        $result = mysqli_query($select->conn, $updateImageQuery);

        if (!$result) {
            die('Error updating user image: ' . mysqli_error($select->conn));
        }
    }
}
?>