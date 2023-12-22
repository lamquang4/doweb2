<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
    
  }

?>

<!DOCTYPE html>
<link rel="icon" type="image/png" href="assets/images/pic/logo.png">
 <link rel="stylesheet" href="assets/css/main.css">
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
     <style>
 
  
     </style>
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


<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

  </script>