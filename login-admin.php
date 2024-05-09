<?php
require 'config.php';

$loginad = new Loginad();
if (isset($_SESSION["loginad"]) && $_SESSION["loginad"] === true) {
    header("location: admin-strator.php");
    exit;
  
  }
  
if (isset($_POST["submit"])) {
    $result = $loginad->loginad($_POST["username"], $_POST["password"]);

    if ($result == 1) {
        $adStatus = $loginad->getAdStatus($loginad->idUserad());
        if($adStatus == 0){
            echo "<script> alert('Your account is blocked.'); window.location.href='login-admin.php';</script>";
        }else{
            $_SESSION["loginad"] = true;
            $_SESSION["idad"] = $loginad->idUserad();
            $_SESSION["username"] = $_POST["username"]; 
            echo "<script> window.location.href='admin-strator.php'; </script>";
            exit;
        }
     
    } elseif ($result == 10) {
        echo "<script> alert('Wrong password'); </script>";
    }elseif($result==100){
        echo
        "<script> alert('Wrong username or password!'); </script>";
      }
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <link rel="stylesheet" href="assets/css/lg-admin.css">
         
    <title>Login</title> 
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login For Manager</span>

                <form action="login-admin.php" method="POST" onsubmit="return kttrong()">
                    <div class="input-field">
                        <input name="username" id="username" type="text" placeholder="Enter your username" required maxlength="10">
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input name="password" id="password" type="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                    
                    </div>

                    <div class="input-field button">
                        <input name="submit" type="submit" value="Login">
                    </div>
                </form>

        
            </div>

        
        </div>
    </div>

  
</body>
</html>



<script>
  const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

    function kttrong(){
        var username = document.getElementById('username').value;
        var usernameRegex = /^[a-zA-Z0-9\s]+$/;
        if (!usernameRegex.test(username)) {
        alert("Username must contain only letters and numbers.");
    
        return false;
    } 
    return true
    }
</script>

