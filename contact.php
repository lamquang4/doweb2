<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
    
  }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

if (isset($_POST["send"])) {
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'alldrinkshop668@gmail.com';
  $mail->Password = 'yvpu zcyb xfyq nico'; //gmail app password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port = 465;

  $mail->setFrom('alldrinkshop668@gmail.com', 'H2O');
  $mail->addAddress($_POST['userEmail']);

  $mail->addEmbeddedImage('assets/images/pic/logo.png', 'logo_cid');
  $mail->isHTML(true);
  $mail->Subject = 'Contact Us';
  $mail->Body = '
  <div style="max-width: 800px; margin: 0 auto; font-family: Arial, sans-serif;">
                <img src="cid:logo_cid" alt="Logo" style="width: 130px; height: auto; margin-bottom: 20px;">
                <h1 style="color: black;">Hello '. $_POST["userFullname"] . '</h1>
                <p style="color: black; font-size:16px;">' . $_POST["userMessage"] . '</p>
               
            </div>
      ';

  if ($mail->send()) {
      $_SESSION['message'] = "Success";
  } else {
      $_SESSION['message'] = "Fail";
  }

  header('Location: contact.php');
  exit();
}

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']); 
?>

<!DOCTYPE html>
<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
 <link rel="stylesheet" href="assets/css/main.css">
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
  <title>Contact</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

   <section id="container-contact">
   <div id="contact-box">
<div class="left-contactbox">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6697268382204!2d106.68225830000002!3d10.7599171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1717673427330!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="right-contactbox">

<?php if(empty($message)){ ?>
  <h2>Contact Us</h2>
<form action="contact.php" method="post">
  <label>Full name</label>
  <input type="text" name="userFullname" class="field-contact" placeholder="Enter full name" required>

<label>Email</label>
  <input type="email" name="userEmail" class="field-contact" placeholder="Enter email" required>

<label>Message</label>
  <textarea type="text" name="userMessage" class="field-contact" placeholder="Write your message" style="min-height: 110px;max-width: 100%; resize: vertical;" required></textarea>
  
<button class="btn-contactbox" type="submit" name="send">Send</button>
</form>
<?php }else{ ?>
<div class="container-send-mail">
  <div class="success-send-mail">
<img src="assets/images/pic/404-tick.png" alt="" width="60px">
<div class="text-send-mail">
  <h3>Your request was sent!</h3>
  <p>We will reach out to you via email soon.</p>
</div>
  </div>
</div>

  <?php } ?>
</div>
   </div>


   </section>
   <?php
include_once 'footer.php'
  ?>