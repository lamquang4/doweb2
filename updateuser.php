<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require 'config.php';

    $select = new Select(); 
    $idkh = $_GET["idkh"];
    $newUsername = trim($_GET["username"]);
    $newEmail = trim($_GET["email"]);
    $newFullname = trim($_GET["fullname"]);
    $newPhone = trim($_GET["phone"]);
    $newBirthday = $_GET["birthday"];
    $newGender = isset($_GET["gender"]) ? $_GET["gender"] : ''; 


    $updateQuery = "UPDATE tb_user SET username='$newUsername', email='$newEmail', fullname='$newFullname', phone='$newPhone', birthday='$newBirthday', gender='$newGender' WHERE idkh=$idkh";
    $result = mysqli_query($select->conn, $updateQuery);

    if (!$result) {
        die('Error updating user: ' . mysqli_error($select->conn));
    }

    header("Location: user.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $select = new Select();
    $idkh = $_POST["idkh"];

    $currentUser = $select->selectUserById($idkh);
    $existingImage = $currentUser['imguser'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
     
        $imageTmpName = $_FILES['image']['tmp_name'];
        $newImageFileName = 'imguser/' . $idkh . '_' . $_FILES['image']['name'];
        move_uploaded_file($imageTmpName, $newImageFileName);


        if ($existingImage != 'assets/images/pic/usernew.png' && file_exists($existingImage)) {
            unlink($existingImage);
        }

        $updateImageQuery = "UPDATE tb_user SET imguser='$newImageFileName' WHERE idkh=$idkh";
        $result = mysqli_query($select->conn, $updateImageQuery);

        if (!$result) {
            die('Error updating user image: ' . mysqli_error($select->conn));
        }
    }
}
?>