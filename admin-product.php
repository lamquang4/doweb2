<?php
require 'config.php';

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$connection = new Connection();
$productObj = new Product();
$categoryObj = new Category();
$categorys = $categoryObj->selectCategory();

$searchText = isset($_GET['text']) ? $_GET['text'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : null;
$maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : null;
$searchType = isset($_GET['type']) ? $_GET['type'] : null;
$searchBrand = isset($_GET['brand']) ? $_GET['brand'] : null;
$searchStatus = isset($_GET['status']) ? $_GET['status'] : null;
$limit = 12;
$start = ($page - 1) * $limit;


  $products = $productObj->selectProducts($start, $limit,$searchText,$searchType,$minPrice,$maxPrice,$searchBrand,$searchStatus);
  $totalProducts = $productObj ->getProductCount($searchText,$searchType,$minPrice,$maxPrice,$searchBrand,$searchStatus);

$totalPages = ceil($totalProducts / $limit);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fimage1'])) {
  $name = trim($_POST['name']);
  $price = trim($_POST['price']);
  $image = $_POST['image'];
  $date_add =$_POST['date_add'];
  $ml = trim($_POST['ml']);
  $calo = trim($_POST['calo']);
  $fatg = trim($_POST['fatg']);
  $sodiummg = trim($_POST['sodiummg']);
  $carbong = trim($_POST['carbong']);
  $sugarg = trim($_POST['sugarg']);
  $proteing = trim($_POST['proteing']);
 $brand = $_POST['brand'];
 $type = $_POST['type'];

 $page = isset($_POST['page']) ? $_POST['page'] : 1;
 $text = isset($_GET['text']) ? $_GET['text'] : '';
 $statuscur = isset($_GET['status']) ? $_GET['status'] : '';

 $categoryQuery = "SELECT idloai FROM category WHERE brand = '$brand' AND type = '$type'";
$categoryResult = mysqli_query($connection->conn, $categoryQuery);

if($categoryResult) {

    if(mysqli_num_rows($categoryResult) > 0) {
        $categoryRow = mysqli_fetch_assoc($categoryResult);
        $idloai = $categoryRow['idloai'];
    }else{
      $_SESSION['fail'] = 'Wrong category';
      echo "<script> window.location.href='admin-product.php?page={$page}&status={$statuscur}&text={$text}';</script>";
      exit;
    }
}
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

  $page = isset($_POST['page']) ? $_POST['page'] : 1;
  $text = isset($_GET['text']) ? $_GET['text'] : '';
  $statuscur = isset($_GET['status']) ? $_GET['status'] : '';
 

  if(in_array($fileType, $allowTypes)){
    $maxFileSize = 300 * 1024; // 300 KB
    if ($_FILES["fimage1"]["size"] > $maxFileSize) {
      $_SESSION['fail'] = 'File size exceeds the maximum allowed size of 300 KB';
      echo "<script> window.location.href='admin-product.php?page=$page&status=$statuscur&text=$text';</script>";
      exit;
    }

      if(move_uploaded_file($_FILES["fimage1"]["tmp_name"], $targetFilePath)){
          $name = $_POST['name'];   
          $image = $fileName; 
      
      } else{
        echo "<script> window.location.href='admin-product.php?page=$page&status=$statuscur&text=$text';</script>";
        exit;
      }
  }


    $query = "INSERT INTO product (id,idloai,name, price, image, date_add, ml, calo, fatg, sodiummg, carbong, sugarg, proteing, status) VALUES ('$random_id','$idloai','$name', '$price', 'assets/images/sp/$image', NOW(), '$ml', '$calo', '$fatg', '$sodiummg', '$carbong', '$sugarg', '$proteing', '0')";
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
    $text = isset($_GET['text']) ? $_GET['text'] : ''; 
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    if (mysqli_query($connection->conn, $query)) {
      $_SESSION['success'] = 'Add Successful';  
      echo "<script>window.location.href='admin-product.php?page=$currentPage&status=$status&text=$text'; </script>";
        exit;
    } 
}

//delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $text = isset($_GET['text']) ? $_GET['text'] : ''; 
  $status = isset($_GET['status']) ? $_GET['status'] : '';
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $delete_sql = "DELETE FROM product WHERE id='$pid'";
  if (mysqli_query($connection->conn, $delete_sql)) {
   
 
  } else {
    $_SESSION['fail'] = 'This product has been purchased by someone. You can only hide it';
  }
  echo "<script> window.location.href='admin-product.php?page=$currentPage&status=$status&text=$text';</script>";
  exit; 
}
//hidden
if (isset($_GET['action']) && $_GET['action'] == 'setstatus2' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $text = isset($_GET['text']) ? $_GET['text'] : ''; 
  $status = isset($_GET['status']) ? $_GET['status'] : '';
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $sql = "UPDATE product SET status = 2  WHERE id='$pid'";
  if (mysqli_query($connection->conn, $sql)) {

  } else {
    $_SESSION['fail'] = 'Hide fail';
  }
  echo "<script> window.location.href='admin-product.php?page=$currentPage&status=$status&text=$text';</script>";
  exit;
}
//on sale
if (isset($_GET['action']) && $_GET['action'] == 'setstatus1' && isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $text = isset($_GET['text']) ? $_GET['text'] : ''; 
  $status = isset($_GET['status']) ? $_GET['status'] : '';
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
  $sql = "UPDATE product SET status = 1  WHERE id='$pid'";
  if (mysqli_query($connection->conn, $sql)) {
   
    
  } else {
     
  }
  echo "<script> window.location.href='admin-product.php?page=$currentPage&status=$status&text=$text';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Product</title>
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
                <li >
                       <a href="admin-static.php" >
                            <span class="las la-chart-bar"></span>
                            <small>Statistics</small>
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
<input type="search" placeholder="Search (name)" class="record-search" name="text">

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
    <th> DATE ADD </th>
    <th  style="position: relative;"><span style="cursor: pointer; padding:11px 0;"  onmouseover="toggleDropdown()" onmouseout="toggleDropdown()">STATUS <i style="cursor: pointer; font-size:18px;" class="fa-solid fa-sort-down"></i>
                
                <div id="statusDropdown" class="dropdown-content show">
                  <input type="hidden" name="status">
                <a href="admin-product.php?status=<?php if(isset($searchText)) echo '&text=' . $searchText; ?>">All</a>
<a href="admin-product.php?status=0<?php if(isset($searchText)) echo '&text=' . $searchText; ?>">Not yet sale</a>
<a href="admin-product.php?status=1<?php if(isset($searchText)) echo '&text=' . $searchText; ?>">On Sale</a>
<a href="admin-product.php?status=2<?php if(isset($searchText)) echo '&text=' . $searchText; ?>">Hidden</a>
</div>
</span>
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

<td><?php echo date('d/m/Y', strtotime($product['date_add'])); ?></td>
<td>
<?php 
        if ($product['status'] == 1) {
            echo 'On sale';
        } else if($product['status'] == 0) {
            echo 'Not yet sale';
        }else{
          echo 'Hidden';
        }
    ?>

</td>
<td>
  <div class="actions">

  <a href="edit-product.php?pid=<?php echo $product['id'];?>&idloai=<?php echo $product['idloai'];?>&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchText)) echo '&text=' . $searchText; ?>"><span class="las la-edit" style="color:#076FFE;"></span></a>


  <?php if ($product['status'] == 1): ?>
    <a onclick="return confirm('Are you sure you want to hide this product?');" href="admin-product.php?action=setstatus2&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchText)) echo '&text=' . $searchText; ?>">
    <span class="las la-eye-slash"></span>
    </a>
<?php elseif($product['status'] == 0): ?>
    <a onclick="return confirm('Are you sure you want to delete this product?');" href="admin-product.php?action=delete&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchText)) echo '&text=' . $searchText; ?>">
        <span class="las la-trash" style="color: #d9534f;"></span>
    </a>
<?php else: ?>

    <a onclick="return confirm('Are you sure you want to show this product?');" href="admin-product.php?action=setstatus1&pid=<?php echo $product['id'];?>&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchText)) echo '&text=' . $searchText; ?>">
<span class="las la-eye"></span>
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

</div>

</div>
</main>

<?php if (mysqli_num_rows($products) > 0): ?>
<ul class="pagination" id="pagination">
<?php
      $searchParams = array();
if (isset($_GET['status'])) {
  $searchParams['status'] = $_GET['status'];
} 
if (isset($_GET['text'])) {
  $searchParams['text'] = $_GET['text'];
}  
        if ($page > 1) {
            echo '<li><a href="?page=' . ($page - 1) . '&' . http_build_query($searchParams) . '">Prev</a></li>';
        } else {
            echo '<li class="disabled"><a>Prev</a></li>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li ' . (($i == $page) ? 'class="active"' : '') . '><a  href="?page=' . $i . '&' . http_build_query($searchParams) .  '">' . $i . '</a></li>';
        }

        if ($page < $totalPages) {
            echo '<li ><a href="?page=' . ($page + 1) . '&' . http_build_query($searchParams) .  '">Next</a></li>';
        } else {
            echo '<li class="disabled"><a>Next</a></li>';
        }
        ?>
</ul>
<?php endif; ?>

<div class="container-popup">
   <div class="popup"  >
<div id="nutrifact">

    <h1 class="bold">Nutrition Facts</h1> 
   
    <span class="las la-reply" id="close-ic" onclick="hidePopup()"></span>

  
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
      <p><span><span class="bold">Total Fat</span> <input name="fatg" id="fatg" min="0" placeholder="?" maxlength="3">g</span></p>
      <p><span><span class="bold">Sodium</span> <input name="sodiummg" id="sodiummg" min="0" placeholder="?" maxlength="3">mg</span></p>
      <p><span><span class="bold">Total Carbohydrate</span> <input min="0" name="carbong" id="carbong" placeholder="?" maxlength="3">g</span> </p>
      <p><span><span class="bold">Sugars</span> <input name="sugarg" id="sugarg" min="0" placeholder="?" maxlength="3">g</span> </p>
      <p style="border: none;"><span><span class="bold">Protein</span> <input id="proteing" name="proteing" min="0" placeholder="?" maxlength="3">g</span> </p>
    
    </div>


<div class="divider medium"></div>
<p class="note"> *The Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</p>



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

<div class="user-input">

  <label>Price:</label>
<input type="number" name="price" id="price" maxlength="20">     

</div>

<div class="user-input" style="margin-bottom: 10px;">
  <label>Image:</label>
 <div class="upload-btn-wrapper">
    <button class="btn-upload">Upload Image <br> <i class="fa-solid fa-cloud-arrow-up"></i></button>
    <input type="file" name="fimage1" id="fimage1" accept="image/png" onchange="previewImage()" />
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
    <label> Brand:</label>
    <select name="brand" id="brand">
        <option value="0" selected>Select Brand</option>
        <?php
 
        $query = "SELECT brand FROM category";
        $result = mysqli_query($connection->conn, $query);
 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['brand']."'>".$row['brand']."</option>";
        }
        ?>
    </select>

    <label> Type:</label>
    <select name="type" id="type">
        <option value="0" selected>Select Type</option>
        <?php
 
        $query = "SELECT DISTINCT type FROM category";
        $result = mysqli_query($connection->conn, $query);
 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['type']."'>".$row['type']."</option>";
        }
        ?>
    </select>
</div>    



<div class="user-input" style="display:none;">
  <label>Date Add:</label>
<input type="date" name="date_add" id="date_add" >
</div>
<div class="user-input">

  <label>Description:</label>
<input style="width:80px; font-size:17px; text-align:center; cursor:pointer;" value="Show" type="button" id="showpopup" onclick="showPopup()">
</div>


<div style="text-align: center;" id="button-submit">
  <button type="submit" id="btn-submit" >Add Now</button>

</div>
</form>

</div>
</div>



</html>


  <script>
  const popup = document.querySelector('.popup');
  const overlay = document.querySelector('.container-popup');
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

    containerinputs.style.display="block";
    popup.style.display = 'none';
    overlay.style.display = 'none'; 
    htmlElement.style.overflow = 'auto';

  }


 </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
    var type = document.getElementById("type").value;
    var brand = document.getElementById("brand").value;
    var name = document.getElementById("name").value;
    var inputsToCheck = ["ml", "calo", "fatg", "sodiummg", "carbong", "sugarg", "proteing", "name", "image", "price"];
 var inputsToCheckNumbers = ["ml", "calo", "fatg", "sodiummg", "carbong", "sugarg", "proteing"];
 var nameRegex = /^[a-zA-Z\s]+$/;
 if (!nameRegex.test(name)) {
        alert("Product name must contain only letters.");
        return false;
    } 
 if (type === "0" || brand === "0") {
    alert("Please choose brand or type");
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
    var dropdown1 = document.getElementById("statusDropdown");
    dropdown1.classList.toggle("show");
    
}
</script>

<script>
document.querySelector('.record-search').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        var searchText = this.value.trim();
        window.location.href = 'admin-product.php?text=' + encodeURIComponent(searchText) + '&page=<?php echo $page; ?>' + '&status=<?php echo $searchStatus; ?>';
    }
});
    </script>

<script>
           document.addEventListener('DOMContentLoaded', function() {
    <?php if(isset($_SESSION['success'])): ?>
        swal('Success!', '<?php echo $_SESSION['success']; ?>', 'success');
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['fail'])): ?>
     swal('Fail!', '<?php echo $_SESSION['fail']; ?>', 'error');
     <?php unset($_SESSION['fail']); ?> 
    <?php endif; ?>
});
</script>