<?php
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;
}

$register  = new Register();
if (isset($_POST["submit"])) {
  // Check if the required keys are set in the $_POST array
  $username = isset($_POST["username"]) ? $_POST["username"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $password2 = isset($_POST["password2"]) ? $_POST["password2"] : "";
  $diachi = isset($_POST["diachi"]) ? $_POST["diachi"] : "";
  $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
  $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
  $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
  $imguser = isset($_POST["imguser"]) ? $_POST["imguser"] : "";
  $role = isset($_POST["role"]) ? $_POST["role"] : "";

  $result = $register->registration(
      $username,
      $email,
      $password,
      $password2,
      $diachi,
      $fullname,
      $phone,
      $birthday,
      $gender,
      $imguser,
      $role
  );

  if ($result == 1) {
      echo "<script> alert('Registration Successful'); </script>";
      header("location: login.php");
  } elseif ($result == 10) {
      echo "<script> alert('Username or Email has already taken'); </script>";
  } elseif ($result == 100) {
      echo "<script> alert('Password does not match'); </script>";
  }
}

?>

<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logo.png">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/register.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
 <title>Sign Up</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

 <section id="section-login">
    <div class="container" id="container">
     <div class="f-box" id="fbox">
          <h1 id="tittle">Sign Up</h1>
          <form  action="" id="form" method="post" autocomplete="off">
             <div class="input-group">
              
              <div class="input-field" >
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" name="username" id="username" required >
             
              </div>

              <div id="fpass">
           <div class="input-field">
             <i class="fa-solid fa-envelope" id="mail"></i>
             <input  type="text" placeholder="Email" id="email" name="email" required> 
             
            </div>

          

           <div class="input-field">
             <i class="fa-solid fa-lock"></i>
             <input type="password" placeholder="Password" name="password" id="password" required> 
           
    
            </div>
            <div class="input-field">
              <i class="fa-solid fa-lock"></i>
              <input type="password" placeholder="Confirm password" name="password2" id="password2" required> 
            
            </div>

             <div class="b-field">
                 <button type="button" onclick="window.location.href='login.php'" id="subtn" >Sign in</button>
             <button type="submit" onclick="" name="submit" id="sibtn">Sign up</button>
            
         </div>
          </form>
     </div>
     </div>
    
     <div class="popup" id="popup">
<img src="assets/images/pic/404-tick.png">
<h2>Thank you!</h2>
<p>You have successfully registered</p>
<button type="button" onclick="closePopup()">OK</button>
     </div>
   </section>

 <footer>
  <div id="all-footer">
  <div id="fo-text">
    <div id="long1">
      <div id="seprator1">
        <hr class="ruler1">
      </div>
    </div>
    <div id="col">
      <h2>
  ABOUT US
      </h2>
      <ul>
        <li><a href="" target="_blank">Our Company</a></li>
        <li><a href="" target="_blank">Careers</a></li>
        <li><a href="" target="_blank">Information</a></li>
        <li><a href="" target="_blank">News</a></li>
      </ul>
    </div>
  
      <div id="col">
        <h2>
  GET HELP
        </h2>
        <ul>
          <li><a href="" target="_blank">FAQs</a></li>
          <li><a href="" target="_blank">Order Status</a></li>
          <li><a href="" target="_blank">Contact Us</a></li>
          
        </ul>
      </div>
      <div id="col">
        <h2>
    JURIDICAL
        </h2>
        <ul>
          <li><a href="" target="_blank">Policy</a></li>
          <li><a href="" target="_blank">Cookie Policy</a></li>
          <li><a href="" target="_blank">Terms & Conditions</a></li>
         
        </ul>
      </div>
      <div id="col">
       
        <ul>
          <li><a href="" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href="" target="_blank"><i class="fa-brands fa-instagram"></i>
        </a></li>
          <li><a href="" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
          <li><a href="" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
        </ul>
    </div>
    
      <div id="long">
        <div id="seprator">
          <hr class="ruler">
        </div>
      </div>
  
     <div class="copyright">
      <p>© 2023 - Vietnam Company</p>
      </div>
  
  </div>
     
     </footer>

 <script>
  const bar = document.getElementById('bar');
  const icon = document.getElementById('icons');
 
  if(bar){
    bar.addEventListener('click',() =>{
  icon.classList.add('active');
    })}
   
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
  const icons = document.getElementById("icons");
const dong = document.getElementById("close");
const barmenu = document.getElementById('bar');
dong.addEventListener("click", function() {
 
  icons.style.right = "-300px";
});
barmenu.addEventListener("click", function() {
  icons.style.right = "0px";
});
</script>





