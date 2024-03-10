<?php
require 'config.php';
if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    $productObj = new Product();

    $productDetails = $productObj->selectProductsById($productId);

    if($productDetails) {
        $productName = $productDetails['name'];
        $productPrice = $productDetails['price'];
        $productImage = $productDetails['image'];
        $productImage1 = $productDetails['thungimg'];
        $productDec1 = $productDetails['ml'];
        $productDec2 = $productDetails['calo'];
        $productDec3 = $productDetails['fatg'];
        $productDec4 = $productDetails['fat'];
        $productDec5 = $productDetails['sodiummg'];
        $productDec6 = $productDetails['sodium'];
        $productDec7 = $productDetails['carbong'];
        $productDec8 = $productDetails['carbon'];
        $productDec9 = $productDetails['sugarg'];
        $productDec10 = $productDetails['proteing'];
    } else {
       
        echo "Product not found";
        exit;
    }
} else {
   
    echo "Invalid product ID";
    exit;
}

$select = new Select();

if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
}
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
  header("Location: login.php");
  exit();
}

?>



<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logo.png">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/nutri.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
  <title>Shop</title>
</head>
<body>

<?php
include_once 'header.php'
  ?>

 <section id="prodetails" class="section-p1">
  
  <div class="single-pro-image">
      <img src="<?php echo $productImage; ?>" width="100%" id="MainImg" alt="">
  <div class="small-img-group">
  <div class="small-img-col">
  <img src="<?php echo $productImage; ?>" width="100%" class="small-img" alt="">
  </div>
  <div class="small-img-col">
      <img src="<?php echo $productImage1; ?>" width="100%" class="small-img" alt="" >
      </div>
   
  </div>
  </div>
  
  <div class="single-pro-details">
  <h6 id="text1"><?php echo $productName; ?></h6>
  <h2 id="text2">$<?php echo $productPrice; ?>.00</h2>

<input class="in-put" type="number" value="1" min="1" max="6">
<button class="normal" onclick="addToCart()">Add to Cart</button>
  
 <div id="infor-nutri">
  <h3>Nutriton</h3>
  <i id="nutri-open" class="fa-solid fa-angle-up fa-rotate-180"></i>
  <div class="label">
    <header>
      <h1 class="bold">Nutrition Facts</h1>
    </header>
<div class="divider medium"></div>

<div class="daily-value small-text">
   
    <p><span><span class="bold">Serving Size 12 fl oz (<?php echo $productDec1; ?>ml)</span> </p>
    <p ><span><span class="bold">Serving Per Container 1</span></p>
  
    <p><span><span class="bold">Amount Per Serving</span> </span> </p>

    <p style="border: none;"><span><span class="bold">Calories</span> <?php echo $productDec2; ?></span> </p>
  
  </div>
  
    <div class="divider large"></div>
    <div class="daily-value small-text">
      <p class="bold right no-divider">% Daily Value *</p>
      <div class="divider"></div>
      <p><span><span class="bold">Total Fat</span> <?php echo $productDec3; ?>g</span> <span ><?php echo $productDec4; ?>%</span></p>
      <p><span><span class="bold">Sodium</span> <?php echo $productDec5; ?>mg</span> <span ><?php echo $productDec6; ?>%</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <?php echo $productDec7; ?>g</span> <span ><?php echo $productDec8; ?>%</span></p>
      <p><span><span class="bold">Sugars</span> <?php echo $productDec9; ?>g</span> </p>
      <p style="border: none;"><span><span class="bold">Protein</span> <?php echo $productDec10; ?>g</span> </p>
    
    </div>


<div class="divider medium">
</div>
<p class="note"> *The Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</p>
  </div>
</div>
  </div>
  </section>



  <section id="product12" class="section-p12">
    <h2>YOU MAY ALSO LIKE</h2>
  <div class="pro-container2">
    <div class="pro2">
      <a href="product.php?id=2">
  <img src="assets/images/sp/pepsizero.png" alt="">
</a>
 
   
    <h5>Pepsi Zero Calo</h5>
    
    <h4>$10.00</h4>

  <div id="buttoncart">
    <button onclick="window.location.href='product.php?id=2'"><i class="fa-solid fa-cart-shopping"></i></button>
  </div>
  </div> 

  <div class="pro2">
    <a href="product.php?id=4">
    <img src="assets/images/sp/coca1.png" alt="">
  </a>
   
       
      <h5>Coca Zero Sugar </h5>
    
      <h4>$10.00</h4>
 
    <div id="buttoncart">
      <button onclick="window.location.href='product.php?id=4'"><i class="fa-solid fa-cart-shopping"></i></button>
    </div>
    </div> 

    <div class="pro2">
      <a href="product.php?id=11">
      <img src="assets/images/sp/coca2.png" alt="">
      </a>
   
        
        <h5>Coca Light</h5>
     
        <h4>$10.00</h4>
   
      <div id="buttoncart">
        <button onclick="window.location.href='product.php?id=11'"><i class="fa-solid fa-cart-shopping"></i></button>
      </div>
      </div> 

      <div class="pro2">
        <a href="product.php?id=3">
        <img src="assets/images/sp/cocaori.png" alt="">
      </a>
      
          <h5>Coca Original</h5>
     <h4>$13.00</h4>
        <div id="buttoncart">
          <button onclick="window.location.href='product.php?id='"><i class="fa-solid fa-cart-shopping"></i></button>
        </div>
        </div> 
              
  </div>
  </section>

  <?php
include_once 'footer.php'
  ?>
 <script>

  var nutri= document.querySelector(".label");
var nutriopen=document.getElementById("nutri-open");

let isHidden = true;
let isRotate = true;
nutriopen.onclick = function() {
  isHidden = !isHidden;
 isRotate=!isRotate;
nutriopen.style.transform = isRotate ? "rotate(180deg)" : "rotate(0deg)";
  setTimeout(() => {
    nutri.style.display = isHidden ? "block" : "none";
  }, 240);
};

  var MainImg  =document.getElementById("MainImg");
var small = document.getElementsByClassName("small-img");

small[0].onclick = function(){
  document.getElementById("text1").innerHTML = "Pepsi Original";
  document.getElementById("text2").innerHTML = "$12.00";
MainImg.src = small[0].src;
}
small[1].onclick = function(){
  document.getElementById("text1").innerHTML = "24 Pack Cans";
  document.getElementById("text2").innerHTML = "$50.00";
MainImg.src = small[1].src;
}
small[2].onclick = function(){
MainImg.src = small[2].src;
}
small[3].onclick = function(){
MainImg.src = small[3].src;
}

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








