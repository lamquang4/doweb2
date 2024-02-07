<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require 'config.php';

    $select = new Select(); // Instantiate the Select class
    $id = $_GET["id"];
    $newUsername = $_GET["username"];
    $newEmail = $_GET["email"];
    $newFullname = $_GET["fullname"];
    $newPhone = $_GET["phone"];
    $newAddress = $_GET["diachi"];
    $newBirthday = $_GET["birthday"];
    $newGender = isset($_GET["gender"]) ? $_GET["gender"] : ''; 
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