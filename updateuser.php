<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require 'config.php';

    $select = new Select(); // Instantiate the Select class
    $id = $_GET["id"];
    $newUsername = $_GET["username"];
    $newEmail = $_GET["email"];

    $updateQuery = "UPDATE tb_user SET username='$newUsername', email='$newEmail' WHERE id=$id";
    $result = mysqli_query($select->conn, $updateQuery);

    if (!$result) {
        die('Error updating user: ' . mysqli_error($select->conn));
    }

  
    header("Location: user.php"); 
}
?>