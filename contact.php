<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
    
  }

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
<h2>Contact Us</h2>
<form action="">
  <label>Full name</label>
  <input type="text" class="field-contact" placeholder="Enter full name">

<label>Email</label>
  <input type="email" class="field-contact" placeholder="Enter email">

<label>Message</label>
  <textarea type="text" class="field-contact" placeholder="Write your message" style="min-height: 110px;max-width: 100%; resize: vertical;"></textarea>
  
<button class="btn-contactbox" type="submit">Send</button>
</form>
</div>
   </div>


   </section>
   <?php
include_once 'footer.php'
  ?>