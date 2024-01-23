<?php

require 'config.php';

$start = 0;
$limit = 10; 

$productObj = new Product();

$products = $productObj->selectProducts($start, $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Product</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
          Product's Image:<input type="file" name="fimage1" id="fimage1" onchange="previewImage()">
        
                </div>

                  <img id="preview-image" src="" alt="Preview Image" width="30%" style="display: none; margin-bottom: 5px;">
              

        <div class="user-input" style="display: none;">
           Product's Url:<input type="text" name="fimage" id="fimage" >
                 </div>
                 <div class="user-input">
                  Product Type:<select style="padding: 2px 50px;">
                    <option>Select Type</option>
                    <option>Carbonated</option>
                    <option>Non-carbonated</option>
                  </select>
                       </div>
        <div class="user-input">
Product Name:<input type="text" name="name" id="name">
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
        Description:<input type="text" name="descrip" id="descrip" >
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
  <li onclick="prevPage()">Prev</li>
 
  <li onclick="nextPage()">Next</li>
</ul>
</div>

</div>
</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>

var predefinedContent = '<div class="actions"><span class="lab la-telegram-plane"></span><span class="las la-edit"></span><span class="las la-trash"></span></div>';
  document.getElementById("action").value = predefinedContent;
  var predefinedContent = '<div class="image-product-admin"><div><img src="assets/images/sp/" id="productImage"></div></div>';
  document.getElementById("fimage").value = predefinedContent;

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






