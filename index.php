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
<body style="background-color: #fff;">
<?php
include_once 'header.php'
  ?>

 <section class="commercial-index">
  <div class="content-index">
  <div class="textBox-index">
      <h2>Welcome To<br><span>Our Shop</span></h2>
      <p>Water is essential for life.</p>
        <p>Stay hydrated with our refreshing water.</p>
     <div id="text-link-index">
        <a href="shop.html">Shop Now</a>
     </div>
       
  </div>
  <div class="imgBox-index">
      <img src="assets/images/sp/cocaopen10.png" class="pepsi">
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
      <img src="assets/images/sp/fantacommer.png" alt="img" draggable="false" >
      <img src="assets/images/sp/drink1.png" alt="img" draggable="false" >
      <img src="assets/images/sp/drink2.png" alt="img" draggable="false">
     
     
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
  icons.style.right = "0";

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
    const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
      
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;

    if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
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

