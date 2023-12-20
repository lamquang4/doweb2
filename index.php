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

  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <title>Home</title>
</head>
<body style="background-color: #fff;">
 <section id="header">
  <a href="index.php">
    <img src="assets/images/pic/logo.png" class="logo" alt="" >
 </a>
<div>

 <ul id="icons">
  
<li id="menu"><a  class="act-on" class="choose" ><span class="act-on">Home</span></a></li>
        <li id="menu" ><a href="brand.php" class="choose"><span>Brands</span></a></li>
       
        <li id="menu" class="dropdown__item" class="choose">                      
          <a href="shop.php" class="choose"><span>Shop</span></a>
          <div class="dropdown__container">
            <div class="dropdown__content">
                <div class="dropdown__group">
                    <div class="dropdown__icon">
                     <img src="assets/images/pic/coca.png">
                    </div>

                    <span class="dropdown__title">COCA-COLA</span>

                    <ul class="dropdown__list">
                        <li>
                            <a href="#" class="dropdown__link">Coca Original</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown__link">Coca Zero Sugar</a>
                        </li>
                        <li>
                          <a href="#" class="dropdown__link">Coca Plus Fiber</a>
                      </li>
                      <li>
                        <a href="#" class="dropdown__link">Coca Light</a>
                    </li>
                   
                    </ul>
                </div>

                <div class="dropdown__group">
                    <div class="dropdown__icon">
                      <img src="assets/images/pic/pepsilogo.png">
                    </div>

                    <span class="dropdown__title">PEPSI</span>

                    <ul class="dropdown__list">
                        <li>
                            <a href="#" class="dropdown__link">Pepsi Original</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown__link">Pepsi Zero Calo</a>
                        </li>
                        <li>
                          <a href="#" class="dropdown__link">Pepsi Lemon</a>
                      </li>
                      <li>
                        <a href="#" class="dropdown__link">Pepsi Nitro</a>
                    </li>
                    </ul>
                </div>

                <div class="dropdown__group">
                    <div class="dropdown__icon">
                      <img src="assets/images/pic/fanta.png">
                    </div>

                    <span class="dropdown__title">FANTA</span>

                    <ul class="dropdown__list">
                        <li>
                            <a href="#" class="dropdown__link">Fanta Orange Flavor</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown__link">Fanta Grape Flavor</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown__link">Fanta Sassafras Scent</a>
                        </li>
                       
                    </ul>
                </div>

                <div class="dropdown__group">
                    <div class="dropdown__icon">
                       <img src="assets/images/pic/sprite.png">
                    </div>
                    <span class="dropdown__title">SPRITE</span>
                    <ul class="dropdown__list">
                        <li>
                            <a href="#" class="dropdown__link">Sprite Bottle</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown__link">Sprite Can</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown__group">
                  <div class="dropdown__icon">
                     <img src="assets/images/pic/aquarius.png">
                  </div>
                  <span class="dropdown__title">AQUARIUS</span>
                  <ul class="dropdown__list">
                      <li>
                          <a href="#" class="dropdown__link">Aquarius Gas</a>
                      </li>
                      <li>
                          <a href="#" class="dropdown__link">Quarius Zero Calo</a>
                      </li>
                  </ul>
              </div>
              <div class="dropdown__group">
                <div class="dropdown__icon">
                   <img src="assets/images/pic/dasani.png">
                </div>

                <span class="dropdown__title">DASANI</span>

                <ul class="dropdown__list">
                    <li>
                        <a href="#" class="dropdown__link">Dasani Water</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown__link">Dasani Mineralized</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown__group">
              <div class="dropdown__icon">
                 <img src="assets/images/pic/thumb.png">
              </div>

              <span class="dropdown__title">THUMBS UP</span>

              <ul class="dropdown__list">
                  <li>
                      <a href="#" class="dropdown__link">Thumbs Up Kiwi</a>
                  </li>
                  <li>
                      <a href="#" class="dropdown__link">Thumbs Up Kiwi</a>
                  </li>
              </ul>
          </div>
          <div class="dropdown__group">
            <div class="dropdown__icon">
               <img src="assets/images/pic/tea.png">
            </div>

            <span class="dropdown__title">FUZETEA+</span>

            <ul class="dropdown__list">
                <li>
                    <a href="#" class="dropdown__link">Peach Tea</a>
                </li>
                <li>
                    <a href="#" class="dropdown__link">Lemon Tea</a>
                </li>
                <li>
                  <a href="#" class="dropdown__link">Passion Tea</a>
              </li>
            </ul>
        </div>
            </div>
        </div>
        </li>
        <li id="menu"><a href="contact.php" class="choose"><span>Contact</span></a></li>
  
    <div class="group" id="search">
    <input type="text" placeholder="Search" name="text" class="input" onkeyup="search()">
  <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
    <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
</svg>
</div> 
    <li id="menu" id="lg-bag"><a href="shop.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </li>
   
    <?php if(isset($_SESSION["id"])) { ?>
            <!-- Display this when the user is logged in -->
            <li id="menu" id="lg-user">
                <a id="userlogin" onclick="toggleMenu()">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </li>
        <?php } else { ?>
            <!-- Display this when the user is not logged in -->
            <li id="menu" id="lg-user">
                <a href="register.php" id="userlogin">
                    <i class="fa-regular fa-circle-user fa-lg"></i>
                </a>
            </li>
        <?php } ?>
   
    <a id="close"><i class="fa-solid fa-x"></i></a>
 </ul>
</div>

<div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="assets/images/pic/custome1.png">
                <h2><?php echo $user["username"]; ?></h2>
            </div>
            <hr>
            <a href="user.php" class="sub-menu-index-link">
                <img src="assets/images/pic/profile.png">
                <p>Edit Profile</p>
                <span> <i class="fa-solid fa-chevron-right"></i> </span>
            </a>
            <a href="history.php" class="sub-menu-index-link">
                <img src="assets/images/pic/history.png">
                <p>Purchase History</p>
                <span> <i class="fa-solid fa-chevron-right"></i> </span>
            </a>
            <a href="logout.php" class="sub-menu-index-link">
                <img src="assets/images/pic/logout.png">
                <p>Logout</p>
                <span> <i class="fa-solid fa-chevron-right"></i> </span>
            </a>
        </div>
    </div>

<div id="mobile"> 

  <a href="shop.php"><i class="fa-solid fa-cart-shopping"></i></a>
 
  <?php if(isset($_SESSION["id"])) { ?>
          
 <a  id="userlogin" onclick="toggleMenu()"><i class="fa-solid fa-circle-user"></i></a>
        <?php } else { ?>
<a href="register.php"><i class="fa-regular fa-circle-user fa-lg" ></i></a>
        <?php } ?>

<i id="bar" class="fa-solid fa-bars" style="color: #000000;"></i>

</div>
 </section>


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

   <footer>
<div id="all-footer">
<div id="fo-text">
  <div class="alldrinklogo">
<img src="">

  </div>
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



const search = () => {
    if (event.keyCode === 13) {
window.location.href='shop.html';
    }};
</script>

<style>
  .commercial-index{
    margin-top: 140px;
    position: relative;
    width: 100%;
background-color: #FDF2E9;
    padding: 15px 200px 0px 200px;
     display: flex;
    justify-content: center;

  }
  .content-index{
    position: relative;
    width: 100%;
    align-items: center;
 display: flex;
  justify-content: space-between;
  
}
.imgBox-index img{
  width: 80%;

}
.textBox-index{
  margin-bottom: 55px;
}
.textBox-index h2{
  font-size: 65px;
  font-family: 'Spartan', sans-serif;

 color: #e1961d;
}
.textBox-index span{
color:#18a186;

}
.textBox-index p{
  margin-top: 5px;
  font-size: 22px;
  margin-bottom: 5px;
font-weight: 500;
font-family: 'Spartan', sans-serif;
  
}

.textBox-index #text-link-index{
  margin-top: 35px;

}
.textBox-index a{

 font-size: 20px;
 padding: 15px 25px;
  color:white;
background-color: black;
 font-weight: 600;
 border-radius: 10px;

}

.textBox-index a:hover {
  color: white;
  
}


@media(max-width:768px){
 
  .commercial-index{

    padding: 40px 20px 0px 60px;
 
  }
  .textBox-index h2{
  font-size: 45px;
}

.textBox-index p{

  font-size: 20px;
}
.imgBox-index img{
  width: 80%;

}
}

@media(max-width:480px){
  .commercial-index{
margin-top: 116px;
padding: 20px 20px 0px 20px;

}
.content-index {
    position: relative;
  display: block;
   
}
.imgBox-index{
  margin-top: 30px;
}
.textBox-index {
  margin-top: 5px;
     margin-bottom: 0px;
}
.textBox-index h2{
font-size: 38px;
text-align: center;
}

.textBox-index p{
margin-top: 7px;
font-size: 17px;
text-align: center;
}
.imgBox-index{
  display: flex;
  justify-content: center;
}
.imgBox-index img{
width: 80%;

} 
#text-link-index {
text-align: center;
}
.textBox-index a {
    font-size: 19px;
    margin-top: 15px;
 

}
}
@media(1001px <= width <=1176px){

 .commercial-index{

   padding: 40px 60px 0px 90px;

 }
 .textBox-index h2{
 font-size: 48px;
}

.textBox-index p{
 margin-top: 8px;
 font-size: 22px;
}
.imgBox-index img{
 width: 80%;

}
}
@media(769px<= width <=1001px){
 
 .commercial-index{

   padding: 50px 40px 0px 40px;

 }
 .textBox-index h2{
 font-size: 48px;
}

.textBox-index p{
 margin-top: 8px;
 font-size: 22px;
}
.imgBox-index img{
 width: 80%;

}
}

@media(601px<= width <=694px){
 
 .commercial-index{

   padding: 50px 40px 0px 40px;

 }
 .textBox-index h2{
 font-size: 35px;
}

.textBox-index p{
 margin-top: 8px;
 font-size: 18px;
}
.imgBox-index img{
 width: 80%;

}
.textBox-index a {


    margin-top: 15px;
 

}
}
@media(581px<= width <=600px){
 
 .commercial-index{

   padding: 40px 30px 0px 40px;

 }
 .textBox-index h2{
 font-size: 35px;
}

.textBox-index p{
 margin-top: 8px;
 font-size: 18px;
}
.imgBox-index img{
 width: 80%;

}

.textBox-index a {
   
    margin-top: 15px;


}
}
@media(481px<= width <=580px){
  .commercial-index{
margin-top: 120px;
padding: 50px 20px 0px 20px;

}
.content-index {
    position: relative;
  display: block;
   
}
.imgBox-index{
  margin-top: 35px;
}

.textBox-index h2{
font-size: 35px;
text-align: center;
}

.textBox-index p{
margin-top: 7px;
font-size: 17px;
text-align: center;
}

.imgBox-index img{
width: 75%;

   margin-bottom: 26px;
} 
#text-link-index {
  text-align: center;
}
.imgBox-index{
  display: flex;
  justify-content: center;
}
}
</style>

<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

  </script>