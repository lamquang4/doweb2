<?php
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;
}

$register  = new Register();
if (isset($_POST["submit"])) {
 
  $username = trim(isset($_POST["username"]) ? $_POST["username"] : "");
  $email = trim(isset($_POST["email"]) ? $_POST["email"] : "");
  $password = md5(trim(isset($_POST["password"]) ? $_POST["password"] : ""));
  $password2 = md5(trim(isset($_POST["password2"]) ? $_POST["password2"] : ""));
  $sonha = trim(isset($_POST["sonha"]) ? $_POST["sonha"] : "");
  $duong = trim(isset($_POST["duong"]) ? $_POST["duong"] : "");
  $district = isset($_POST["district"]) ? $_POST["district"] : "";
  $ward = isset($_POST["ward"]) ? $_POST["ward"] : "";
  $city = isset($_POST["city"]) ? $_POST["city"] : "";
  $fullname = trim(isset($_POST["fullname"]) ? $_POST["fullname"] : "");
  $phone = trim(isset($_POST["phone"]) ? $_POST["phone"] : "");
  $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
  $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
  $imguser = isset($_POST["imguser"]) ? $_POST["imguser"] : "";
  $status = isset($_POST["status"]) ? $_POST["status"] : "";
  
  $result = $register->registration(
      $username,
      $email,
      $password,
      $password2,
      $sonha,
      $duong,
      $district,
      $ward,
      $city,
      $fullname,
      $phone,
      $birthday,
      $gender,
      $imguser,
      $status
  );

  if ($result == 1) {
      echo "<script> alert('Registration Successful'); window.location.href='login.php'; </script>";
  
  } elseif ($result == 10) {
      echo "<script> alert('Username or Email has already taken'); </script>";
  } elseif ($result == 100) {
      echo "<script> alert('Password and Confirm Password does not match'); </script>";
  }
}

?>

<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
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
     <div class="f-box">
          <h1 id="tittle">Sign Up</h1>
          <form  action="" id="form" onsubmit="return kttrong()" method="post" autocomplete="off">
             <div class="input-group">
              <div class="input-field" >
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" id="username" maxlength="10" name="username" required>
             
              </div>

              <div class="input-field" >
              <i class="fa-solid fa-envelope" style="font-size: 18px;"></i>
                <input type="text" placeholder="Email" id="email" maxlength="50" name="email" required>
             
              </div>
     
           <div class="input-field">
             <i class="fa-solid fa-lock"></i>
             <input type="password" placeholder="Password" id="password" maxlength="20" required name="password"> 
              
            
                </div>

                <div class="input-field">
             <i class="fa-solid fa-lock"></i>
             <input type="password" placeholder="Confirm password" id="password2" maxlength="20" required name="password2"> 
 
                </div>
          
            
             <div class="b-field">
                
            <button type="submit" name="submit"  id="sibtn">Sign up</button>
            
         </div>
          
         <div style="margin-top:20px; text-align:center;" >
  <span style="font-size:17px">Already have an account?   <a href="login.php" style="color: #0093f5;">Sign in</a></span>

</div>
 
      
         
          </form>

     
     </div>

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

 

 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
  function kttrong() {
    var email = document.getElementById("email").value.trim();
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var usernameRegex = /^[a-zA-Z0-9]+$/;
  if (!usernameRegex.test(username)) {
        alert("Username must contain only letters and numbers, without spaces.");  
        return false;
    } 
    if (!emailRegex.test(email)) {
        alert("Invalid Email.");
        return false;
    }
    if(username.length<6){
      alert('The username must be over 6 characters.');
      return false;
    }
    if(password.length<6){
      alert('The password must be over 6 characters.');
      return false;
    }
    return true;
}
</script>







