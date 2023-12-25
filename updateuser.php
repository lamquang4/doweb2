/<?php
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
    $newGender = isset($_GET["gender"]) ? $_GET["gender"] : ''; // Add this line to get the selected gender
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

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {

        $currentUser = $select->selectUserById($id);
        if (!empty($currentUser['imguser'])) {
            unlink($currentUser['imguser']);
        }

        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageFileName = 'imguser/' . $_FILES['image']['name'];
        move_uploaded_file($imageTmpName, $imageFileName);

        $updateImageQuery = "UPDATE tb_user SET imguser='$imageFileName' WHERE id=$id";
        $result = mysqli_query($select->conn, $updateImageQuery);

        if (!$result) {
            die('Error updating user image: ' . mysqli_error($select->conn));
        }
    }
}
?>