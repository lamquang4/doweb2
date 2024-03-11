<?php
require 'config.php';

$productObj = new Product();


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$start = ($page - 1) * $limit;
$searchText = isset($_GET['text']) ? $_GET['text'] : null;
$minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : null;
$maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : null;
$searchType = isset($_GET['type']) ? $_GET['type'] : null;
$searchBrand = isset($_GET['brand']) ? $_GET['brand'] : null;

$products = $productObj->selectProducts($start, $limit, $searchText, $searchType, $minPrice, $maxPrice, $searchBrand);
$totalProducts = $productObj->getProductCount($searchText, $searchType, $minPrice, $maxPrice, $searchBrand);
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
  <?php
include_once 'header.php'
  ?>



<section id="slidersss-section">
  <div class="slidersss">
  <div class="listsss">
  <div class="itemsss">
          <img src="assets/images/pic/banner-pep.png" alt="">
      </div>
      <div class="itemsss">
          <img src="assets/images/pic/coca-banner4.png" alt="">
      </div>
      <div class="itemsss">
          <img src="assets/images/pic/banner-pep1.png" alt="">
      </div>
      <div class="itemsss">
          <img src="assets/images/pic/banner-sprite.png" alt="">
      </div>
  </div>
  <div class="buttonsss">
      <button id="prevsss"><i class="fa-solid fa-arrow-left"></i></button>
      <button id="nextsss"><i class="fa-solid fa-arrow-right"></i></button>
  </div>
  <ul class="dotsss">
      <li class="activesss"></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
</div>
</section>

  
  
 <section id="product11" class="section-p11" class="shop container" >
  <h2>FEATURED PRODUCTS</h2> 



  <div  id="filter-buttons" style="margin-top: 12px;">
       
    <button class="btn" id="btnfil" onclick="window.location.href='shop.php'"><img src="assets/images/pic/all.png"></button>
    <button class="btn" id="btnfil" onclick="window.location.href='shop.php?text=coca'"><img  src="assets/images/pic/coca-circle.png"></button>
    <button class="btn" id="btnfil" onclick="window.location.href='shop.php?text=pepsi'"><img src="assets/images/pic/pepsilogo.png"></button>
    <button class="btn" id="btnfil" onclick="window.location.href='shop.php?type=sprite'"><img src="assets/images/pic/sprite-circle.png"></button>
    <button class="btn" id="btnfil" style="border-radius: 50%; border: 2px solid black;" onclick="window.location.href='shop.php?type=carbonated'"><img src="assets/images/pic/soft-drinks.png"></button>
 <div>
  <button id="btn-ad-search">Search <i class="fa-solid fa-magnifying-glass"></i></button>
 </div>
  

</div>


<div id="advan-search-container">
  <h1>Advanced Search</h1>
  <i class="fa-solid fa-x" id="x-icon-close"></i>
  <hr style="margin: 20px 0;">
<form method="GET" action="shop.php">
<div>
  <label>NAME:</label>
  <input type="text" name="text" id="productName" placeholder="Product Name">
</div>

<div>
  <label>PRICE:</label>
  <input name="min_price" id="minPrice" placeholder="Min Price" style="margin-bottom:10px">
<label>TO</label>
  <input name="max_price" id="maxPrice" placeholder="Max Price">
</div>

<hr style="margin: 20px 0;  border: 1px solid #ccc;">

<div>
  <label>TYPE:</label>
<select name="type" id="productType">
  <option value="0">Select Type</option>
  <option value="carbonated">Carbonated</option>
  <option value="nogas">Non-carbonated</option>
</select>
</div>

<div>
  <label>BRAND:</label>
<select name="brand" id="productBrand">
  <option value="0">Select Brand</option>
  <option value="cocacola">Coca-cola</option>
  <option value="pepsi">Pepsi</option>
  <option value="fanta">Fanta</option>
  <option value="sprite">Sprite</option>
  <option value="aquarius">Aquarius</option>
  <option value="dasani">Dasani</option>
  <option value="thumbsup">ThumbsUp</option>
  <option value="nutri">Nutriboost</option>
  <option value="fuzetea">Fuzetea</option>
</select>
</div>

<hr style="margin: 20px 0;  border: 1px solid #ccc;">

<div>
  <button type="submit" id="btn-apply-ad-search">APPLY <i class="fa-solid fa-arrow-right-long" style="margin-left: 8px;"></i></button>
</div>

</form>
</div>


<div class="pro-container1" id="product-list">
    <?php while ($product = mysqli_fetch_assoc($products)) { ?>
        <div class="pro1 product-box">
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <img src="<?php echo $product['image']; ?>" class="product-img" alt="">
            </a>
            <h5 class="product-title" style="display: none;"><?php echo $product['type']; ?></h5>
            <h5 class="product-title"><?php echo $product['name']; ?></h5>

            <h4 class="product-price">$<?php echo $product['price']; ?>.00</h4>

            <button class="btn_shop add-cart" id="cart-plus" onclick="window.location.href='product.php?id=<?php echo $product['id']; ?>'">BUY NOW</button>
        </div>
    <?php } ?>
</div>

<div id="containerpage">
    <div class="pages">
        <ul class="listPage">
        <?php
$searchParams = array();

if (isset($_GET['text'])) {
    $searchParams['text'] = $_GET['text'];
}

if (isset($_GET['min_price'])) {
    $searchParams['min_price'] = $_GET['min_price'];
}

if (isset($_GET['max_price'])) {
    $searchParams['max_price'] = $_GET['max_price'];
}

if (isset($_GET['type'])) {
    $searchParams['type'] = $_GET['type'];
}

if (isset($_GET['brand'])) {
    $searchParams['brand'] = $_GET['brand'];
}


if ($page > 1) {
    echo '<li style="border:none;"><a href="?page=' . ($page - 1) . '&' . http_build_query($searchParams) . '"><i class="fa fa-chevron-left"></i></a></li>';
} else {
    echo '<li style="border:none;" class="disabled"><i class="fa fa-chevron-left"></i></li>';
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li ' . (($i == $page) ? 'class="activi"' : '') . '><a href="?page=' . $i . '&' . http_build_query($searchParams) . '">' . $i . '</a></li>';
}

if ($page < $totalPages) {
    echo '<li style="border:none;"><a href="?page=' . ($page + 1) . '&' . http_build_query($searchParams) . '"><i class="fa fa-chevron-right"></i></a></li>';
} else {
    echo '<li style="border:none;" class="disabled"><i class="fa fa-chevron-right"></i></li>';
}
?>
        </ul>
    </div>
</div>
</section>

<?php
include_once 'footer.php'
  ?>
</body>
</html>
 

<script>
  document.getElementById('btn-ad-search').addEventListener('click', function() {
    toggleSearchBox();
  });
  
  document.getElementById('overlay').addEventListener('click', function() {
    hideOverlayAndSearchBox();
  });
  document.getElementById('x-icon-close').addEventListener('click', function() {
    hideOverlayAndSearchBox();
  });
  function toggleSearchBox() {
    var overlay = document.getElementById('overlay');
    var searchBox = document.getElementById('advan-search-container');
    var currentTransform = window.getComputedStyle(searchBox).getPropertyValue('transform');
  
    if (currentTransform === 'matrix(1, 0, 0, 1, 0, 0)') {
      searchBox.style.transform = 'translateX(-320px)';
      overlay.style.display = 'none';
      htmlElement.style.overflowY = 'scroll';
    } else {
      searchBox.style.transform = 'translateX(0)';
      overlay.style.display = 'block';
      htmlElement.style.overflow = 'hidden';
    }
  }
  
  function hideOverlayAndSearchBox() {
    var overlay = document.getElementById('overlay');
    var searchBox = document.getElementById('advan-search-container');
    carts.classList.remove("act");
    searchBox.style.transform = 'translateX(-320px)';
    overlay.style.display = 'none';
    htmlElement.style.overflowY = 'scroll';
  }
 
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
  









