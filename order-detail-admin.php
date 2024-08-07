<?php
require 'config.php';

$connection = new Connection();

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
  header("Location: login-admin.php");
  exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
if(isset($_GET['username'])) {
  $username = $_GET['username'];
}
if(isset($_GET['status'])) {
  $status = $_GET['status'];
}
if(isset($_GET['district'])) {
  $districts = $_GET['district'];
}
if(isset($_GET['ward'])) {
  $wards = $_GET['ward'];
}
if(isset($_GET['city'])) {
  $citis = $_GET['city'];
}
if(isset($_GET['date_from'])) {
  $date_from = $_GET['date_from'];
}
if(isset($_GET['date_to'])) {
  $date_to = $_GET['date_to'];
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
     
      echo "<script> window.location.href='admin-order.php';</script>";
   
      exit;
  }
} else {
echo "<script> window.location.href='admin-order.php';</script>";

  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/admin-order.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,  initial-scale=0.9,maximum-scale=1">
    <title>Order Details Admin</title>
</head>
<body>
  <div class="container-order-detail">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title" >
                         
                            <h4 class="float-end font-size-15" style="margin-bottom: 10px;text-align: center;">ORDER <span  style="font-weight: 400;"> <?php echo $orderId ?> |</span>
                            <?php 
                                         if($order['status']==1){
                                            echo ' <span style="font-weight: 400;margin-left: 4px;"> <?php echo $orderId; ?></span> <span class="badge bg-success font-size-11 ms-2" style="color: white;font-size: 16px; padding: 6px 10px;margin-left: 4px;">Delivery successful</span>';
                                         }else if($order['status']==0){
                                            echo ' <span style="font-weight: 400;margin-left: 4px;"> <?php echo $orderId; ?></span> <span class="badge bg-success font-size-11 ms-2" style="color: white;font-size: 16px; padding: 6px 10px;margin-left: 4px;">Confirmed</span>';
                                         }else if($order['status']==2){
                                            echo ' <span style="font-weight: 400;margin-left: 4px;"> <?php echo $orderId; ?></span> <span class="badge font-size-11 ms-2" style="color: white;font-size: 16px; padding: 6px 10px;margin-left: 4px; background:red;">Delivery cancelled</span>';
                                         }else{
                                            echo ' <span style="font-weight: 400;margin-left: 4px;"> <?php echo $orderId; ?></span> <span class="badge font-size-11 ms-2" style="color: white;font-size: 16px; padding: 6px 10px;margin-left: 4px; background-color:gray;">Awaiting processing</span>';
                                         }
                                           
                                       ?></h4>
                      
                            <hr>
                           <div style="display: flex; justify-content:space-between; align-items:center;">
                                 <div >
                                 <h5 class="font-size-16 mb-2">Order Information:</h5>
                          <h3 class="h6">Payment Method:<span style="font-weight: 400;">    
                          <?php  if($order['paymethod']=='cod'){
                                            echo 'COD';
                                        }else{
                                            echo 'Credit card';
                                        } ?>
                                        </span></h5>
                          <h3 class="h6">Date Order:<span style="font-weight: 400;"> <?php echo date('d/m/Y', strtotime($dateorder)); ?></span></h5>
                    
                      </div>
                      <div>
                        <img src="assets/images/pic/logo.png" width="100px">
                      </div>
                           </div>
                           
                        </div>
    
                        <hr class="my-3">
                    
                        <div class="row">
                            <div class="col-sm">
                            <div>
                                    <h5 class="font-size-16 mb-2">Customer Information:</h5>
                                    <h3 class="h6">By: <span style="font-weight: 400;"><?php echo $fullname; ?></span></h3>
                                    <h3 class="h6">Phone: <span style="font-weight: 400;"><?php echo $phone; ?></span></h3>
                                    <h3 class="h6">Address: <span style="font-weight: 400;"><?php echo $sonha; ?> <?php echo $duong; ?> <?php echo $city; ?> <?php echo $district; ?> <?php echo $ward; ?></span></h3>
                                </div>
                            </div>
                       
                            <div class="col-sm-6" style="display: none;">
                              <div class="text-sm-end">
                             
                                  <div class="mt-4">
                                      <h3 class="mb-1" style="font-size: 16px;">Note: <span style="font-weight: 400;"> If you cannot send the complete order within 10 days, please inform me immediately.</span></h5>
                                    
                                  </div>
                             
                              </div>
                          </div>
                        
                    
                        </div>
                        <!-- end row -->
                        <hr class="my-3">

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary:</h5>
    
                            <div class="table-responsive">
                              <table class="table table-borderless" id="order-detail-table">
                                <thead>
                                  <tr style="border-bottom: 1px solid black;">
                               <th>No.</th>
                                      <th style="text-align: left; padding-left: 30px;">Item</th>
                                      <th>Quantity</th>
                                      <th >Subtotal</th>
                                    
                                    
                                  </tr>
                              </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                while ($orderdetail = mysqli_fetch_assoc($orderdetails)) { 
                            $count++;
                                  ?>
                                    <tr> 
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td>
                                      <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                          <img src="<?php echo $orderdetail['image']; ?>" alt="" width="65" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3" >
                                            <h6 class="mb-2" style="font-size: 17px;font-weight:400;">
                                       
                                            <?php echo $orderdetail['name']; ?>
                                      </h6>
                                          <span class="medium">$<?php echo $orderdetail['price']; ?>.00</span>
                                        
                                        </div>
                                      </div>
                                    </td>
                                    <td>x<?php echo $orderdetail['sl_mua']; ?></td>
                                    <td class="text-end">$<?php echo $orderdetail['subtotal']; ?>.00</td>
                                  </tr>
                               <?php  } ?>

                                </tbody>
                     
                              </table>

                              <table id="table-price" style="margin-bottom: 10px; margin-left: 10px;">
                            <tbody>
                           

                              <tr class="fw-bold">
                                <td colspan="2" style="font-size: 20px; font-weight: 600;">TOTAL:</td>
                                <td class="text-end" style="font-size: 20px; font-weight: 600;">$<?php echo $total; ?>.00</td>
                              </tr>
                         
                            </tbody>
                              </table>
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" id="print-order"><i class="fa fa-print"></i></a>
                            
                                    <a id="back-to-admin-order" onclick="window.location.href='admin-order.php?page=<?php echo $page; ?><?php if(isset($username)) echo '&username=' . $username; ?><?php if(isset($status)) echo '&status=' . $status; ?><?php if(isset($districts)) echo '&district=' . $districts; ?><?php if(isset($wards)) echo '&ward=' . $wards; ?><?php if(isset($citis)) echo '&city=' . $citis; ?><?php if(isset($date_from)) echo '&date_from=' . $date_from; ?><?php if(isset($date_to)) echo '&date_to=' . $date_to; ?>'">Back To Order</a>
                   
                                  </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
</body>
</html>