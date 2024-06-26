<?php
require 'config.php';
$connection = new Connection();
$select = new Select();

if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
} else {
    header("Location: login.php");
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

if(empty($_SESSION["shopping_cart"])){
    header("Location: shop.php#product11");
    exit();
}
if (empty($user['fullname']) || empty($user['phone']) || empty($user['sonha']) || empty($user['duong']) || empty($user['city']) || empty($user['district']) || empty($user['ward'])) {
 echo '<script>alert("Please enter your complete information"); window.location.href="user.php"</script>';
  
    exit(); 
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['address']) && $_POST['address'] === 'info-address1') {
        $fullname = $connection->conn->real_escape_string(trim($_POST['fullnameacc']));
        $phone = $connection->conn->real_escape_string($_POST['phoneacc']);
        $sonha = $connection->conn->real_escape_string(trim($_POST['sonhaacc']));
        $duong = $connection->conn->real_escape_string(trim($_POST['duongacc']));
        $district = $connection->conn->real_escape_string($_POST['districtacc']);
        $ward = $connection->conn->real_escape_string($_POST['wardacc']);
        $city = $connection->conn->real_escape_string($_POST['cityacc']);
        $username = $connection->conn->real_escape_string($_POST['username']);
         $total = $connection->conn->real_escape_string($_POST['total']);
         
    } else {
    $fullname = $connection->conn->real_escape_string(trim($_POST['fullname']));
    $phone = $connection->conn->real_escape_string(trim($_POST['phone']));
    $sonha = $connection->conn->real_escape_string(trim($_POST['sonha']));
    $duong = $connection->conn->real_escape_string(trim($_POST['duong']));
    $district = $connection->conn->real_escape_string($_POST['district']);
    $ward = $connection->conn->real_escape_string($_POST['ward']);
    $city = $connection->conn->real_escape_string($_POST['city']);
    $total = $connection->conn->real_escape_string($_POST['total']);
    $username = $connection->conn->real_escape_string($_POST['username']);
    }
    if (isset($_POST['pay-method']) && $_POST['pay-method'] === 'cc') {
        $payment_method = 'cc';
    } else {
        $payment_method = 'cod'; 
    }
    do {
        $random_id = 'OD' . sprintf("%04d", rand(0, 9999));
        $check_query = "SELECT COUNT(*) AS count FROM tb_order WHERE idorder='$random_id'";
        $result = mysqli_query($connection->conn, $check_query);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
    } while ($count > 0);

    $query = "INSERT INTO tb_order (idorder,fullname,phone,sonha,duong,district,ward,city,username,dateorder,total,paymethod,status) VALUES ('$random_id','$fullname','$phone','$sonha','$duong','$district','$ward','$city','$username',NOW(),'$total','$payment_method',3)";

    if (mysqli_query($connection->conn, $query)) {
        foreach($_SESSION["shopping_cart"] as $key => $value)
        {
            $total = $connection->conn->real_escape_string($_POST['total']);
            $id = $value["item_id"];
            $sl_mua = $value["item_quantity"];
            $price = $value["item_price"];
            $subtotal = $price * $sl_mua;
            $query1 = "INSERT INTO order_detail (idorder,id,sl_mua,subtotal) VALUES ('$random_id','$id','$sl_mua','$subtotal')";
            mysqli_query($connection->conn, $query1);
            $update_query = "UPDATE product SET status = 1 WHERE id = '$id' AND status = 0";
            mysqli_query($connection->conn, $update_query);
        }
    
        mysqli_query($connection->conn, $update_query);
        unset($_SESSION['shopping_cart']);
     
    
   
  echo "<script> window.location.href='successorder.php?orderid=$random_id'; </script>";
     exit;
    } else {
        echo "<script> alert('Fail'); window.location.href='shop.php#product11';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/pay.css">
    <link rel="stylesheet" href="assets/css/main.css">
   <title>Payment Page</title>
    <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<?php
include_once 'header.php'
  ?>

  <div class="containerx">

      <div class="row">
          <div class="col-xl-8">
  
              <div class="card">
                  <div class="card-body">
                    
                      <ol class="activity-checkout mb-0 px-4 mt-3">
                        
                          <li class="checkout-item">
                            
                              <div class="avatar checkout-icon p-1">
                                  <div class="avatar-title rounded-circle bg-primary">
                                  
                                      <i class="fa-regular fa-id-card text-white font-size-20"></i>
                                  </div>
                                  
                              </div>
                              <div class="feed-item-list">

                                  <div>
                                  <form  method="post" action="" onsubmit="return kttrong()">
                                      <h5 class="font-size-16 mb-1">Shipping Info </h5>
                                      <div class="feed-item-list">
                                        <div>
                                           
                                           
                                            <div class="mb-1">
                                                <div class="row">
                                            
                                                    <div class="col-lg-4 col-sm-6" >
                                                        <div data-bs-toggle="collapse" id="address-pay" >
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address1" class="card-radio-input" value="info-address1">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-3 d-block">Your Account</span>
                                                                    <span class="fs-14 mb-2 d-block"><?php echo $user['fullname']; ?></span>
                                                                   
                                                                       <span class="fs-14 mb-2 d-block"><?php echo $user['phone']; ?></span>
                                                                    <span class="text-muted fw-normal text-wrap mb-1 d-block"><?php echo $user['sonha']; ?> <?php echo $user['duong']; ?> <?php echo $user['city']; ?> <?php echo $user['district']; ?> <?php echo $user['ward']; ?></span>
                                                           
                                                                 
                                                                </div>
                                                            </label>
                                                      
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-4 col-sm-6" >
                                                        <div id="address-add">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address2" class="card-radio-input" checked="" value="info-address2">
                                                                <div class="card-radio text-truncate p-3" >
                                                                    <span class="fs-14 mb-4 d-block">Add Adress</span>
                                                 
                                                                  
                                                                    <span style=" display: flex; align-items: center; justify-content: center;margin: 48px 0px ; font-size: 35px;"><i class="fa-sharp fa-regular fa-plus"></i></span>
                                                          
                                                                </div>
                                                            </label>
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                      
                                  </div>
                              </div>
                          </li>
                          <li class="checkout-item">
                           
                          <div class="mb-3" id="disappear-add-address">
                         <div id="address-info">
                                          <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                                          <input type="hidden" name="fullnameacc" value="<?php echo $user['fullname']; ?>">
                                          <input type="hidden" name="phoneacc" value="<?php echo $user['phone']; ?>">
                                          <input type="hidden" name="sonhaacc" value="<?php echo $user['sonha']; ?>">
                                          <input type="hidden" name="duongacc" value="<?php echo $user['duong']; ?>">
                                          <input type="hidden" name="districtacc" value="<?php echo $user['district']; ?>">
                                          <input type="hidden" name="wardacc" value="<?php echo $user['ward']; ?>">
                                          <input type="hidden" name="cityacc" value="<?php echo $user['city']; ?>">
                                              <div>
                                                  <div class="row">
                                                  <h5 class="font-size-16" style="margin-bottom: 12px;">Receiver Info </h5>
                                              
                                                  <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="fullname">Full name</label>
                                                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter full name" maxlength="30">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="street">Phone number</label>
                                                            <input type="text" class="form-control" inputmode="numeric" id="phone" name="phone"  placeholder="Enter phone number" maxlength="11">
                                                        </div>
                                                    </div>

                                                  <div class="col-lg-4">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="hnumber">House number</label>
                                                            <input type="text" class="form-control" name="sonha" id="sonha" placeholder="Enter house number">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="street">Street</label>
                                                            <input type="text" class="form-control" name="duong" id="duong" placeholder="Enter street">
                                                        </div>
                                                    </div>

                                                      <div class="col-lg-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">City</label>
                                                            <select class="form-select" id="city" name="city" aria-label=".form-select-sm">
                                                                <option value="0" selected>Select City</option> 
                                                                <option value="Ho Chi Minh City">Ho Chi Minh City</option> 
                                                                <option value="Ha Noi City">Ha Noi City</option> 
                                                            </select>
                                                        </div>
                                                    </div>
  
                                                      <div class="col-lg-4">
                                                          <div class="mb-2">
                                                            <label class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" aria-label=".form-select-sm">
                                                                <option value="0" selected>Select District</option>
                                                                <option value="District 1">District 1</option> 
                                  <option value="District 2">District 2</option> 
                                  <option value="District 3">District 3</option> 
                                  <option value="District 4">District 4</option> 
                                  <option value="District 5">District 5</option> 
                                  <option value="District 6">District 6</option> 
                                                                </select>
                                                          </div>
                                                      </div>
  
                                                      <div class="col-lg-4">
                                                        <div class="mb-2">
                                                            <label class="form-label">Ward</label>
                                                            <select class="form-select" name="ward" id="ward" aria-label=".form-select-sm">
                                                                <option value="0" selected>Select Ward</option>
                                                                <option value="Ward 1">Ward 1</option> 
                                  <option value="Ward 2">Ward 2</option> 
                                  <option value="Ward 3">Ward 3</option> 
                                  <option value="Ward 4">Ward 4</option> 
                                  <option value="Ward 5">Ward 5</option> 
                                  <option value="Ward 6">Ward 6</option> 
                                                                </select>
                                                        </div>
                                                    </div>         
  
                                                    
                                                  </div>
                                              </div>
                                  
                                      </div>
                                      </div>
                          </li>

                          <li class="checkout-item">
                              <div class="avatar checkout-icon p-1">
                                  <div class="avatar-title rounded-circle bg-primary">
                                    <i class="fa-regular fa-credit-card text-white font-size-20"></i>
                                   
                                  </div>
                              </div>
                              <div class="feed-item-list">
                                  <div>
                                      <h5 class="font-size-16 mb-1">Payment Info</h5>
                                    
                                  </div>
                                  <div>
                                      <h5 class="font-size-14 mb-3">Payment method :</h5>

                                      <div class="row">
                                   <div class="col-lg-3 col-sm-6" style="margin-bottom: 8px;">
                                              <div>
                                                  <label class="card-radio-label">
                                                      <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="" value="cod">
  
                                                      <span class="card-radio py-3 text-center text-truncate">
                                                         
                                                          <i class="fa-regular fa-money-bill-1 d-block h2 mb-3"></i>
                                                          <span>Cash On Delivery</span>
                                                      </span>
                                                  </label>
                                              </div>
                                          </div>

                                          <div class="col-lg-3 col-sm-6" style="margin-bottom: 8px;">
                                              <div>
                                                  <label class="card-radio-label">
                                                      <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input" value="cc">
                                                      <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="fa-solid fa-building-columns d-block h2 mb-3"></i>
                                                          
                                                          Credit Card
                                                      </span>
                                                  </label>
                                              </div>
                                          </div>
  
                                       
                                          
                                      </div>

                                      <div class="row" style="margin-top: 10px;" id="pay-date-cvv1">
                                      <div class="col-lg-5" id="credit-form1" style="display: none;">
                                          <div class="mb-2">
                                              <label class="form-label" for="zip-code">Cardholder Name</label>
                                              <input type="text" class="form-control" id="cardname" placeholder="Enter Full name" >
                                          </div>
                                      </div>
                                      <div class="col-lg-5">
                                        <div class="mb-2" id="credit-form2" style="display: none;">
                                            <label class="form-label" for="card-number">Card Number</label>
                                            <input type="number" inputmode="numeric" class="form-control"  id="card-number" placeholder="Enter Card Number">
                                        </div>
                                        
                                    </div>
                                  

        </div>
     
                                    

                                    <div class="row" style="margin-top: 10px;" id="pay-date-cvv">
            
                                      <div class="col-lg-5">
                                          <div class="mb-2" id="credit-form3" style="display: none;">
                                              <label class="form-label" for="billing-city">Expiry Date</label>
                                              <input type="date" class="form-control" id="expiry-date" placeholder="Enter Expiry Date" >
                                          </div>
                                      </div>

                                      <div class="col-lg-5">
                                          <div class="mb-2" id="credit-form4" style="display: none;">
                                              <label class="form-label" for="zip-code">CVV</label>
                                              <input type="number"  class="form-control" id="cvv" placeholder="Enter CVV" >
                                          </div>
                                      </div>
                                      
                                  </div>
                                
                                    
                                 
                             
                                  
                              </div>
                          </li>

                      </ol>


                      <div class="row my-4">
                        <div class="float-start">
                    
                     <a href="shop.php" class="btn btn-link text-muted" id="continue-shopping-btn" style="margin-right: 10px;"><i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>                
             
                     <button type="submit" name="submit" class="btn btn-success" id="success-pay-btn"><i class="mdi mdi-cart-outline me-1"></i> Procced </button>                       
                        
                    </div>
                    
                    </div>
                 
                  </div>
              </div>
  
         
          </div>
          <div class="col-xl-4">
              <div class="card checkout-order-summary">
                  <div class="card-body">
                 
                    
                      <div class="p-3 bg-light mb-3">  
                  
                          
                          <h5 class="font-size-30 mb-0" style="font-weight: 600;">Order Summary </h5>
                 
                       
                      </div>
                      <div class="table-responsive">
                          <table class="table table-centered mb-0 table-nowrap">
                              <thead>
                                  <tr>
                                      <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                      <th class="border-top-0" scope="col">Product Details</th>
                                      <th class="border-top-0" scope="col">Price</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php

if(!empty($_SESSION["shopping_cart"])) {
    $total = 0; 

    foreach($_SESSION["shopping_cart"] as $key => $value) {
        ?>
        <tr>
       
            <th scope="row"><img src="<?php echo $value["item_img"]; ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
            <td>
            <input type="hidden"  name="id" value="<?php echo $value["item_id"]; ?>">
  <input type="hidden"  name="sl_mua" value="<?php echo $value["item_quantity"]; ?>">
  <input type="hidden"  name="price" value="<?php echo $value["item_price"]; ?>">

                <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark"><?php echo $value["item_name"]; ?></a></h5>
                <p class="text-muted mb-0 mt-1">$<?php echo $value["item_price"]; ?>.00 x <?php echo $value["item_quantity"]; ?></p>
            </td>
            <td>$<?php echo $value["item_price"] * $value["item_quantity"] ?>.00</td>
        </tr>
        <?php
 
        $total += $value["item_price"] * $value["item_quantity"];
    }
}
?>
<!-- Display total row -->
<tr class="bg-light">
    <td colspan="2">
        <h5 class="font-size-14 m-0">Total:</h5>
    </td>
    <td>
        $<?php echo $total; ?>.00
        <input type="hidden" name="total" value="<?php echo $total; ?>">
    </td>
</tr>
</tbody>


                          </table>
                          
                      </div>
                  </div>
              </div>
   
          </div>
          
      </div>
      </form>
      <!-- end row -->
      
  </div>


  <?php
include_once 'footer.php'
  ?>
</body>
</html>


<script>

  const cod=document.getElementById("pay-methodoption3");
  const visa=document.getElementById("pay-methodoption2");
  const cardname=document.getElementById("credit-form1");
  const cardnumber=document.getElementById("credit-form2");
  const expiry=document.getElementById("credit-form3");
  const cvv=document.getElementById("credit-form4");

cod.addEventListener('click',()=>{
    cardname.style.display='none';
    cardnumber.style.display='none';
    expiry.style.display='none';
    cvv.style.display='none';
});
  visa.addEventListener('click',()=>{
    cardname.style.display='block';
    cardnumber.style.display='block';
    expiry.style.display='block';
    cvv.style.display='block';
  
  });

</script>

<script>
    function kttrong() {
        var addressOption = document.querySelector('input[name="address"]:checked').value;
        var payOption = document.querySelector('input[name="pay-method"]:checked').value;
        
  if(payOption==='cc'){
    var cardNumber = document.getElementById("card-number").value.trim();
    var cardName = document.getElementById("cardname").value.trim();
        var cardNumber = document.getElementById("card-number").value.trim();
    var expiryDate = document.getElementById("expiry-date").value.trim();
    var cvv = document.getElementById("cvv").value.trim();
    if (cardNumber === "" || expiryDate === "" || cvv === "" || cardName === "") {
        alert("Please fill in all credit card fields.");
        return false;
    }
    }
if (addressOption === "info-address2") {
    var phone = document.getElementById("phone").value.trim();
    var fullname = document.getElementById("fullname").value.trim();
    var sonha = document.getElementById("sonha").value.trim();
    var duong = document.getElementById("duong").value.trim();
    var addressRegex = /^[a-zA-Z0-9\s\/]+$/;
  var phoneRegex = /^0[1-9]\d{8,9}$/;
  var fullnameRegex = /^[a-zA-Z\s]+$/;


  if (fullname === "" || phone === "" || sonha === "" || duong === "") {
            alert("Please fill in all fields.");
            return false;
        }

  if (!fullnameRegex.test(fullname)) {
        alert("Full name must contain only letters.");
    
        return false;
    } 

    if(!phoneRegex.test(phone)){
        alert("Invalid Phone Number.");
   
        return false;
    }
    if(!addressRegex.test(sonha) || !addressRegex.test(duong)){
        alert("Invalid Address.");
   
        return false;
    }
        var city = document.getElementById('city').value;
        if (city === "0") {
            alert("Please select a city");
            
            return false;
        }


        var district = document.getElementById('district').value;
        if (district === "0") {
            alert("Please select a district");
     
            return false;
        }

        var ward = document.getElementById('ward').value;
        if (ward === "0") {
            alert("Please select a ward");
        
            return false;
        }

        return true;
    }

    }
</script>

<script>
    const accountaddress=document.querySelector('#address-pay');
    const addressadd=document.querySelector('#address-add');
    const addressinfo=document.querySelector('#address-info');
    const disappearaddress=document.querySelector('#disappear-add-address');
    accountaddress.onclick = function(){
addressinfo.style.display="none";
disappearaddress.style.display="none";

    }
    addressadd.onclick=function(){
        addressinfo.style.display="block";
        disappearaddress.style.display="block";
    
    }


</script>



<style>
    a:hover{
        color: #878a99;
    }
    ul{
        padding-left: 0;
    }
    img{
        vertical-align:0;
    }
    hr{
        opacity: 1;
border: 1;
color: white;
        margin: 0;
    }
    h1,h2,p,ul{
        margin-bottom: 0;
        line-height: normal;
    }
    a{
        margin: 0;
    }
    input{
        font-size: 16px;
        line-height: normal;
        font-size: small;
    }
    svg{
        vertical-align:unset;
    }
 </style>