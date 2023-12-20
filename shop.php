<?php
require 'config.php';

$productObj = new Product();

// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$start = ($page - 1) * $limit;

$products = $productObj->selectProducts($start, $limit);
$totalProducts = $productObj->getProductCount();
$totalPages = ceil($totalProducts / $limit);

$select = new Select();

if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
 <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
<link rel="stylesheet" href="assets/css/main.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1" />
  <title>Shop</title>
</head>
<body >
  <section id="header">
    <a href="index.php">
  <img src="assets/images/pic/logo.png" class="logo" alt="" >
   </a>
  <div>
   <ul id="icons">
    
  <li id="menu"><a href="index.php"  class="choose" ><span>Home</span></a></li>
          <li id="menu"><a href="brand.php" class="choose"><span>Brands</span></a></li>
         
          <li id="menu" class="dropdown__item"  class="choose">                      
            <a  class="act-on" class="choose"><span  class="act-on">Shop</span></a>
         
  
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


    <div class="cart-content">


    </div>


    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$0</div>
    </div>

    <button type="button" class="btn-buy" onclick="checkloginyet()">Buy Now</button>

    <i class="fa-solid fa-x" id="cart-close"></i>
</div>

<section id="slidersss-section">
  <div class="slidersss">
  <div class="listsss">

      <div class="itemsss">
          <img src="assets/images/pic/coca-banner4.png" alt="">
      </div>
      <div class="itemsss">
          <img src="assets/images/pic/pepsi-banner2.png" alt="">
      </div>
  
  </div>
  <div class="buttonsss">
      <button id="prevsss"><i class="fa-solid fa-arrow-left"></i></button>
      <button id="nextsss"><i class="fa-solid fa-arrow-right"></i></button>
  </div>
  <ul class="dotsss">
      <li class="activesss"></li>
      <li></li>
   
  
  </ul>
</div>
</section>

  
  
 <section id="product11" class="section-p11" class="shop container" >
  <h2>FEATURED PRODUCTS</h2> 
<div style="margin-top: 20px; margin-bottom: 15px;"> 
  <h1 id="show-advan-searh-h1" >Advanced Search </h1>
  <i id="toggle-icon" class="fa-solid fa-chevron-up fa-rotate-180" ></i>
</div>
<div class="search-container" style="display: none;">
  <div id="search-advan-input">
  <label for="min-price">Min Price:</label>
  <input type="number" id="min-price" min="10" max="20" >

  <label for="max-price">Max Price:</label>
  <input type="number" id="max-price" min="10" max="20" >
</div>
<div id="search-advan-input">
    <label for="product-name"> Name:</label>
  <input  type="text" id="product-name">
  
  <label for="product-type">Product Type:</label>
  <select id="product-type"> 
        <option value="all">All</option>
    <option value="carbonated">Carbonated</option>
    <option value="non-carbonated">Non-Carbonated</option>
  </select>
  <button class="learn-more" onclick="searchProducts()"> Search <i class="fa-solid fa-magnifying-glass"></i></button>

</div>

</div>

  <div  id="filter-buttons">
       
    <button class="btn" id="backnormal" >Show all</button>
    <button class="btn" id="btnfil" >Coca-cola</button>
    <button class="btn" id="btnfil" >Pepsi</button>
    <button class="btn" id="btnfil" >Fanta</button>

</div>





<div class="pro-container1" id="product-list">
    <?php while ($product = mysqli_fetch_assoc($products)) { ?>
        <div class="pro1 product-box">
            <a href="product.php">
                <img src="<?php echo $product['image']; ?>" class="product-img" alt="">
            </a>

            <h5 class="product-title"><?php echo $product['name']; ?></h5>

            <h4 class="product-price">$<?php echo $product['price']; ?>.00</h4>

            <button class="btn_shop add-cart" id="cart-plus">ADD TO CART</button>
        </div>
    <?php } ?>
</div>

<div id="containerpage">
    <div class="pages">
        <ul class="listPage">
            <?php
            // Previous page button
            if ($page > 1) {
                echo '<li style="border:none;"><a href="?page=' . ($page - 1) . '"><i class="fa fa-chevron-left"></i></a></li>';
            } else {
                echo '<li style="border:none;" class="disabled"><i class="fa fa-chevron-left"></i></li>';
            }

            // Pagination links
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li ' . (($i == $page) ? 'class="activi"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
            }

            // Next page button
            if ($page < $totalPages) {
                echo '<li style="border:none;"><a href="?page=' . ($page + 1) . '"><i class="fa fa-chevron-right"></i></a></li>';
            } else {
                echo '<li style="border:none;" class="disabled"><i class="fa fa-chevron-right"></i></li>';
            }
            ?>
        </ul>
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
          <li><a href="#" ><i class="fa-brands fa-youtube"></i></a></li>
          <li><a href="#" ><i class="fa-brands fa-tiktok"></i></a></li>
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
</body>
</html>
 <script>
  const bar = document.getElementById('bar');
  const icon = document.getElementById('icons');
 
  if(bar){
    bar.addEventListener('click',() =>{
  icon.classList.add('active');
    })}
   
  
  
   </script>

<script>
   
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
  const cartIcon=document.querySelector("#cart-icon");
const cart=document.querySelector(".cart");
const closeCart=document.querySelector("#cart-close");
const cartIcon1=document.querySelector("#cart-icon1");

cartIcon.addEventListener('click',()=>{
  cart.classList.add("act");
});
cartIcon1.addEventListener('click',()=>{
  cart.classList.add("act");
});
closeCart.addEventListener('click',()=>{
  cart.classList.remove("act");
});

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}

// =============== START ====================
function start() {
  addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
  addEvents();
  updateTotal();
}


function addEvents() {
  // Remove items from cart
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  console.log(cartRemove_btns);


  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);

  });



  // Change item quantity
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
  

    input.addEventListener("change", handle_changeItemQuantity);
  });

  // Add item to cart
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  // Buy Order
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);

}



// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;
  console.log(title, price, imgSrc);

  let newToAdd = {
    title,
    price,
    imgSrc,
  };


  // handle item is already exist
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("This Item Is Already Exist!");
    return;
  } else  {
    countCartAdd1.innerHTML="!";
  
      countCartAdd.innerHTML="!";
    itemsAdded.push(newToAdd);
  }


  // Add product to cart
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}

function handle_removeCartItem() {

  const countCartAdd1 = document.querySelector("#count-cart-add1");
  const countCartAdd = document.querySelector("#count-cart-add");

  if (itemsAdded.length === 0) {
    countCartAdd1.innerHTML = "0";
    countCartAdd.innerHTML = "0";
    return;
  }
 
  this.parentElement.remove();

  // Update the cart
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title != this.parentElement.querySelector(".cart-product-title")
        .innerHTML
  );
  updateCartCount();
  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // to keep it integer

  update();
}

function updateCartCount() {
 
  const countCartAdd1 = document.querySelector("#count-cart-add1");
  const countCartAdd = document.querySelector("#count-cart-add");

  if (itemsAdded.length > 0) {
    countCartAdd1.innerHTML = "!";
    countCartAdd.innerHTML = "!";
  } else {
    countCartAdd1.innerHTML = "0";
    countCartAdd.innerHTML = "0";
  }
}

function handle_buyOrder() {
  if (itemsAdded.length <= 0) {
    alert("There is No Order to Place Yet! \nPlease Make an Order first.");
  
    return;
  }
 
  
  const payment=document.querySelector('.containers');
  const cartContent = cart.querySelector(".cart-content");
const buybutton=document.querySelector('.btn-buy');

window.location.href="pay.php";
   itemsAdded = [];
 update();
  }
  const buybutton=document.querySelector('.btn-buy');
buybutton.addEventListener("click", () => {
 
  window.scrollTo(0, bBanner1.offsetTop);
});
 
// =========== UPDATE & RERENDER FUNCTIONS =========
function updateTotal() {
  let cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = cart.querySelector(".total-price");
  let total = 0;
  cartBoxes.forEach((cartBox) => {
    let priceElement = cartBox.querySelector(".cart-price");
    let price = parseFloat(priceElement.innerHTML.replace("$", ""));
    let quantity = cartBox.querySelector(".cart-quantity").value;
    total += price * quantity;
  });


  total = total.toFixed(2);


  totalElement.innerHTML = "$" + total;
}

// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- REMOVE CART  -->
        <i class='bx bx-trash cart-remove' id="remove-counter"></i>
    </div>`;
}

</script>





<script>
 const countCartAdd1 = document.getElementById("count-cart-add1");
countCartAdd1.textContent = 0;
const countCartAdd = document.getElementById("count-cart-add");
countCartAdd.textContent = 0;
let quantity = cartBox.querySelector(".cart-quantity").value;
// Thêm sự kiện click vào icon "+"
const cartadds = document.querySelectorAll("#cart-plus");
cartadds.forEach((cartadd)=> {
  let isClicked = false;
  cartadd.addEventListener("click", (event) => {
    if (!isClicked) {
      isClicked = true;
   
    }
  });
});

</script>


<script>
 var toggleIcon = document.getElementById('toggle-icon');
  var searchContainer = document.querySelector('.search-container');

  toggleIcon.addEventListener('click', function() {
    if (searchContainer.style.display === 'none' || searchContainer.style.display === '') {
      searchContainer.style.display = 'block';
      toggleIcon.style.transform = 'rotate(0deg)';
      toggleIcon.style.transition = '0.5s';
    } else {
      searchContainer.style.display = 'none';
      toggleIcon.style.transform = 'rotate(180deg)';
      toggleIcon.style.transition = '0.5s';
    }
  });


</script>

<script>
  let slider = document.querySelector('.slidersss .listsss');
let items = document.querySelectorAll('.slidersss .listsss .itemsss');
let next = document.getElementById('nextsss');
let prev = document.getElementById('prevsss');
let dots = document.querySelectorAll('.slidersss .dotsss li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}

function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slidersss .dotsss li.activesss');
    last_active_dot.classList.remove('activesss');
    dots[active].classList.add('activesss');

    clearInterval(refreshInterval);
   

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};


</script>



<script>
let subMenu = document.getElementById("subMenu");
function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}

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





