<?php
require 'config.php';
if (!isset($_GET['pid'])) {
  header('Location: admin-product.php');
  exit(); 
}

$connection = new Connection();
$id = $_GET['pid'];

 $edit_sql = "SELECT * FROM product WHERE id=$id";
$result = mysqli_query($connection->conn, $edit_sql);
$row = mysqli_fetch_assoc($result); 


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
   
<div>
<button style="margin-bottom: 8px;" id="showadd" onclick="showadd()"><i class="fa-solid fa-circle-plus" style="margin-right: 4px;"></i>  Add Product</button>
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
  <option value="">10</option>
    <option value="">16</option>
    <option value="">20</option>
  </select>
  </div>
</div>

<div>
<table width="100%" id="table-product">
<thead>
<tr id="select-filter">
    <th>ID PRODUCT</th>
    <th> IMAGE </th>
    <th> NAME </th>
    <th> PRICE </th>
    <th > QUANTITY </th>
    <th> DATE ADD </th>
    <th>ACTION</th>
   
</tr>
</thead>
<tbody>


<?php while ($product = mysqli_fetch_assoc($products)) { ?>
  <tr>
  <td>#SP<?php echo $product['id']; ?></td>
<td>

   <div class="image-product-admin">
    <div>
   <img src="<?php echo $product['image']; ?>">
    </div>
    <div>
   <img src="" id="productImage">
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
  <a href="edit-product.php?pid=<?php echo $product['id'];?>&page=<?php echo $page; ?>"><span class="las la-edit" style="color:#076FFE;"></span></a>

     <a onclick="return confirm('Are you sure you want to delete this product?');" href="admin-product.php?action=delete&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?>"><span class="las la-trash" style="color: #d9534f;"></span></a>
   
  </div>
</td>   
</tr> 
    <?php } ?>




</tbody>
</table>

<ul class="pagination" id="pagination">
<?php
        
        if ($page > 1) {
            echo '<li href="?page=' . ($page - 1) . '"><a href="?page=' . ($page - 1) . '">Prev</a></li>';
        } else {
            echo '<li class="disabled">Prev</li>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li ' . (($i == $page) ? 'class="active"' : '') . ' href="?page=' . $i . '">' . $i . '><a  href="?page=' . $i . '">' . $i . '</a></li>';
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
<form method="post" action="update-product.php" onsubmit="return ktrong()" enctype="multipart/form-data">
  <div class="daily-value small-text">
   
    <p><span><span class="bold">Serving Size 12 fl oz (<input min="0" name="ml" id="ml" value="<?php echo $row['ml']?>"> mL)</span> </p>
    <p ><span><span class="bold">Serving Per Container 1</span></p>
  
    <p><span><span class="bold">Amount Per Serving</span> </span> </p>

    <p style="border: none;"><span><span class="bold">Calories</span> <input id="calo" name="calo" min="0" value="<?php echo $row['calo']?>">g</span> </p>
  
  </div>
  
    <div class="divider large"></div>
    <div class="daily-value small-text">
      <p class="bold right no-divider">% Daily Value *</p>
      <div class="divider"></div>
      <p><span><span class="bold">Total Fat</span> <input name="fatg" id="fatg" min="0" value="<?php echo $row['fatg']?>">g</span> <span ><input name="fat" id="fat" min="0" value="<?php echo $row['fat']?>">%</span></p>
      <p><span><span class="bold">Sodium</span> <input name="sodiummg" id="sodiummg" min="0" value="<?php echo $row['sodiummg']?>">mg</span> <span ><input name="sodium" id="sodium" min="0" min="0" value="<?php echo $row['sodium']?>">%</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <input min="0" name="carbong" id="carbong" value="<?php echo $row['carbong']?>">g</span> <span ><input id="carbon" name="carbon" min="0" value="<?php echo $row['carbon']?>">%</span></p>
      <p><span><span class="bold">Sugars</span> <input name="sugarg" id="sugarg" min="0" value="<?php echo $row['sugarg']?>">g</span> </p>
      <p style="border: none;"><span><span class="bold">Protein</span> <input id="proteing" name="proteing" min="0" value="<?php echo $row['proteing']?>">g</span> </p>
    
    </div>


<div class="divider medium"></div>
<p class="note"> *The Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</p>

<i  class="fa-solid fa-check" id="submit-ic" onclick="backPopup()"></i>


  </div>
  </div>


<div id="container-inputs" style="display: block;">

  <div class="user-tab">
    <h1>EDIT PRODUCT</h1>
    <i class="fa-solid fa-xmark" id="closeadd" onclick="window.location.href='admin-product.php?page=<?php echo $page; ?>';"></i>
  
<input type="hidden" name="pid" value="<?php echo $row['id']?>">
<input type="hidden" name="page" value="<?php echo htmlspecialchars($page); ?>">
<div class="user-input" style="margin-top: 32px;">
  <label>Name:</label>
<input type="text" name="name" id="name" value="<?php echo $row['name']?>">
</div>

<div class="user-input" >
  <label>Image:</label>
 <input type="file" name="fimage1" id="fimage1" onchange="previewImage()">
        </div>

<div style="display: flex; justify-content:center; margin-bottom: 5px;">
   <img  src="<?php echo $row['image']?>"  width="30%" style="align-items:center;" id="show-image">
</div>

<div style="display: flex; justify-content:center; margin-bottom: 5px;">
   <img id="preview-image" src="" alt="Preview Image" width="30%" style="display: none;align-items:center;">
</div>   

          <div class="user-input" style="display: none;" >
  <label>URL:</label>
 <input type="text" id="image" name="image" value="<?php echo $row['image']?>" >
        </div>

         <div class="user-input">
          <label> Type:</label>
         <select name="type" id="type">
            <option value="0">Select Type</option>
            <option value="carbonated" <?php echo ($row['type'] == 'carbonated') ? 'selected' : ''; ?> >Carbonated</option>
            <option value="noncarbonated" <?php echo ($row['type'] == 'noncarbonated') ? 'selected' : ''; ?>>Non-carbonated</option>
          </select>
          <label> Brand:</label>
         <select name="brand" id="brand">
            <option value="0">Select Brand</option>
            <option value="cocacola" <?php echo ($row['brand'] == 'cocacola') ? 'selected' : ''; ?>>Coca-cola</option>
            <option value="pepsi" <?php echo ($row['brand'] == 'pepsi') ? 'selected' : ''; ?>>Pepsi</option>
            <option value="fanta" <?php echo ($row['brand'] == 'fanta') ? 'selected' : ''; ?>>Fanta</option>
            <option value="sprite" <?php echo ($row['brand'] == 'sprite') ? 'selected' : ''; ?>>Sprite</option>
            <option value="aquarius" <?php echo ($row['brand'] == 'aquarius') ? 'selected' : ''; ?>>Aquarius</option>
            <option value="thumbsup" <?php echo ($row['brand'] == 'thumbsup') ? 'selected' : ''; ?>>Thumbs Up</option>
            <option value="nutri" <?php echo ($row['brand'] == 'nutri') ? 'selected' : ''; ?>>Nutriboost</option>
            <option value="fuzetea" <?php echo ($row['brand'] == 'fuzetea') ? 'selected' : ''; ?>>Fuzetea</option>
            <option value="dasani" <?php echo ($row['brand'] == 'dasani') ? 'selected' : ''; ?>>Dasani</option>
          </select>
               </div>


               <div class="user-input">
  <label>Price:</label>
<input type="number" name="price" id="price" value="<?php echo $row['price']?>">     
<label>Quantity:</label>
<input type="number" name="soluong" id="soluong" min="1" value="<?php echo $row['soluong']?>">
</div>

<div class="user-input">
  <label>Date Add:</label>
<input type="date" name="date_add" id="date_add" value="<?php echo $row['date_add']?>">
</div>
<div class="user-input">
  <label>Description:</label>
<input style="width:80px; font-size:17px; text-align:center; cursor:pointer;" value="Show" type="button" id="showpopup" onclick="showPopup()">
</div>


<div style="text-align: center;" id="button-submit">
  <button type="submit" id="btn-submit" >Submit</button>

</div>
</form>

</div>

</html>

  <script>
  const popup = document.querySelector('.popup');
  const overlay = document.querySelector('.container-popup');
  const submitic = document.querySelector('#submit-ic');
  const htmlElement = document.querySelector('html');
  const inputFields = document.querySelectorAll('.popup input');

  function showPopup() {
    popup.style.display = 'block';
    containerinputs.style.display="none";
    overlay.style.display = 'block'; 

    htmlElement.style.overflow = 'hidden';
  }

  function hidePopup() {
    submitic.style.visibility = "hidden";
    containerinputs.style.display="block";
    popup.style.display = 'none';
    overlay.style.display = 'none'; 
    htmlElement.style.overflow = 'auto';

  }
  function backPopup() {
    submitic.style.visibility = "hidden";
    containerinputs.style.display="block";
    popup.style.display = 'none';
    overlay.style.display = 'none'; 
    htmlElement.style.overflow = 'auto';
    
  }

   function checkInputsNotEmpty() {
 
   const allFilled = Array.from(inputFields).every(input => input.value.trim() !== '');
 
   submitic.style.visibility = allFilled ? 'visible' : 'hidden';
 }
 inputFields.forEach(input => input.addEventListener('input', checkInputsNotEmpty));
 checkInputsNotEmpty();


 function ktrong() {
        
  var inputsToCheck = ["ml", "calo", "fatg", "fat", "sodiummg", "sodium", "carbong", "carbon", "sugarg", "proteing", "name", "image", "price", "soluong", "date_add"];
    
    for (var i = 0; i < inputsToCheck.length; i++) {
        var inputId = inputsToCheck[i];
        var inputValue = document.getElementById(inputId).value.trim();

        if (inputValue === "") {
            alert("Please fill in all fields");
            return false;
        }
    }

    var typeSelect = document.getElementById("type");
    var brandSelect = document.getElementById("brand");
    var selectedValue = typeSelect.value;
    var selectedValue = brandSelect.value;
    if (selectedValue === "0") {
        alert("Please choose product type or product brand");
        return false;
    }

    return true;
        }
 </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



<script>
const showadd= document.getElementById('showadd');
const containerinputs=document.querySelector('#container-inputs');
const usertab = document.querySelector('.usertab');

</script>




<script>
    function previewImage() {
    var input = document.getElementById('fimage1');
    var preview = document.getElementById('preview-image');
    var imageNameInput = document.getElementById('image');
    var showimage = document.getElementById('show-image');
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        showimage.style.display = 'none';
      };

      reader.readAsDataURL(input.files[0]);


      imageNameInput.value = 'assets/images/sp/' + input.files[0].name;
    }
  }

</script>
