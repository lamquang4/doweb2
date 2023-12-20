<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
    
  }

?>
<!DOCTYPE html>
<link rel="stylesheet" href="assets/css/main.css">
<link rel="icon" type="image/png" href="assets/images/pic/logo.png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  <title>Brands</title>
</head>
<body>
  <section id="header">
    <a href="index.php">
  <img src="assets/images/pic/logo.png" class="logo" alt="" >
   </a>
  <div>
   <ul id="icons">
    
  <li id="menu"><a href="index.php"  class="choose" ><span>Home</span></a></li>
          <li id="menu"><a  class="act-on" class="choose"><span class="act-on">Brands</span></a></li>
         
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
<section id="product1">
<div>
    <h6>EXPLORE OUR BRANDS</h6>
  
</div>

    <div class="pro-container">
        <div class="pro">
          <a >
            
      <img  src="assets/images/pic/coca.png" id="img1" alt="">
      
      </a>
     
      </div> 
      <div class="pro">
        <a >
        <img src="assets/images/pic/fanta.png" alt=""></a>
     
  </div> 
  <div class="pro">
    <a>
    <img src="assets/images/pic/tea.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/sprite.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/thumb.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/pepsilogo.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/dasani.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/aquarius.png" alt=""></a>
 
</div> 
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

const search = () => {
    if (event.keyCode === 13) {
window.location.href='shop.html';
    }};
   </script>

<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

  </script>