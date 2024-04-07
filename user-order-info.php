<?php
require 'config.php';
$connection = new Connection();
$select = new Select();
if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
    
  }else{
    header("Location: login.php");
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
exit();
}

if(isset($_GET['idorder'])) {
    $orderId = $_GET['idorder'];
      
    $orderObj = new Order();
  $orderdetailObj = new Orderdetail(); 
  
    $order = $orderObj->selectOrdersById($orderId);
   $orderdetail = $orderdetailObj->selectOrderdetailsById($orderId);
   $orderdetails = $orderdetailObj->selectOrdertailsandProduct($orderId);
    if($order && $orderdetail) {
      
        $fullname = $order['fullname'];
        $phone = $order['phone'];
        $sonha = $order['sonha'];
        $duong = $order['duong'];
        $district = $order['district'];
        $ward = $order['ward'];
        $city = $order['city'];
        $total = $order['total'];
        $paymethod = $order['paymethod'];
        $dateorder = $order['dateorder'];
    } else {
       
        echo "<script>alert('Order id not found!'); window.location.href='history.php';</script>";
     
        exit;
    }
  } else {
  echo "<script>alert('Order id not found!'); window.location.href='history.php';</script>";
  
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user-order.css">
   
    <meta name="viewport" content="width=device-width,  initial-scale=0.9,maximum-scale=1">
    <title>Order Detail</title>
</head>
<body>
  <div class="container">
    <article class="card">
    <header class="card-header" style="display: flex; justify-content: start; align-items: center;"> 
        <h3 style="font-size: 17px; font-weight: 600; margin-right: 15px;">My Orders</h3>
        <h3 style="font-size: 17px;">ID: <?php echo $orderId; ?></h3>
        </header>
        <div class="card-body">
         
            <article class="card">
                <div class="card-body col">
                <div class="row" style="display: flex; justify-content: flex-start;"> 
                
                <span style="margin-right: 25px; margin-left: 10px;"><strong>Date Order:</strong> <?php echo $dateorder; ?>   </span> 
                <span> <strong>Payment method:</strong>  <?php echo $paymethod; ?></span> 
             
            </div>
                   
                </div>
            
            </article>
            <div class="track">
            <?php 
                                         if($order['status']==1){
                                            echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                                         }else if($order['status']==0){
                                            echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                                         }else if($order['status']==2){
                                            echo '<div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                                         }else{
                                            echo '<div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                                         }
                                       
                                    
                                       ?>
                
            </div>
            <hr>
            <div class="osahan-account-page-right  bg-white p-2 h-100">
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                  

                      <div class="bg-white card mb-4 order-list shadow-sm">
                          <div class="gold-members p-4">
                              <a href="#">
                              </a>
                              <?php
                                $count = 0;
                                while ($orderdetail = mysqli_fetch_assoc($orderdetails)) { 
                            $count++;
                                  ?>
                              <div class="media">
                                
                                  <a href="#">
                                      <img class="mr-4" src="<?php echo $orderdetail['image']; ?>" alt="Generic placeholder image">
                                  </a>
                                  
                                  <div class="media-body">
                                     
                                      <h6 class="mb-2" style="font-size: 18px;">
                                       
                                      <?php echo $orderdetail['name']; ?>
                                      </h6>
                                      <div class="flex-container" style="margin-bottom: 8px;">
                                          <p class="mb-3"> $<?php echo $orderdetail['price']; ?>.00</p>
                                          <p class="text-gray mb-1">x<?php echo $orderdetail['sl_mua']; ?></p>
                                          
                                        </div>
                                      
                                    
                                  
                                      <hr>
                                    
                                  </div>
                              </div>
                              <?php  } ?>
                              <div class="media">
                               
                                  
                                  <div class="media-body">
                                  <?php 
                                         if($order['status']==1){
                                            echo ' <p  style="color: #26aa99;" id="successful"> <i class="fa-solid fa-truck"></i> Delivery successful</p>';
                                         }else if($order['status']==0){
                                            echo ' <p  style="color: #26aa99;" id="successful"> <i class="fa-regular fa-circle-check"></i> Confirmed</p>';
                                         }else if($order['status']==2){
                                            echo ' <p  style="color: red;" id="successful"> <i class="fa-solid fa-ban"></i> Delivery cancelled</p>';
                                         }else{
                                            echo '';
                                         }
                                       
                                    
                                       ?>

                                      <p  class="mb-0 text-black pt-2" id="total-money"><span style="color: black;" class="text-black font-weight-bold"> Total:</span> $<?php echo $total; ?>.00</p>
                                     
                              
                                  </div>
                              </div>
                            
                          
                          </div>
                      </div>
                   
                 

                  </div>
              </div>
          </div>
          <h6>Delivery Address</h6>
          <article class="card">
            <div class="card-body row"  style="padding-bottom: 0;">
            <div class="col"> <strong><?php echo $fullname; ?> </strong><br> <?php echo $phone; ?></div>
              <div class="col"> <strong>Address:</strong> <?php echo $sonha; ?> <?php echo $duong; ?> <?php echo $city; ?> <?php echo $district; ?> <?php echo $ward; ?></div>
             
         
  
            </div>
         
            <div class="card-body row" style="visibility:hidden;">
              <div class="col"> <strong>Your note:</strong> I love your web!!</div>
        
         
               
               
            </div>
        
        </article>
            <hr>
            <a href="history.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
</body>
</html>


