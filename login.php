<?php
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;

}
if (isset($_GET['action']) && $_GET['action'] == 'goback'){
  unset($_SESSION['otp']);
header('Location: forgot.php');
exit;
}
$login = new Login();
if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernamelogin"], $_POST["password"]);
 
  if($result ==1){
     $userStatus = $login->getUserStatus($login->idUser());
        if ($userStatus == 0) {
          $_SESSION['fail'] = 'Your account is blocked';   
          echo "<script> window.location.href='login.php';</script>";
          exit;
        } else {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $login->idUser();
            echo "<script> window.location.href='index.php'; </script>";
            exit;
        }
  
  }elseif($result==10){
    $_SESSION['fail'] = 'Wrong username or password';   
    echo "<script> window.location.href='login.php'; </script>";
    exit;
  }elseif($result==100){
    $_SESSION['fail'] = 'Wrong username or password';   
    echo "<script> window.location.href='login.php'; </script>";
    exit;
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
 <title>Sign In</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

 <section id="section-login">
    <div class="container" id="container">
     <div class="f-box">
          <h1 id="tittle">Sign In</h1>
          <form  action="" id="form" method="post" autocomplete="off"  onsubmit="return kttrong()">
             <div class="input-group">
              <div class="input-field" >
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" id="usernamelogin" maxlength="10" name="usernamelogin" required>
             
              </div>
     
           <div class="input-field">
             <i class="fa-solid fa-lock"></i>
             <input type="password" placeholder="Password" id="password" maxlength="20" required name="password"> 
               <div id="eye"> 
                 <i class="fa-solid fa-eye-slash" style="cursor: pointer;"></i> </div>
            
                </div>
       
    
           <div id="fpass">
     <a href="login.php?action=goback" id="forget">Forgotten your password?</a></div>
             </div>
             <div class="b-field">
                 <button type="submit" name="submit"  id="subtn">Sign in</button>
      
            
         </div>
         <div style="margin-top:20px; text-align:center;" >
  <span style="font-size:17px">Don't have an account?   <a href="register.php" style="color: #0093f5;">Sign up</a></span>

</div>
          </form>
    
     
     </div>

     </div>
     
   </section>

   <?php
include_once 'footer.php'
  ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function(){
      $('#eye').click(function(){
          $(this).toggleClass('open');
          $(this).children('i').toggleClass('fa-eye-slash fa-eye');
          if($(this).hasClass('open')){
              $(this).prev().attr('type', 'text');
          }else{
              $(this).prev().attr('type', 'password');
          }
      });
  });

  function kttrong(){
        var usernamelogin = document.getElementById('usernamelogin').value;
        var usernameRegex = /^[a-zA-Z0-9\s]+$/;
        if (!usernameRegex.test(usernamelogin)) {
        alert("Username must contain only letters and numbers.");
    
        return false;
    } 
    return true
    }

</script>

<script>
           document.addEventListener('DOMContentLoaded', function() {
    <?php if(isset($_SESSION['success'])): ?>
        swal('Success!', '<?php echo $_SESSION['success']; ?>', 'success');
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['fail'])): ?>
     swal('Fail!', '<?php echo $_SESSION['fail']; ?>', 'error');
     <?php unset($_SESSION['fail']); ?> 
    <?php endif; ?>
});
</script>