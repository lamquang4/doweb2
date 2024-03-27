<?php
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;
}

$register  = new Register();
if (isset($_POST["submit"])) {
 
  $username = isset($_POST["username"]) ? $_POST["username"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $password2 = isset($_POST["password2"]) ? $_POST["password2"] : "";
  $sonha = isset($_POST["sonha"]) ? $_POST["sonha"] : "";
  $duong = isset($_POST["duong"]) ? $_POST["duong"] : "";
  $quan = isset($_POST["quan"]) ? $_POST["quan"] : "";
  $phuong = isset($_POST["phuong"]) ? $_POST["phuong"] : "";
  $tp = isset($_POST["tp"]) ? $_POST["tp"] : "";
  $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
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
      $quan,
      $phuong,
      $tp,
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
      echo "<script> alert('Password does not match'); </script>";
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
  <div id="content-container"> 
      <h1 id="tittle">Sign Up</h1>

        <form  action="" id="form" onsubmit="return kttrong()" method="post" autocomplete="off">
         
          <div id="main-user-info">
              
              <div class="input-field" >
               
                <input type="text" name="username" placeholder="Username" id="username" maxlength="9" required>
             
              </div>

        
           <div class="input-field">

             <input  type="text" name="email" placeholder="Email" id="email" maxlength="50" required>
         
            </div>


            <div class="input-field">
             
              <input type="password" name="password" placeholder="Password" id="password" maxlength="20" required> 
 
             </div>
 
             <div class="input-field">
             
               <input type="password" name="password2" placeholder="Confirm password" id="password2" maxlength="20" required> 
              
             </div>

            <div class="input-field">
             
                <input  type="text"  placeholder="Enter house number" > 
             
             </div>


             <div class="input-field">
             
              <input type="text"  placeholder="Enter street" >
           
           </div>

             <div class="input-field" >
          
              <select  id="city">
                <option value="" selected>Select City</option> 
            </select>
             </div>


             <div class="input-field" >

              <select id="district">
                <option value="" selected>Select District</option>
                </select>
              </div>

              <div class="input-field" >
                <select id="ward" >
                  <option value="" selected>Select Ward</option>
                  </select>
              </div>
           


             <div class="b-field">
                 <button type="button" onclick="window.location.href='login.php'" id="subtn" >Sign in</button>
             <button type="submit" name="submit" id="sibtn">Sign up</button>
            
         </div>

        </div>

   
          </form>
    
  
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
    var email = document.getElementById("email").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        alert("Invalid Email.");
        return false;
    }else{
      return true
    }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
url: "https://raw.githubusercontent.com/lamquang4/login2/main/data.json", 
method: "GET", 
responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
renderCity(result.data);
});

function renderCity(data) {
for (const x of data) {
citis.options[citis.options.length] = new Option(x.Name, x.Id);
}
citis.onchange = function () {
district.length = 1;
ward.length = 1;
if(this.value != ""){
  const result = data.filter(n => n.Id === this.value);

  for (const k of result[0].Districts) {
    district.options[district.options.length] = new Option(k.Name, k.Id);
  }
}
};
district.onchange = function () {
ward.length = 1;
const dataCity = data.filter((n) => n.Id === citis.value);
if (this.value != "") {
  const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

  for (const w of dataWards) {
    wards.options[wards.options.length] = new Option(w.Name, w.Id);
  }
}
};
}
</script>






