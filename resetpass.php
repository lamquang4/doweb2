<?php
require 'config.php';
$connection = new Connection();
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;

}
if (isset($_SESSION["verified"]) && $_SESSION['verified'] !== true) {
  header("location: forgot.php");
  exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'goback'){
  unset($_SESSION['userEmail']);
  $_SESSION['verified']=false;
  header("location: login.php");
  exit;
}

if (isset($_POST["submit"])){
  $newPass=$_POST['newPassword'];
  $newconPass=$_POST['newconPassword'];
  $userEmail=$_POST['userEmail'];
  
if($newPass===$newconPass){
  $newPassHash = md5($newPass);
  $query = "UPDATE tb_customer SET password = '$newPassHash' WHERE email = '$userEmail'";
  $result = mysqli_query($connection->conn, $query);
 
 if($result){
   unset($_SESSION['userEmail']);
  $_SESSION['verified']=false;
  header('Location: login.php');
  exit;
 }
}
}

?>
<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/login.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
 <title>Reset Password</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

 <section id="section-login">
    <div class="container" id="container">
     <div class="f-box">
        
          <h1 id="tittle">Reset Password</h1>
  <form action="" id="form" method="post" onsubmit="return kttrong()">
    <div class="input-group">
      <div class="input-field">
        <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="Enter New Password" id="newPassword" name="newPassword" required>
      </div>
      <div class="input-field">
        <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="Confirm New Password" id="newconPassword" name="newconPassword" required>
      </div>
      <input type="hidden" name="userEmail" value="<?php echo $_SESSION['userEmail']; ?>"> 
      <div id="fpass" style="display: flex; justify-content:left;">
        <a href="resetpass.php?action=goback" id="forget">Return to Sign in</a>
      </div>
    </div>
    <div class="b-field">
      <button type="submit" name="submit" id="subtn">Submit</button>
    </div>
  </form>
    
     
     </div>

     </div>
     
   </section>

   <?php
include_once 'footer.php'
  ?>
<script>
    function kttrong() {
var newPassword = document.getElementById('newPassword').value;
var newconPassword = document.getElementById('newconPassword').value;
if(newPassword !== newconPassword){
  alert("Password and Confirm Password does not match");
  return false;
}
return true;
    }
</script>