<?php
require 'config.php';
$connection = new Connection();
$select = new Select();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
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
        $paymethod = $order['paymethod'];
        $dateorder = $order['dateorder'];
    } else {
       
        echo "<script> window.location.href='history.php';</script>";
     
        exit;
    }
  } else {
  echo "<script>window.location.href='history.php';</script>";
  
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
    <link rel="stylesheet" href="assets/css/main.css"/>
    <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
    <title>Order Detail</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

  <div class="container" style="margin-top: 150px; margin-bottom:50px;">
    <article class="card">
    <header class="card-header" style="display: flex; justify-content:space-between; align-items:center;"> 
    <div style="margin: 4px 0;">
       <h3 style="font-size: 17px; font-weight: 600; margin-right: 15px;">My Orders <span style="font-weight: 400;">| ID: <?php echo $orderId; ?> </span></h3>
      
    </div>
    <div>
                                    <img src="assets/images/pic/logo.png" style="display:  none;"  id="order-info-logo" onclick="window.location.href='index.php';">
                                </div>
                             
        </header>
        <div class="card-body">
         
            <article class="card">
                <div class="card-body col">
                <div class="row" style="display: flex; justify-content: flex-start;"> 
                
                <span style="margin-right: 25px; margin-left: 25px;"><strong>Date Order:</strong> <?php echo date('d/m/Y', strtotime($dateorder)); ?>   </span> 
                <span style="margin-left: 25px;"> <strong>Payment method:</strong>  
                                        <?php  if($order['paymethod']=='cod'){
                                            echo 'COD';
                                        }else{
                                            echo 'Credit card';
                                        } ?></span> 
             
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
            <hr style="border: 0.2px solid rgba(0, 0, 0, .1) !important; margin:1.2rem 0;">
            <div class="osahan-account-page-right  bg-white p-2 h-100">
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                  

                      <div class="bg-white card mb-4 order-list shadow-sm">
                          <div class="gold-members p-4">
                          
                              <?php
                                $count = 0;
                                while ($orderdetail = mysqli_fetch_assoc($orderdetails)) { 
                            $count++;
                                  ?>
                              <div class="media">
                                
                           
                                      <img class="mr-4" src="<?php echo $orderdetail['image']; ?>" alt="Generic placeholder image">
                               
                                  
                                  <div class="media-body">
                                     
                                      <h6 class="mb-3" style="font-size: 18px;">
                                       
                                      <?php echo $orderdetail['name']; ?>
                                      </h6>
                                      <div class="flex-container" style="margin-bottom: 8px;">
                                          <p class="mb-3"> $<?php echo $orderdetail['price']; ?>.00</p>
                                          <p class="text-gray mb-1">x<?php echo $orderdetail['sl_mua']; ?></p>
                                          
                                        </div>
                                      
                                    
                                  
                                        <hr style="border: 0.2px solid rgba(0, 0, 0, .1) !important; margin:1.2rem 0;">
                                    
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

                                      <p  class="mb-0 text-black pt-2" id="total-money"><span style="color: black;" class="text-black font-weight-bold"> Total:</span> $<?php echo $order['total']; ?>.00</p>
                                     
                              
                                  </div>
                              </div>
                            
                          
                          </div>
                      </div>
                   
                 

                  </div>
              </div>
          </div>
          <h6>Delivery Information:</h6>
          <article class="card">
            <div class="card-body row"  style="padding-bottom: 0; display:flex;justify-content:space-between;margin:0 8px;">
            
            <div> <strong>Full name:</strong> <?php echo $fullname; ?> <br> <strong> Phone: </strong><?php echo $phone; ?></div>
              <div> <strong>Address:</strong> <?php echo $sonha; ?> <?php echo $duong; ?> <?php echo $city; ?> <?php echo $district; ?> <?php echo $ward; ?></div>
             
         
  
            </div>
         
            <div class="card-body row" style="margin:0 8px;visibility:hidden;">
              <div> <strong>Your note:</strong> I love your web!!</div>
         
               
            </div>
        
        </article>
            <hr style="border: 0.2px solid rgba(0, 0, 0, .1) !important; margin:1.2rem 0;">
            <a href="history.php?page=<?php echo $page; ?>" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>

<?php
include_once 'footer.php'
  ?>
</body>
</html>


<style>
    a{
        text-decoration: none;
    }
    a:hover{
        color: #878a99;
        text-decoration: none;
    }
    ul{
        padding-left: 0;
    }
    img{
        vertical-align:0;
    }
    hr{
        opacity: 1;
        border: 0.2px solid white !important;
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
        font-size:small;
    }
    svg{
        vertical-align:unset;
    }
    h2{
        font-weight: 550;
    }

 </style>

