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
        $productSoluong = $productDetails['soluong'];
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
       
        echo "<script>alert('Product id not found!'); window.location.href='shop.php';</script>";
     
        exit;
    }
} else {
  echo "<script>alert('Product id not found!'); window.location.href='shop.php';</script>";
 
    exit;
}

$select = new Select();

if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
}


if(isset($_POST["add_to_cart"])){
  if(isset($_SESSION["shopping_cart"])){
      $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
      if(!in_array($_GET["id"],$item_array_id)){
          $count = count($_SESSION["shopping_cart"]);
          $item_array = array(
              'item_id' => $_GET["id"],
              'item_name' => $_POST["namesp"],
              'item_price' => $_POST["pricesp"],
              'item_img' => $_POST["imgsp"],
              'item_quantity' => $_POST["quantity"]
          );
          // bo $count []
          $_SESSION["shopping_cart"][]=$item_array;
      }
  }else {
    $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["namesp"],
        'item_price' => $_POST["pricesp"],
        'item_img' => $_POST["imgsp"],
        'item_quantity' => $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
}

echo "<script>alert('Item has been added to cart'); window.location.href='product.php?id=$productId';</script>";
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
<form method="post" action="" onsubmit="return validateQuantity()">
  <h6 id="text1"><?php echo $productName; ?></h6>
  <h2 id="text2">$<?php echo $productPrice; ?>.00</h2>
  <input type="hidden"  name="idsp" value="<?php echo $productId; ?>">
  <input type="hidden"  name="namesp" value="<?php echo $productName; ?>">
  <input type="hidden"  name="pricesp" value="<?php echo $productPrice; ?>">
  <input type="hidden"  name="imgsp" value="<?php echo $productImage; ?>">
  <div class="button-de-increase">
    <div class="minus"><i class="fa-solid fa-minus" style="font-size: 18px;"></i></div>
    <div><input readonly type="text" maxlength="2" name="quantity" class="numbers" value="1"></div>
    <div class="plus"><i class="fa-solid fa-plus" style="font-size: 18px;"></i></div>
  </div>

   <button class="normal" type="submit" name="add_to_cart" >Add to Cart</button>

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
      <a href="product.php?id=SP5440">
  <img src="assets/images/sp/pepsizero.png" alt="">
</a>
 
   
    <h5>Pepsi Zero Calo</h5>
    
    <h4>$10.00</h4>

  <div id="buttoncart">
    <button onclick="window.location.href='product.php?id=SP5440'"><i class="fa-solid fa-cart-shopping"></i></button>
  </div>
  </div> 

  <div class="pro2">
    <a href="product.php?id=SP1186">
    <img src="assets/images/sp/coca1.png" alt="">
  </a>
   
       
      <h5>Coca Zero Sugar </h5>
    
      <h4>$10.00</h4>
 
    <div id="buttoncart">
      <button onclick="window.location.href='product.php?id=SP1186'"><i class="fa-solid fa-cart-shopping"></i></button>
    </div>
    </div> 

    <div class="pro2">
      <a href="product.php?id=SP3946">
      <img src="assets/images/sp/coca2.png" alt="">
      </a>
   
        
        <h5>Coca Light</h5>
     
        <h4>$10.00</h4>
   
      <div id="buttoncart">
        <button onclick="window.location.href='product.php?id=SP3946'"><i class="fa-solid fa-cart-shopping"></i></button>
      </div>
      </div> 

      <div class="pro2">
        <a href="product.php?id=SP7049">
        <img src="assets/images/sp/cocaori.png" alt="">
      </a>
      
          <h5>Coca Original</h5>
     <h4>$13.00</h4>
        <div id="buttoncart">
          <button onclick="window.location.href='product.php?id=SP7049'"><i class="fa-solid fa-cart-shopping"></i></button>
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
  function validateQuantity() {
    var selectedQuantity = parseInt(document.querySelector("input[name='quantity']").value);
    var availableQuantity = <?php echo $productSoluong; ?>;
    if (selectedQuantity > availableQuantity) {
      alert("The current stock has <?php echo $productSoluong; ?> of these products remaining.");
      return false; 
    }
    return true; 
  }
</script>










