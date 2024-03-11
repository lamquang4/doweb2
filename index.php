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
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <title>Home</title>
</head>
<body style="background-color: #F8F8F8;">
<?php
include_once 'header.php'
  ?>

 <section class="commercial-index">
  <div class="content-index">
  <div class="textBox-index">
  <h2>Explore<br><span>Our Shop</span></h2>
      <p> A World Of Delightful Drinks</p>
        <p>Stay Hydrated And Refreshing</p>
     <div id="text-link-index">
        <a href="shop.php">Shop Now</a>
     </div>
       
  </div>
  <div class="imgBox-index">
      <img src="assets/images/sp/drinkss2.png">
  </div>
  </div>


</section>



 <div id="bet"><h5>Explore Our Products</h5></div>
 <section id="all">
  <div class="wrapper">
    <i id="left" class="fa-solid fa-arrow-left"></i>
    <div class="carousel">

  
      <img src="assets/images/sp/drink11.png" alt="img" draggable="false" >
      <img src="assets/images/sp/drink3.png" alt="img" draggable="false" >  
      <img src="assets/images/sp/cocacommer.png" alt="img" draggable="false" >
     
      <img src="assets/images/sp/drink1.png" alt="img" draggable="false" >
     
     
    </div>
    <i id="right" class="fa-solid fa-arrow-right"></i>
  </div>
  </section>
 <div id="bet"><h5>Popular Service</h5></div>
 
 <section class="postcard">
  
  <div class="box">
    <img src="assets/images/pic/alldrinks.png">
    <h2 style="letter-spacing: 0.5px;">Enjoy our fresh drinks </h2>
    <p style="padding-bottom: 5px; letter-spacing: 0.8px;">We are always proactive in understanding user needs and 
      are passionate about creating drinks with great flavors</p>
      <button id="btn-blog" onclick="window.location.href='brand.html'">Learn More <i class="fa-solid fa-arrow-right"></i></button>
    </div>
  <div class="box">
    <img src="assets/images/pic/cocafamily1.png">
    <h2 style="letter-spacing: 0.5px;">For a world without waste</h2>  
    <p style="padding-bottom: 5px; letter-spacing: 0.8px;">We contribute to solving packaging problems
      through investments in the environment and packaging processes</p>
      <button id="btn-blog" onclick="window.location.href='shop.html'">Learn More <i class="fa-solid fa-arrow-right"></i></button>
    </div>
 </section>
 <?php
include_once 'footer.php'
  ?>
  

  

  <script>
    const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

const showHideIcons = () => {

    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; 
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; 
      
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); 
    });
});

const autoSlide = () => {

    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); 
    let firstImgWidth = firstImg.clientWidth + 14;
    
    let valDifference = firstImgWidth - positionDiff;

    if(carousel.scrollLeft > prevScrollLeft) { 
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }

    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const dragStart = (e) => {

    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
 
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}

const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");

    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);


</script>



<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

  </script>

