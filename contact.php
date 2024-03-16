<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
    
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
<body style="background-color: #F1F1F1;">
<?php
include_once 'header.php'
  ?>

  
   <section id="contact-all">
   
    <div class="contact-wrapper">
     
      <ul class="contact-carousel">
        <li class="contact-card">
          <div class="contact-img"><img src="assets/images/pic/quang.png" alt="img" draggable="false"></div>
          <h2>Lam Dieu Quang</h2>
          <span>lamdieuquang0105@gmail.com</span>
          <div class="contact-icon"> 
            <i class="fa-brands fa-facebook"></i> 
            <i class="fa-brands fa-square-github"></i> 
            <i class="fa-brands fa-twitter"></i>
           </div>
        </li>
        <li class="contact-card">
          <div class="contact-img"><img src="assets/images/pic/tam.png" alt="img" draggable="false"></div>
          <h2>Nguyen Thanh Tam</h2>
          <span>nguyenthanhtam123@gmail.com</span>
          <div class="contact-icon"> 
            <i class="fa-brands fa-facebook"></i> 
            <i class="fa-brands fa-square-github"></i> 
            <i class="fa-brands fa-twitter"></i>
           </div>
        </li>
        <li class="contact-card">
          <div class="contact-img"><img src="assets/images/pic/anh.png" alt="img" draggable="false"></div>
          <h2>Nguyen Duc Hoang Anh</h2>
          <span>canh102007@gmail.com</span>
          <div class="contact-icon"> 
            <i class="fa-brands fa-facebook"></i> 
            <i class="fa-brands fa-square-github"></i> 
            <i class="fa-brands fa-twitter"></i>
           </div>
        </li>
      
      </ul>
     
    </div>

   </section>
   <?php
include_once 'footer.php'
  ?>
     


<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

  </script>