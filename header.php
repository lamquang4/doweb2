<?php

if (basename($_SERVER['PHP_SELF']) === 'header.php') {
   
    header('Location: index.php');
    exit();
}
?>
<section id="header">
    <a href="index.php">
  <img src="assets/images/pic/logo.png" class="logo" alt="" >
   </a>
  <div>
   <ul id="icons">
    
  <li id="menu"><a href="index.php"  class="choose" ><span>Home</span></a></li>
          <li id="menu"><a href="brand.php" class="choose"><span>Brands</span></a></li>
         
          <li id="menu" class="dropdown__item"  class="choose">                      
            <a href="shop.php"  class="choose"><span >Shop</span></a>
         
  
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
                      <a href="#" class="dropdown__link">Passion Tea </a>
                  </li>
                </ul>
            </div>
                </div>
            </div>
          </li>
          <li id="menu"><a href="contact.php" class="choose"><span>Contact</span></a></li>
    
      <div class="group" id="search">
      <input id="search-item" type="text" placeholder="Search" name="text" class="input" onkeyup="search()"  tabindex="1">
    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
      <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
  </svg>
  </div> 
      <li id="menu" ><a id="cart-icon">
        <div class="cart-follow-icon">
        <i class="fa-solid fa-cart-shopping add-cart"></i>
        <span id="count-cart-add" style="  font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
      </div>
      </a>
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
      <a  id="close"><i class="fa-solid fa-x"></i></a>
   </ul>
  </div>

  <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="<?php echo $user["imguser"]; ?>">
                <h2><?php echo $user["username"]; ?></h2>
            </div>
            <hr>
            <a href="user.php" class="sub-menu-index-link">
                <img src="assets/images/pic/profile.png">
                <p>Profile</p>
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
  
    <a id="cart-icon1">
      <div class="cart-follow-icon">
        <i class="fa-solid fa-cart-shopping add-cart"></i>
        <span id="count-cart-add1" style="  font-size: 14px; color:white; font-weight: 500; margin: 0; letter-spacing: 1px;">0</span>
      </div>
    </a>
   
    <?php if(isset($_SESSION["id"])) { ?>
          
          <a  id="userlogin" onclick="toggleMenu()"><i class="fa-solid fa-circle-user"></i></a>
                 <?php } else { ?>
         <a href="register.php"><i class="fa-regular fa-circle-user fa-lg" ></i></a>
                 <?php } ?>
  
  <i id="bar" class="fa-solid fa-bars" style="color: #000000;"></i>
  
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
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- REMOVE CART  -->
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



   <script>
document.addEventListener("DOMContentLoaded", function() {
    var currentPage = window.location.href;

    var links = document.querySelectorAll('.choose');

    links.forEach(function(link) {
        if (link.href === currentPage) {
          
            link.classList.add('act-on');
        }
    });
});
</script>

<script>
  const cartIcon=document.querySelector("#cart-icon");
const carts=document.querySelector(".cart");
const closeCart=document.querySelector("#cart-close");
const cartIcon1=document.querySelector("#cart-icon1");

cartIcon.addEventListener('click',()=>{
  carts.classList.add("act");
});
cartIcon1.addEventListener('click',()=>{
  carts.classList.add("act");
});
closeCart.addEventListener('click',()=>{
  carts.classList.remove("act");
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
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartButton = document.querySelector('.normal');
        const cartContent = document.querySelector('.cart-content');
        const cartBox = document.querySelector('.cart-box');
        const cartImg = document.querySelector('.cart-img');
        const cartProductTitle = document.querySelector('.cart-product-title');
        const cartPrice = document.querySelector('.cart-price');
        const cartQuantity = document.querySelector('.cart-quantity');
        const totalPrice = document.querySelector('.total-price');

        addToCartButton.addEventListener('click', function () {
     
            const productName = '<?php echo $productName; ?>';
            const productImage = '<?php echo $productImage; ?>';
            const productPrice = <?php echo $productPrice; ?>;

            cartImg.src = productImage;
            cartProductTitle.textContent = productName;
            cartPrice.textContent = '$' + productPrice.toFixed(2);
            cartQuantity.value = 1;

            cartContent.style.display = 'block';


            updateTotalPrice(productPrice);
        });


        function updateTotalPrice(productPrice) {
            const currentTotalPrice = parseFloat(totalPrice.textContent.slice(1));

            const newTotalPrice = currentTotalPrice + productPrice;

            totalPrice.textContent = '$' + newTotalPrice.toFixed(2);
        }
    });
</script>








