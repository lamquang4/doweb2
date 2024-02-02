<?php
require 'config.php';


if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}


$productObj = new Product();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($page - 1) * $limit;
$products = $productObj->selectProducts($start, $limit);
$totalProducts = $productObj ->getProductCount();
$totalPages = ceil($totalProducts / $limit);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Product</title>
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
        
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile">
                    <ion-icon name="water-outline" style="font-size: 40px; color:white;"></ion-icon>
                    <h4>H20</h4>
                   
                </div>
            </div>

            <div class="side-menu">
                <ul>
                  <li>
                    <a href="admin-strator.php">
                         <span class="las la-address-card"></span>
                         <small>Administrator</small>
                     </a>
                 </li>
                <li >
                   <a href="admin-user.php">
                        <span class="las la-user-alt"></span>
                        <small>Customers</small>
                    </a>
                </li>
             
                <li>
                   <a href="admin-product.php">
                        <span class="las la-clipboard-list" style="color: #fff;"></span>
                        <small style="color: #fff;">Products</small>
                    </a>
                </li>
                <li>
                   <a href="admin-order.php">
                        <span class="las la-shopping-cart"></span>
                        <small>Orders</small>
                    </a>
                </li>
               
                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle" id="bar-admin">
                    <span class="las la-bars" style="font-size: 28px; margin-top: 8px;"></span>
                </label>
                
                <div class="header-menu">
                    <label for="">
                    
                    </label>
                    <div class="notify-icon">
                      <span class="las la-envelope"></span>
                      <span class="notify">4</span>
                  </div>
                  
                  <div class="notify-icon">
                      <span class="las la-bell"></span>
                      <span class="notify">3</span>
                  </div>
    
                    <div class="user" style="margin-right: 8px;">  
                    <a href="logout-ad.php">
                        
                        <span style="font-size: 20px; cursor: pointer;"> <span style="font-size: 25px;cursor: pointer;" class="las la-power-off" ></span> Logout</span>
                      </a>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main >
<div class="page-content">
        
    <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="product">Products</h1>
    <div class="user-tab">
<form>
        <div class="user-input">
             ID:<input type="text" name="id-product" id="id-product" >         
        </div>

        <div class="user-input" >
           Image:<input type="file" name="fimage1" id="fimage1" onchange="previewImage()">
        
                </div>

                  <img id="preview-image" src="" alt="Preview Image" width="30%" style="display: none; margin-bottom: 5px;">
              

        <div class="user-input" style="display: none;">
            Url:<input type="text" name="fimage" id="fimage" >
                 </div>
                 <div class="user-input">
                  Type:<select style="padding: 2px 50px;">
                    <option>Select Type</option>
                    <option>Carbonated</option>
                    <option>Non-carbonated</option>
                  </select>
                       </div>
        <div class="user-input">
 Name:<input type="text" name="name" id="name">
     </div>

  <div class="user-input">
       Price:<input type="number" name="price" id="price">     
  </div>

  <div class="user-input">
    Quantity:<input type="number" name="soluong" id="soluong" min="1" >
</div>

<div class="user-input">
        Date Add:<input type="date" name="date_add" id="date_add">
       </div>
       <div class="user-input">
        Description:<input style="width:80px; font-size:17px; text-align:center; cursor:pointer;" value="Show" type="button" id="showpopup" onclick="showPopup()">
       </div>
       <div class="user-input" style="display: none;">
        Action:<input type="text" name="action" id="action" >
       </div>
       <div>

        <button type="submit" id="addproduct">Add +</button>
        
                <button id="editButton" onclick="editHtmlTbleSelectedRow1();" style="visibility: hidden;" disabled>Edit <span class="las la-edit"></span></button>
                <button id="deleteButton" onclick="removeSelectedRow1();" style="visibility: hidden;" disabled>Delete <span class="las la-trash"></span></button>
</form>
</div>

    </div>
</div>
   





<div class="records table-responsive" >

<div class="record-header">


<div class="browse">
<input type="search" placeholder="Search (#ID)" class="record-search">

</div>

<div class="add">

  <span>Entries</span>
  <select name="" id="">
      <option value="">ID</option>
  </select>
  </div>
</div>

<div>
<table width="100%" id="table-product">
<thead>
<tr>
    <th>ID PRODUCT</th>
    <th><span class="las la-sort"></span> IMAGE</th>
    <th><span class="las la-sort"></span> PRODUCT</th>
    <th><span class="las la-sort"></span> PRICE</th>
    <th ><span class="las la-sort"></span> QUANTITY</th>
    <th><span class="las la-sort"></span> DATE ADD</th>
    <th><span class="las la-sort"></span> ACTION</th>
   
</tr>
</thead>
<tbody>


<?php while ($product = mysqli_fetch_assoc($products)) { ?>
  <tr>
  <td>#SP<?php echo $product['id']; ?></td>
<td>

   <div class="image-product-admin">
    <div>
   <img src="<?php echo $product['image']; ?>" id="productImage">
    </div>
    
        
   </div>
 
</td>
<td>

<?php echo $product['name']; ?>

</td>
<td>$<?php echo $product['price']; ?>.00</td>
<td><?php echo $product['soluong']; ?></td>
<td><?php echo $product['date_add']; ?></td>
<td>
  <div class="actions">
     
      <span class="las la-edit"></span>
      <span class="las la-trash"></span>
  </div>
</td>   
</tr> 
    <?php } ?>




</tbody>
</table>

<ul class="pagination" id="pagination">
<?php
        
        if ($page > 1) {
            echo '<li><a href="?page=' . ($page - 1) . '">Prev</a></li>';
        } else {
            echo '<li class="disabled">Prev</li>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li ' . (($i == $page) ? 'class="active"' : '') . '><a  href="?page=' . $i . '">' . $i . '</a></li>';
        }

        if ($page < $totalPages) {
            echo '<li ><a href="?page=' . ($page + 1) . '">Next</a></li>';
        } else {
            echo '<li class="disabled">Next</li>';
        }
        ?>
</ul>
</div>

</div>
</main>

<div class="container-popup">
   <div class="popup"  >
<div id="nutrifact">

    <h1 class="bold">Nutrition Facts</h1> 
    <i class="fa-solid fa-xmark" id="close-ic" onclick="hidePopup()"></i>
  
</div>
     
<div class="divider medium"></div>
<form>
  <div class="daily-value small-text">
   
    <p><span><span class="bold">Serving Size 12 fl oz (<input min="0" placeholder="?"> mL)</span> </p>
    <p ><span><span class="bold">Serving Per Container 1</span></p>
  
    <p><span><span class="bold">Amount Per Serving</span> </span> </p>

    <p style="border: none;"><span><span class="bold">Calories</span> <input min="0" placeholder="?">g</span> </p>
  
  </div>
  
    <div class="divider large"></div>
    <div class="daily-value small-text">
      <p class="bold right no-divider">% Daily Value *</p>
      <div class="divider"></div>
      <p><span><span class="bold">Total Fat</span> <input min="0" placeholder="?">g</span> <span ><input min="0" min="0" placeholder="?">%</span></p>
      <p><span><span class="bold">Sodium</span> <input min="0" placeholder="?">mg</span> <span ><input min="0" min="0" placeholder="?">%</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <input min="0" placeholder="?">g</span> <span ><input min="0" placeholder="?">%</span></p>
      <p><span><span class="bold">Sugars</span> <input min="0" placeholder="?">g</span> </p>
      <p style="border: none;"><span><span class="bold">Protein</span> <input min="0" placeholder="?">g</span> </p>
    
    </div>


<div class="divider medium"></div>
<p class="note"> *The Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</p>
<i  class="fa-solid fa-check" id="submit-ic"></i>

</form>

  </div>
  </div>


  <script>
  const popup = document.querySelector('.popup');
  const overlay = document.querySelector('.container-popup');
  const submitic = document.querySelector('#submit-ic');
  const htmlElement = document.querySelector('html');
  const inputFields = document.querySelectorAll('.popup input');

  function showPopup() {
    popup.style.display = 'block';
    overlay.style.display = 'block'; 
    window.scrollTo(0, 0);
    htmlElement.style.overflow = 'hidden';
  }

  function hidePopup() {
    submitic.style.visibility = "hidden";
    popup.style.display = 'none';
    overlay.style.display = 'none'; 
    htmlElement.style.overflow = 'auto';
    inputFields.forEach(input => (input.value = ''));
  }

  submitic.onclick = function () {
    submitic.style.visibility = "hidden";
    popup.style.display = 'none';
    overlay.style.display = 'none'; 
    htmlElement.style.overflow = 'auto';
    inputFields.forEach(input => (input.value = ''));
  }
   function checkInputsNotEmpty() {
 
   const allFilled = Array.from(inputFields).every(input => input.value.trim() !== '');
 
   submitic.style.visibility = allFilled ? 'visible' : 'hidden';
 }
 inputFields.forEach(input => input.addEventListener('input', checkInputsNotEmpty));
 checkInputsNotEmpty();
 </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>

</script>




<script>
 function previewImage() {
    var input = document.getElementById('fimage1');
    var preview = document.getElementById('preview-image');

    
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
       
        preview.src = e.target.result;
        
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]); 
    } else {
  
      preview.style.display = 'none';
    }
  }


</script>






