<?php
require 'config.php';
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;

}

$login = new Login();
if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernamelogin"], $_POST["password"]);
 
  if($result ==1){
   $_SESSION["login"]=true;
   $_SESSION["id"]=$login->idUser();
   header("location: index.php");
  
  }elseif($result==10){
    echo
    "<script> alert('Wrong password'); </script>";
  }elseif($result==100){
    echo
    "<script> alert('User not registered'); </script>";
  }
}

?>


<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logo.png">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/login.css">
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
          <form  action="" id="form" method="post" autocomplete="off">
             <div class="input-group">
              <div class="input-field" >
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" id="usernamelogin" name="usernamelogin" required>
             
              </div>
     
           <div class="input-field">
             <i class="fa-solid fa-lock"></i>
             <input type="password" placeholder="Password" id="password" required name="password"> 
               <div id="eye"> 
                 <i class="fa-solid fa-eye-slash" style="cursor: pointer;"></i> </div>
            
                </div>
       
    
           <div id="fpass">
     <a href="forgotten.php" id="forget">Forgotten your password?</a></div>
             </div>
             <div class="b-field">
                 <button type="submit" name="submit"  id="subtn">Sign in</button>
            <button type="button" onclick="window.location.href='register.php'" id="sibtn">Sign up</button>
            
         </div>
         
          </form>
    
     
     </div>

     </div>
     
   </section>

   <?php
include_once 'footer.php'
  ?>
 <script>
  const bar = document.getElementById('bar');
  const icon = document.getElementById('icons');
  
  if(bar){
    bar.addEventListener('click',() =>{
  icon.classList.add('active');
    })}
  
    const icons = document.getElementById("icons");
const dong = document.getElementById("close");
const barmenu = document.getElementById('bar');
dong.addEventListener("click", function() {
 
  icons.style.right = "-300px";
});
barmenu.addEventListener("click", function() {
  icons.style.right = "0px";
});

window.addEventListener("resize", function() {

if (window.innerWidth >= 1138) {
  icons.classList.remove('active');
}
else{
    icons.style.right="-300px";
   }
}
);
   </script>

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



</script>


