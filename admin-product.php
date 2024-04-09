<?php
require 'config.php';

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$connection = new Connection();
$productObj = new Product();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$start = ($page - 1) * $limit;

if (isset($_GET['status']) && ($_GET['status'] === '0' || $_GET['status'] === '1' || $_GET['status'] === '2')) {
  $status = $_GET['status'];
  $products = $productObj->selectProductsByStatus($status, $start, $limit); 
  $totalProducts = $productObj->getProductCountByStatus($status); 
} else {
  $products = $productObj->selectProducts($start, $limit);
  $totalProducts = $productObj ->getProductCount();

}
$totalPages = ceil($totalProducts / $limit);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fimage1'])) {
  $name = trim($_POST['name']);
  $price = trim($_POST['price']);
  $image = $_POST['image'];
  $soluong = $_POST['soluong'];
  $date_add =$_POST['date_add'];
  $ml = trim($_POST['ml']);
  $calo = trim($_POST['calo']);
  $fatg = trim($_POST['fatg']);
  $fat = trim($_POST['fat']);
  $sodiummg = trim($_POST['sodiummg']);
  $sodium = trim($_POST['sodium']);
  $carbong = trim($_POST['carbong']);
  $carbon = trim($_POST['carbon']);
  $sugarg = trim($_POST['sugarg']);
  $proteing = trim($_POST['proteing']);
  $type = $_POST['type'];
 $brand = $_POST['brand'];
 $status = $_POST['status'];
 do {
  $random_id = 'SP' . sprintf("%04d", rand(0, 9999));
  $check_query = "SELECT COUNT(*) AS count FROM product WHERE id='$random_id'";
  $result = mysqli_query($connection->conn, $check_query);
  $row = mysqli_fetch_assoc($result);
  $count = $row['count'];
} while ($count > 0);

  $targetDir = "assets/images/sp/";
  $fileName = basename($_FILES["fimage1"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  $allowTypes = array('png');
  if(in_array($fileType, $allowTypes)){

      if(move_uploaded_file($_FILES["fimage1"]["tmp_name"], $targetFilePath)){
       
          $name = $_POST['name'];
        
          $image = $fileName; 
      
      } else{
          $error_msg = "Sorry, there was an error uploading your file.";
      }
  }


    $query = "INSERT INTO product (id,name, price, brand, image, soluong, date_add, ml, calo, fatg, fat, sodiummg, sodium, carbong, carbon, sugarg, proteing, type, status) VALUES ('$random_id','$name', '$price', '$brand', 'assets/images/sp/$image', '$soluong', NOW(), '$ml', '$calo', '$fatg', '$fat', '$sodiummg', '$sodium', '$carbong', '$carbon', '$sugarg', '$proteing', '$type', '$status')";
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
    if (mysqli_query($connection->conn, $query)) {
      echo "<script> alert('Success'); window.location.href='admin-product.php?page=$currentPage'; </script>";
       
    
        exit;
    } else {
        echo "<script> alert('Fail'); </script>";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $delete_sql = "DELETE FROM product WHERE id='$pid'";
  if (mysqli_query($connection->conn, $delete_sql)) {
      echo "<script>alert('Delete Successful'); window.location.href='admin-product.php?page=$currentPage';</script>";
 
  } else {
      echo "<script>alert('Delete Fail');</script>";
  }
}
if (isset($_GET['action']) && $_GET['action'] == 'setstatus2' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $sql = "UPDATE product SET status = 2  WHERE id='$pid'";
  if (mysqli_query($connection->conn, $sql)) {
      echo "<script>alert('Hide Product Successful'); window.location.href='admin-product.php?page=$currentPage';</script>";

  } else {
      echo "<script>alert('Hide Product Fail');</script>";
  }
}
if (isset($_GET['action']) && $_GET['action'] == 'setstatus1' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $sql = "UPDATE product SET status = 1  WHERE id='$pid'";
  if (mysqli_query($connection->conn, $sql)) {
      echo "<script>alert('Show Product Successful'); window.location.href='admin-product.php?page=$currentPage';</script>";
    
  } else {
      echo "<script>alert('Show Product Fail');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Product</title>
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
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
                         <small>Managers</small>
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
        
    <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="product">Products  <?php echo '(' . $totalProducts . ')'; ?></h1>
   
<div>
<button style="margin-bottom: 8px;" id="showadd" onclick="showadd()"><i class="fa-solid fa-circle-plus" style="margin-right: 4px;"></i>  Add Product</button>
</div>
        
        
                

</div>
   





<div class="records table-responsive" >

<div class="record-header">


<div class="browse">
<input type="search" placeholder="Search (ID)" class="record-search">

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
    <th>PRICE </th>
    <th> QUANTITY </th>
    <th> DATE ADD </th>
    <th onclick="toggleDropdown()" style="cursor: pointer; position: relative;">STATUS <i class="fa-solid fa-sort"></i>
                
                <div id="statusDropdown" class="dropdown-content">
                <a href="admin-product.php">All</a>
<a href="admin-product.php?status=1">On Sale</a>
<a href="admin-product.php?status=0">Not yet released</a>
<a href="admin-product.php?status=2">Hidden</a>
</div>
            </th>    
    <th>ACTION</th>
   
</tr>
</thead>
<tbody>


<?php 
    if(mysqli_num_rows($products) > 0) {  
while ($product = mysqli_fetch_assoc($products)) { ?>
  <tr>
  <td><?php echo $product['id']; ?></td>
<td>

   <div class="image-product-admin">
    <div>
   <img src="<?php echo $product['image']; ?>" id="productImage" alt="Product image">
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
<?php 
        if ($product['status'] == 1) {
            echo 'On sale';
        } else if($product['status'] == 0) {
            echo 'Not yet released';
        }else{
          echo 'Hidden';
        }
    ?>

</td>
<td>
  <div class="actions">

  <a href="edit-product.php?pid=<?php echo $product['id'];?>&page=<?php echo $page; ?><?php if(isset($status)) echo '&status=' . $status; ?>"><span class="las la-edit" style="color:#076FFE;"></span></a>


  <?php if ($product['status'] == 1): ?>
    <a onclick="return confirm('Are you sure you want to hide this product?');" href="admin-product.php?action=setstatus2&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?>">
        <span class="las la-eye"></span>
    </a>
<?php elseif($product['status'] == 0): ?>
    <a onclick="return confirm('Are you sure you want to delete this product?');" href="admin-product.php?action=delete&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?>">
        <span class="las la-trash" style="color: #d9534f;"></span>
    </a>
<?php else: ?>

    <a onclick="return confirm('Are you sure you want to show this product?');" href="admin-product.php?action=setstatus1&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?>">
        <span class="las la-eye-slash"></span>
    </a>
<?php endif; ?>

  </div>
</td>   
</tr> 
<?php }
}else{
    echo "
    <tfoot>
    <tr>
    <td colspan='8'>
    <div style='margin-top: 17vh; height:55vh;'>
    <div style='display:flex; justify-content:center; align-items:center; margin-bottom:6px;'>
    <img src='assets/images/pic/notfound1.png' width='335px' id='product-not-found'>
    </div> 
   
    </div>
    </td>
    </tr>
    </tfoot>
    ";   
}
?>


</tbody>
</table>
<?php if (mysqli_num_rows($products) > 0): ?>
<ul class="pagination" id="pagination">
<?php
      $searchParams = array();
if (isset($_GET['status'])) {
  $searchParams['status'] = $_GET['status'];
}  
        if ($page > 1) {
            echo '<li><a href="?page=' . ($page - 1) . '&' . http_build_query($searchParams) . '">Prev</a></li>';
        } else {
            echo '<li class="disabled">Prev</li>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li ' . (($i == $page) ? 'class="active"' : '') . '><a  href="?page=' . $i . '&' . http_build_query($searchParams) .  '">' . $i . '</a></li>';
        }

        if ($page < $totalPages) {
            echo '<li ><a href="?page=' . ($page + 1) . '&' . http_build_query($searchParams) .  '">Next</a></li>';
        } else {
            echo '<li class="disabled">Next</li>';
        }
        ?>
</ul>
<?php endif; ?>
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
<form method="post" action="" onsubmit="return ktrong()" enctype="multipart/form-data">
  <div class="daily-value small-text">
   
    <p><span><span class="bold">Serving Size 12 fl oz (<input min="0" name="ml" id="ml" placeholder="?" maxlength="3"> mL)</span> </p>
    <p ><span><span class="bold">Serving Per Container 1</span></p>
  
    <p><span><span class="bold">Amount Per Serving</span> </span> </p>

    <p style="border: none;"><span><span class="bold">Calories</span> <input id="calo" name="calo" min="0" placeholder="?" maxlength="3"></span> </p>
  
  </div>
  
    <div class="divider large"></div>
    <div class="daily-value small-text">
      <p class="bold right no-divider">% Daily Value *</p>
      <div class="divider"></div>
      <p><span><span class="bold">Total Fat</span> <input name="fatg" id="fatg" min="0" placeholder="?" maxlength="3">g</span> <span ><input name="fat" id="fat" min="0" placeholder="?" maxlength="3">%</span></p>
      <p><span><span class="bold">Sodium</span> <input name="sodiummg" id="sodiummg" min="0" placeholder="?" maxlength="3">mg</span> <span ><input name="sodium" id="sodium" min="0" min="0" placeholder="?" maxlength="3">%</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <input min="0" name="carbong" id="carbong" placeholder="?" maxlength="3">g</span> <span ><input id="carbon" name="carbon" min="0" placeholder="?" maxlength="3">%</span></p>
      <p><span><span class="bold">Sugars</span> <input name="sugarg" id="sugarg" min="0" placeholder="?" maxlength="3">g</span> </p>
      <p style="border: none;"><span><span class="bold">Protein</span> <input id="proteing" name="proteing" min="0" placeholder="?" maxlength="3">g</span> </p>
    
    </div>


<div class="divider medium"></div>
<p class="note"> *The Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</p>

<i  class="fa-solid fa-check" id="submit-ic" onclick="backPopup()"></i>


  </div>
  </div>


<div id="container-inputs">

  <div class="user-tab">
    <h1>Add Product</h1>
  <i class="fa-solid fa-xmark" id="closeadd" onclick="hideadd()"></i>
  

<div class="user-input" style="margin-top: 30px;">
  <label>Name:</label>
<input type="text" name="name" id="name" maxlength="30">
</div>

<div class="user-input" style="margin-bottom: 10px;">
  <label>Image:</label>
 <div class="upload-btn-wrapper">
    <button class="btn-upload">Upload Image <br> <i class="fa-solid fa-cloud-arrow-up"></i></button>
    <input type="file" name="fimage1" id="fimage1" onchange="previewImage()" />
  </div>
        </div>

<div id="container-img-preview">
   <img id="preview-image" src="" alt="Preview Image" width="25%">

</div>
         
          <div class="user-input" style="display: none;">
  <label>URL:</label>
 <input type="text" id="image" name="image">

        </div>

         <div class="user-input">
          <label> Type:</label>
         <select name="type" id="type">
            <option value="0" selected>Select Type</option>
            <option value="carbonated">Carbonated</option>
            <option value="nogas">Non-carbonated</option>
          </select>
          <label> Brand:</label>
         <select name="brand" id="brand">
            <option value="0" selected>Select Brand</option>
            <option value="cocacola">Coca-cola</option>
            <option value="pepsi">Pepsi</option>
            <option value="fanta">Fanta</option>
            <option value="sprite">Sprite</option>
            <option value="aquarius">Aquarius</option>
            <option value="thumbsup">Thumbs Up</option>
            <option value="nutri">Nutriboost</option>
            <option value="fuzetea">Fuzetea</option>
            <option value="dasani">Dasani</option>
          </select>
               </div>


               <div class="user-input">
  <label>Price:</label>
<input type="number" name="price" id="price" maxlength="20">     
<label>Quantity:</label>
<input type="number" name="soluong" id="soluong" min="1" maxlength="20">
</div>

<div class="user-input" style="display:none;">
  <label>Date Add:</label>
<input type="date" name="date_add" id="date_add" >
</div>
<div class="user-input">
<label>Status:</label>
         <select name="status" id="status">
            <option value="no" selected>Select Status</option>
            <option value="0">Not yet released</option>
            <option value="1">On sale</option>
          </select>
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
    window.scrollTo(0, 0);
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

 </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



<script>
const showadd= document.getElementById('showadd');
const containerinputs=document.querySelector('#container-inputs');
const usertab = document.querySelector('.usertab');
var previewimg = document.querySelector('#preview-image');
showadd.onclick=function(){
  containerinputs.style.display="block";
  usertab.style.display="block";

}
function hideadd(){
  var container = document.getElementById('container-inputs');
    var inputs = container.querySelectorAll('input, select, textarea');
    previewimg.style.display="none";
    inputs.forEach(function (input) {
        if (input.type !== 'button') {
            input.value = '';
        }
    });
    inputFields.forEach(input => (input.value = ''));
  containerinputs.style.display="none";
  usertab.style.display="none";
  previewimg.style.display="none";

}
</script>

<script>
   function ktrong() {
    var typeSelect = document.getElementById("type");
    var brandSelect = document.getElementById("brand");
    var statusSelect = document.getElementById("status");
    var selectedTypeValue = typeSelect.value;
    var selectedBrandValue = brandSelect.value;
    var selectedStatusValue = statusSelect.value;
    var inputsToCheck = ["ml", "calo", "fatg", "fat", "sodiummg", "sodium", "carbong", "carbon", "sugarg", "proteing", "name", "image", "price", "soluong"];
 var inputsToCheckNumbers = ["ml", "calo", "fatg", "fat", "sodiummg", "sodium", "carbong", "carbon", "sugarg", "proteing"];
    
 if (selectedTypeValue === "0" || selectedBrandValue === "0") {
    alert("Please choose brand or type");
    return false;
}
  if(selectedStatusValue === "no"){
    alert("Please choose status");
        return false;
  }
 for (var i = 0; i < inputsToCheck.length; i++) {
        var inputId = inputsToCheck[i];
        var inputValue = document.getElementById(inputId).value.trim();

        if (inputValue === "") {
            alert("Please fill in all fields and upload product image");
            return false;
        }
        if(inputsToCheckNumbers.includes(inputId)) {
            var regex = /^[0-9]+$/; 
            if (!regex.test(inputValue)) {
                alert("Please enter a valid number for product description");
                return false;
            }
        }
    }
    
    return true;
    }
</script>

<script>
  function previewImage() {
    var input = document.getElementById('fimage1');
    var preview = document.getElementById('preview-image');
    var imageNameInput = document.getElementById('image');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = new Image();
            img.src = e.target.result;

            img.onload = function () {
                if (this.width === 500 && this.height === 500 && input.files[0].type === 'image/png') {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    imageNameInput.value = input.files[0].name;
                } else {
                    alert("Please choose a PNG image file with dimensions 500 x 500 pixels.");
               
                    input.value = '';
       
                    preview.style.display = 'none';
             
                    imageNameInput.value = '';
                }
            };
        };

        reader.readAsDataURL(input.files[0]);
    }
  }


  function toggleDropdown() {
    var dropdown = document.getElementById("statusDropdown");
    dropdown.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('th')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>








