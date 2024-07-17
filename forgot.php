<?php
require 'config.php';

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  header("location: index.php");
  exit;

}
if (isset($_GET['action']) && $_GET['action'] == 'goback'){
  unset($_SESSION['otp']);
  unset($_SESSION['userEmail']);
  unset($_SESSION['otp_time']);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

if (isset($_POST["submit"])) {
      $otp = rand(100000, 999999); 
      $_SESSION['otp'] = $otp; 
      $_SESSION['userEmail'] = $_POST['userEmail'];
      $_SESSION['otp_time'] = time(); 
      $mail = new PHPMailer(true);

      try {
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'alldrinkshop668@gmail.com';
          $mail->Password = 'yvpu zcyb xfyq nico'; // Gmail app password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
          $mail->Port = 465;

          $mail->setFrom('alldrinkshop668@gmail.com', 'H2O');
          $mail->addAddress($_POST['userEmail']);

          $mail->addEmbeddedImage('assets/images/pic/logo.png', 'logo_cid');

          $mail->isHTML(true);
          $mail->Subject = 'Your OTP Code';
          $mail->Body = '
  <div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif;">
                <img src="cid:logo_cid" alt="Logo" style="width: 130px; height: auto; margin-bottom: 20px;">
                <h1 style="color: black;">Reset your password</h1>
                <p style="color: #000;">Your OTP code is: ' . $otp . '</p>
                <p style="color: #000;">If you have any questions, reply to this email or contact us at <a href="mailto:alldrinkshop668@gmail.com" style="color: black; font-weight:550;">alldrinkshop668@gmail.com</a></p>
            </div>
      ';

          $mail->send();
          header("Location: forgot.php");
          exit();
      
      } catch (Exception $e) {
       
      }
  } elseif (isset($_POST['userOTP']) && isset($_POST['otp_submit'])) {
    if (time() - $_SESSION['otp_time'] > 120) {
      $_SESSION['fail'] = 'OTP has expired';
     echo '<script>window.location.href="forgot.php";</script>';
     exit;
  } else{
       if ($_POST['userOTP'] == $_SESSION['otp']) {
          $_SESSION['verified'] = true;
          unset($_SESSION['otp']);
          header("Location: resetpass.php");
          exit();
      } 
  }
    
 
  } 

  $remainingTime = isset($_SESSION['otp_time']) ? 120 - (time() - $_SESSION['otp_time']) : 120;
      if ($remainingTime < 0) {
        $remainingTime = 0;
    }

  if(isset($_GET['action']) && $_GET['action'] == 'sendagain'){
    $otp = rand(100000, 999999); 
    $_SESSION['otp'] = $otp; 
    $_SESSION['userEmail'] = $_SESSION['userEmail'];
    $_SESSION['otp_time'] = time(); 
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alldrinkshop668@gmail.com';
        $mail->Password = 'yvpu zcyb xfyq nico'; // Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('alldrinkshop668@gmail.com', 'H2O');
        $mail->addAddress($_SESSION['userEmail']);

        $mail->addEmbeddedImage('assets/images/pic/logo.png', 'logo_cid');

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = '
<div style="max-width: 800px; margin: 0 auto; font-family: Arial, sans-serif;">
              <img src="cid:logo_cid" alt="Logo" style="width: 130px; height: auto; margin-bottom: 20px;">
              <h1 style="color: black;">Reset your password</h1>
              <p style="color: black;font-size:16px;">Your OTP code is: ' . $otp . '</p>
              <p style="color: black;font-size:15px;">If you have any questions, reply to this email or contact us at <a href="mailto:alldrinkshop668@gmail.com" style="color: black; font-weight:550;">alldrinkshop668@gmail.com</a></p>
          </div>
    ';

        $mail->send();
        header("Location: forgot.php");
        exit();
    
    } catch (Exception $e) {
     
    }
  }
?>

<!DOCTYPE html>
<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/forgot.css">
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
        

     <?php if (!isset($_SESSION['otp'])) { ?>
      <h1 id="tittle">Forgot Password</h1>
  <form action="forgot.php" id="form" method="post">
    <div class="input-group">
      <div class="input-field">
        <i class="fa-solid fa-envelope" style="font-size: 18px;"></i>
        <input type="email" placeholder="Enter Email" id="userEmail" name="userEmail" required>
      </div>
      <div id="fpass">
        <a href="login.php" id="forget">Return to Sign in</a>
      </div>
    </div>
    <div class="b-field">
      <button type="submit" name="submit" id="subtn">Next</button>
    </div>
  </form>
<?php } elseif (isset($_SESSION['otp']) && isset($_SESSION['userEmail'])) { ?>
  <h1 id="tittle">Forgot Password</h1>
  <form action="" id="form" method="post">
    <div class="input-group">
      <div class="input-field">
        <i class="fa-solid fa-envelope" style="font-size: 18px;"></i>
        <input type="text" placeholder="Enter OTP" id="userOTP" name="userOTP" required>
      </div>
  
      <div id="fpass">
        <a href="forgot.php?action=goback" id="forget">Go back</a>
        <?php if ($remainingTime > 0){ ?>
                <a id="countdown"><?php echo $remainingTime . ' seconds remaining'; ?></a>
            <?php }else if($remainingTime <= 0){ ?>
              <a href="forgot.php?action=sendagain" id="sendOtpAgain">Send OTP again</a>
        <?php } ?>
        <a href="forgot.php?action=sendagain" id="sendOtpAgain" style="display: none;">Send OTP again</a>
      </div>
    </div>
    <div class="b-field">
        <button type="submit" name="otp_submit" id="subtn">Submit</button>
      </div>
  </form>
<?php } ?>

     </div>

     </div>
     
   </section>

   <?php
include_once 'footer.php'
  ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
 var countdown = <?php echo $remainingTime; ?>;
    var countdownElement = document.getElementById('countdown');
    var sendOtpAgainElement = document.getElementById('sendOtpAgain');

    var countdownInterval = setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown + ' seconds remaining';

        if (countdown <= 0) {
            clearInterval(countdownInterval);
            countdownElement.style.display = 'none';
            sendOtpAgainElement.style.display = 'inline';
        }
    }, 1000);
</script>

<script>
           document.addEventListener('DOMContentLoaded', function() {

    <?php if(isset($_SESSION['fail'])): ?>
     swal('Fail!', '<?php echo $_SESSION['fail']; ?>', 'error');
     <?php unset($_SESSION['fail']); ?> 
    <?php endif; ?>

});
</script>