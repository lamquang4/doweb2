<?php

if (basename($_SERVER['PHP_SELF']) === 'header.php') {
   
    header('Location: index.php');
    exit();
}
if(isset($_GET['action']) && isset($_GET['id'])){
  if($_GET['action'] == "remove"){
      foreach($_SESSION['shopping_cart'] as $keys => $values){
          if($values["item_id"] == $_GET['id']){
              unset($_SESSION['shopping_cart'][$keys]);
          }
          header('Location: shop.php');
      }
  }
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
      <form method="GET" action="shop.php#product11">
        <button type="submit">
        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
      <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
  </svg>
        </button>
 

    <input id="search-item" type="text" placeholder="Search" name="text" class="input" tabindex="1">
   
</form>
  </div> 
      <li id="menu" ><a id="cart-icon">
      <div class="cart-follow-icon">
    <i class="fa-solid fa-cart-shopping add-cart"></i>
    <?php if(isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])): ?>
        <span id="count-cart-add" style="font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">!</span>
        <?php else: ?>
        <span id="count-cart-add" style="font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
    <?php endif; ?>
      
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

<h2>Hello <?php echo $user["username"]; ?></h2>
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
    <?php if(isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])): ?>
        <span id="count-cart-add1" style="font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">!</span>
        <?php else: ?>
        <span id="count-cart-add1" style="font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
    <?php endif; ?>
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
    <h2 class="cart-title" style="margin-bottom: 16px;">Your Cart</h2>
    <form method="post" action="" onsubmit="return checkloginyet()">
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                <div class="cart-content" style="margin-bottom: 34px;">
                    
                    <div class="cart-box">
                        <img src="<?php echo $values["item_img"]; ?>" alt="" class="cart-img">
                        <div class="detail-box">
                            <input type="hidden" value="<?php echo $values["item_id"]; ?>">
                            <div class="cart-product-title"><?php echo $values["item_name"]; ?></div>
                            <div class="cart-price">$<?php echo $values["item_price"]; ?>.00</div>
                            <p style="font-size:13px; font-style: italic;">LIMIT: 10 PER PERSON</p>
                            <input type="text" min="1" max="10" maxlength="1" class="cart-quantity"
                                   value="<?php echo $values["item_quantity"]; ?>" readonly>
                        </div>

                        <a href='shop.php?action=remove&id=<?php echo $values["item_id"]; ?>#product11'><i
                                    class='bx bx-trash cart-remove' id="remove-counter"></i></a>
                    </div>
                </div>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
        } else {
          
            ?>
            <div class="cart-content">
                <div class="simply-cart">
                    <img src="assets/images/pic/empty-cart.png">
                </div>
            </div>
            <?php
            $total = 0;
        }
        ?>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$<?php echo $total ?>.00</div>
        </div>

        <button type="submit" class="btn-buy" name="submit">CHECKOUT</button>

        <i class="fa-solid fa-x" id="cart-close"></i>
    </form>
</div>


<div id="overlay"></div>



<script>
    const bar = document.getElementById('bar');
    const icon = document.getElementById('icons');
   
    if(bar){
      bar.addEventListener('click',() =>{
    icon.classList.add('actives');
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
    
      icons.classList.remove('actives');
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
    if (isLoggedIn && <?php echo !empty($_SESSION["shopping_cart"]) ? 'true' : 'false'; ?>) {
        window.location.href = "pay.php";
       return false;
    }
    else if (isLoggedIn) {
      
    }else {
        alert("You must be a registered customer to make a purchase.");
        window.location.href = "register.php";
        return false;
    }
    if (<?php echo empty($_SESSION["shopping_cart"]) ? 'true' : 'false'; ?>) {
      alert('There is no item in cart yet!');
      return false;
    }

 return true;
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
        window.location.href = 'shop.php?text=' + encodeURIComponent(searchText) + '#product11';
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
  
