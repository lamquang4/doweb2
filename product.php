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
        $productType = $productDetails['type'];
        $productBrand = $productDetails['brand'];
        $productDec1 = $productDetails['ml'];
        $productDec2 = $productDetails['calo'];
        $productDec3 = $productDetails['fatg'];
        $productDec5 = $productDetails['sodiummg'];
        $productDec7 = $productDetails['carbong'];
        $productDec9 = $productDetails['sugarg'];
        $productDec10 = $productDetails['proteing'];
    } else {
       
        echo "<script> window.location.href='shop.php#product11';</script>";
     
        exit;
    }
} else {
  echo "<script>window.location.href='shop.php#product11';</script>";
 
    exit;
}

$select = new Select();

if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
}


if(isset($_POST["add_to_cart"])) {
  $productId = $_POST["idsp"];
  $productName = $_POST["namesp"];
  $productPrice = $_POST["pricesp"];
  $productImage = $_POST["imgsp"];
  $quantity = $_POST["quantity"];

  if($quantity > 10) {
    $quantity = 10;
  }

  if(!isset($_SESSION["shopping_cart"])) {
      $_SESSION["shopping_cart"] = array();
  }

  $found = false;
  foreach ($_SESSION["shopping_cart"] as $key => $item) {
      if($item["item_id"] == $productId) {
          if(($item["item_quantity"] + $quantity) > 10) {
            $quantity = 10 - $item["item_quantity"]; 
          }
          $_SESSION["shopping_cart"][$key]["item_quantity"] += $quantity;
          $found = true;
          break;
      }
  }

  if(!$found) {
      $item_array = array(
          'item_id' => $productId,
          'item_name' => $productName,
          'item_price' => $productPrice,
          'item_img' => $productImage,
          'item_quantity' => $quantity
      );
      $_SESSION["shopping_cart"][] = $item_array;
  }
  $_SESSION['success'] = 'Item added to cart';
  echo "<script> window.location.href='product.php?id=$productId';</script>";
  exit;
}

?>


<!DOCTYPE html>

<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
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

<div id="toast-container"></div>

 <section id="prodetails" class="section-p1">
  
  <div class="single-pro-image">
      <img src="<?php echo $productImage; ?>" width="100%" id="MainImg" alt="">
  <div class="small-img-group">
  <div class="small-img-col" style="display: none;">
  <img src="<?php echo $productImage; ?>" width="100%" class="small-img" alt="">
  </div>

   
  </div>
  </div>
  
  <div class="single-pro-details">
<form method="post" action="" id="form-addtocart">
<p id="typeandbrand"><?php echo $productBrand; ?> / <?php if($productType === 'nogas'){ echo'Non-carbonated';
}else if($productType === 'carbonated'){
  echo 'Carbonated';
} ?></p>
  <h6 id="text1"><?php echo $productName; ?></h6>
  <h2 id="text2">$<?php echo $productPrice; ?>.00</h2>
  <p style="font-size:15px; font-style: italic; margin-bottom:15px; margin-top:15px;">LIMIT: 10 PER PERSON</p>
  <input type="hidden"  name="idsp" value="<?php echo $productId; ?>">
  <input type="hidden"  name="namesp" value="<?php echo $productName; ?>">
  <input type="hidden"  name="pricesp" value="<?php echo $productPrice; ?>">
  <input type="hidden"  name="imgsp" value="<?php echo $productImage; ?>">
  <div id="container-quantity">
    <div class="button-de-increase">
    <div class="minus"><i class="fa-solid fa-minus" style="font-size: 18px;"></i></div>
    <div><input readonly type="text" maxlength="2" name="quantity" class="numbers" value="1"></div>
    <div class="plus"><i class="fa-solid fa-plus" style="font-size: 18px;"></i></div>
  </div> 
  </div>
 

<div id="container-buttonaddcart">
     <button class="normal" type="submit" name="add_to_cart" >ADD TO CART</button>
</div>

 
</form>
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
      <p><span><span class="bold">Total Fat</span> <?php echo $productDec3; ?>g</span></p>
      <p><span><span class="bold">Sodium</span> <?php echo $productDec5; ?>mg</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <?php echo $productDec7; ?>g</span></p>
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
      <a href="product.php?id=SP1176">
  <img src="assets/images/sp/pepsizero.png" alt="">
</a>
 
   
    <h5>Pepsi Zero Calo</h5>
    
    <h4>$10.00</h4>

  <div id="buttoncart">
    <button onclick="window.location.href='product.php?id=SP1176'"><i class="fa-solid fa-cart-shopping"></i></button>
  </div>
  </div> 

  <div class="pro2">
    <a href="product.php?id=SP6026">
    <img src="assets/images/sp/coca1.png" alt="">
  </a>
   
       
      <h5>Coca Zero Sugar </h5>
    
      <h4>$10.00</h4>
 
    <div id="buttoncart">
      <button onclick="window.location.href='product.php?id=SP6026'"><i class="fa-solid fa-cart-shopping"></i></button>
    </div>
    </div> 

    <div class="pro2">
      <a href="product.php?id=SP6698">
      <img src="assets/images/sp/coca2.png" alt="">
      </a>
   
        
        <h5>Coca Light</h5>
     
        <h4>$10.00</h4>
   
      <div id="buttoncart">
        <button onclick="window.location.href='product.php?id=SP6698'"><i class="fa-solid fa-cart-shopping"></i></button>
      </div>
      </div> 

      <div class="pro2">
        <a href="product.php?id=SP9341">
        <img src="assets/images/sp/cocaori.png" alt="">
      </a>
      
          <h5>Coca Original</h5>
     <h4>$13.00</h4>
        <div id="buttoncart">
          <button onclick="window.location.href='product.php?id=SP9341'"><i class="fa-solid fa-cart-shopping"></i></button>
        </div>
        </div> 
              
  </div>
  </section>

  <?php
include_once 'footer.php'
  ?>

<script>
   const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".numbers");
    let a = 1;
    plus.addEventListener("click", () => {
    if (a < 10) { 
      a++;
      num.value = a; 
    }
  });

  minus.addEventListener("click", () => {
    if (a > 1) {
      a--;
      num.value = a; 
    }
  });
  </script>

 <script>

  var nutri= document.querySelector(".label");
var nutriopen=document.getElementById("nutri-open");
let isRotate = true;
nutriopen.onclick = function() {

 isRotate=!isRotate;
nutriopen.style.transform = isRotate ? "rotate(180deg)" : "rotate(0deg)";

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

   </script>

<script>
       document.addEventListener('DOMContentLoaded', function() {
    <?php if(isset($_SESSION['success'])): ?>
        showToast('<?php echo $_SESSION['success']; ?>', 'success');
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

});

function showToast(message, type) {
    const toastContainer = document.getElementById('toast-container');

    const toast = document.createElement('div');
    toast.className = 'toast ' + type;

    const icon = document.createElement('div');
    icon.className = 'icon';
    if (type === 'success') {
        icon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    } else if (type === 'error') {
        icon.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color:red;"></i>';
    }

    const messageDiv = document.createElement('div');
    messageDiv.className = 'message';
    messageDiv.innerText = message;

    const closeButton = document.createElement('div');
    closeButton.className = 'close';
    closeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
    closeButton.addEventListener('click', function() {
        toastContainer.removeChild(toast);
    });

    toast.appendChild(icon);
    toast.appendChild(messageDiv);
    toast.appendChild(closeButton);

    toastContainer.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'fadeOut 0.5s forwards';
        setTimeout(() => {
            if (toastContainer.contains(toast)) {
                toastContainer.removeChild(toast);
            }
        }, 500);
    }, 3500);
}

    </script>