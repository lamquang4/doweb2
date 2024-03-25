<?php

if (basename($_SERVER['PHP_SELF']) === 'header.php') {
   
    header('Location: index.php');
    exit();
}

?>
 
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<section id="header" >
    <a href="index.php">
  <img src="assets/images/pic/logo.png" class="logo" alt="" >
   </a>
  <div>
   <ul id="icons">
    
  <li id="menu"><a href="index.php"  class="choose" ><span>Home</span></a></li>
          <li id="menu"><a href="brand.php" class="choose"><span>Brands</span></a></li>
          <li id="menu" ><a href="shop.php" class="choose"><span>Shop</span></a></li>
         
          <li id="menu"><a href="contact.php" class="choose"><span>Contact</span></a></li>
    
      <div class="group" id="search">
      <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
      <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
  </svg>
  <form method="GET" action="shop.php">
    <input id="search-item" type="text" placeholder="Search" name="text" class="input" tabindex="1">
   
</form>
  </div> 
      <li id="menu" ><a id="cart-icon">
        <div class="cart-follow-icon">
        <i class="fa-solid fa-cart-shopping add-cart"></i>
        <span id="count-cart-add" style="  font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
      </div>
      </a>
      </li>
     
      <?php if(isset($_SESSION["login"])) { ?>
           
            <li id="menu" id="lg-user">
                <a id="userlogin" onclick="toggleMenu()">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </li>
        <?php } else { ?>
           
            <li id="menu" id="lg-user">
                <a href="register.php" id="userlogin">
                    <i class="fa-regular fa-circle-user fa-lg"></i>
                </a>
            </li>
        <?php } ?>
      <a  id="close"><i class="fa-solid fa-x"></i></a>
   </ul>
  </div>

 
    <div class="sub-menu-wrap" id="subMenu">
  <div class="sub-menu">
<div class="user-info">

<h2>Hello <?php echo $user["username"]; ?>!</h2>
</div>
<hr>
<a href="user.php" class="sub-menu-index-link">
  <i class="fa-solid fa-circle-user"></i>
  <p>My Account</p>

</a>

<a href="history.php" class="sub-menu-index-link">
  <i class="fa-solid fa-clock-rotate-left"></i>
  <p>Purchase Order</p>

</a>

<a href="logout.php" class="sub-menu-index-link">
  <i class="fa-solid fa-door-open"></i>
  <p>Logout</p>

</a>

  </div>
</div>

  <div id="mobile"> 
  
    <a id="cart-icon1">
      <div class="cart-follow-icon">
        <i class="fa-solid fa-cart-shopping add-cart"></i>
        <span id="count-cart-add1" style="  font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
      </div>
    </a>
    <a id="glass-search" onclick="showbar()" ><i class="fa-solid fa-magnifying-glass"></i> </a>
    <?php if(isset($_SESSION["login"])) { ?>
          
          <a  id="userlogin" onclick="toggleMenu()"><i class="fa-solid fa-circle-user"></i></a>
                 <?php } else { ?>
         <a href="register.php"><i class="fa-regular fa-circle-user fa-lg" ></i></a>
                 <?php } ?>
  
 <i id="bar" class="fa-solid fa-bars" style="color: #000000;"></i>
  

  </div>

    <div class="search-bars">
      
  <input type="text" placeholder="SEARCH..."  id="searchInput">
<i class="fa-solid fa-xmark" id="xmark" onclick="closebar()"></i>
</div>


   </section>


   <div class="cart">
    <h2 class="cart-title">Your Cart</h2>


    <div class="cart-content" style="display: none;">
    <div class="cart-box">
        <img src="" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title"></div>
            <div class="cart-price"></div>
            <input type="number" value="1" min="1" max="6" class="cart-quantity">
        </div>
     
        <i class='bx bx-trash cart-remove' id="remove-counter"></i>
    </div>

    </div>

    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$0</div>
    </div>

    <button type="button" class="btn-buy" onclick="checkloginyet()">CHECKOUT</button>

    <i class="fa-solid fa-x" id="cart-close"></i>
</div>

<div id="overlay"></div>



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
  htmlElement.style.overflowY = 'scroll';
  searchbars.classList.remove("active25");
        searchbars.style.opacity="0";
        searchbars.style.pointerEvents = 'none';
        overlay.style.display = 'none';
      subMenu.classList.remove("open-menu");
});


window.addEventListener("resize", function() {

    if (window.innerWidth >= 1136) {
      overlay.style.display = 'none';
      carts.classList.remove("act");
    icons.style.right="-300px";
    searchbars.classList.remove("active25");
        searchbars.style.opacity="0";
        searchbars.style.pointerEvents = 'none';
    
      icons.classList.remove('active');
      htmlElement.style.overflowY = "scroll";
    }
   else{
    icons.style.right="-300px";
   }
    }
);
     </script>

<script>
   
       document.getElementById('overlay').addEventListener('click', function() {
    hideOverlayAndSearchBox();
    closebar();
  });
  function hideOverlayAndSearchBox() {
    var overlay = document.getElementById('overlay');
   
    carts.classList.remove("act");
    overlay.style.display = 'none';
    
  }
  </script>

<script>
  const cartIcon=document.querySelector("#cart-icon");
const carts=document.querySelector(".cart");
const closeCart=document.querySelector("#cart-close");
const cartIcon1=document.querySelector("#cart-icon1");

cartIcon.addEventListener('click',()=>{
  carts.classList.add("act");
  overlay.style.display = 'block';
  overlay.style.zIndex = '100';
  searchbars.classList.remove('active25');   
        searchbars.style.opacity="0";
        searchbars.style.pointerEvents = 'none';
        searchbars.style.transition = "0.35s ease-in-out";
      icons.style.right = "-300px";
      subMenu.classList.remove("open-menu");
      htmlElement.style.overflowY = 'scroll';
});
cartIcon1.addEventListener('click',()=>{
  carts.classList.add("act");
  searchbars.classList.remove("active25");
  searchbars.style.opacity="0";
        searchbars.style.pointerEvents = 'none';
        icons.style.right = "-300px";
        htmlElement.style.overflowY = 'scroll';
  overlay.style.display = 'block';
  overlay.style.zIndex = '100';
  icons.style.right = "-300px";
  subMenu.classList.remove("open-menu");
});
closeCart.addEventListener('click',()=>{
  carts.classList.remove("act");
  htmlElement.style.overflowY = 'scroll';
  overlay.style.display = 'none';
 
});

</script>

<script>
function checkloginyet() {

    var isLoggedIn = <?php echo isset($_SESSION["login"]) && $_SESSION["login"] === true ? 'true' : 'false'; ?>;

    if (isLoggedIn) {
      
    
    } else {
     
        alert("You must be a registered customer to make a purchase.");
        window.location.href = "register.php";
    }
}
</script>



<script>
    var htmlElement = document.querySelector('html');
const searchbars=document.querySelector(".search-bars");
    const glasssearch=document.getElementById("glass-search");
function showbar(){
  htmlElement.style.overflow = 'hidden';
        searchbars.classList.add('active25');
        searchbars.style.pointerEvents = 'all';  
        searchbars.style.opacity="1";
        searchbars.style.transition = "0.35s ease-in-out";
        overlay.style.display = 'block';
        overlay.style.zIndex = '98';
      subMenu.classList.remove("open-menu");
    }
    function closebar(){
  htmlElement.style.overflowY = 'scroll';
        searchbars.classList.remove('active25');   
        searchbars.style.opacity="0";
        searchbars.style.pointerEvents = 'none';
        searchbars.style.transition = "0.35s ease-in-out";
        overlay.style.display = 'none';
    }
    </script>
    
<script>
document.getElementById('searchInput').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        var searchText = this.value.trim();
        window.location.href = 'shop.php?text=' + encodeURIComponent(searchText);
    }
});

    </script>
    
    <script>
  let subMenu = document.getElementById("subMenu");
  function toggleMenu(){
    subMenu.classList.toggle("open-menu");
    overlay.style.display = 'none';
htmlElement.style.overflowY = 'scroll';
searchbars.classList.remove("active25");
searchbars.style.opacity="0";
      searchbars.style.pointerEvents = 'none';
  }
    </script>
    
<style>
    #xmark{
        cursor: pointer;
    }
.search-bars{

    position: absolute;
    left: 0;
bottom: -35%;
    width: 100%;
    height: 25%;
opacity: 0;
display:flex;

    align-items: center;
  padding: 20px 0;
 
    pointer-events: none;
    background-color: #fff;

}
.search-bars.active25{
    bottom: -52%;
  
}
.search-bars input{
    border-bottom: 1.2px solid #E6E6E6;
    border-top: 1.2px solid #E6E6E6;
    border-right: none;
    border-left: none;
    padding: 0px 35px;
    width: 100%;
   font-size: 18px;
    height: 90px;
 letter-spacing: .2em;

    outline: none;
    color: #000000;
    background-color: #fff;
   
}
.search-bars i{
  position: absolute;
  right:8%;
  font-size: 27px;
}
@media (max-width:480px){
    .search-bars input{
   font-size: 18px;
    height: 60px;

   
} 
.search-bars.active25{
    bottom: -50%;
}
.search-bars i{

font-size: 22px;
}
}
@media (max-width:400px){
    .search-bars input{

   font-size: 16px;
    height: 60px;  
} 
.search-bars.active25{
    bottom: -47%;
}
.search-bars i{

  font-size: 22px;
}
}
    </style>





