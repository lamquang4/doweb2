<?php
require 'config.php';
$connection = new Connection();
$order = new Order();
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
$username = $_SESSION["username"];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$start = ($page - 1) * $limit;
$orders = $order->selectOrdersByUsername($username,$start,$limit);
$totalOrders = $order->getOrderCount1($username);
$totalPages = ceil($totalOrders / $limit);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order</title>
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/history.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  
<div class="containerz">
    <div class="row">
        <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;" >
            <div class="osahan-account-page-left  bg-white h-100">
                <div class="border-bottom p-4">
                    <div style="display: flex; justify-content: center;"  id="logo-history">
                        <img src="assets/images/pic/logo.png" class="logo-user" style="cursor: pointer;" onclick="window.location.href='index.php' " >
                    </div>
                                   
                </div>

                    <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="user.php">Profile</a>
                    <a class="list-group-item list-group-item-action active" data-toggle="list"
                    href="history.php">Purchase order</a>

                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="changepass.php">Change password</a>
                    
               
            </div>
        </div>
        <div class="col-md-9" style="border: 1px solid #DFDFDF;padding-left: 6px; padding-right: 6px ;" class="right-containers">
            <div class="osahan-account-page-right  bg-white p-2 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4 class="font-weight-bold mt-0 mb-4">Purchase Order</h4>
                       
                        <?php
                        $orderdetailObj = new Orderdetail();

                        if(mysqli_num_rows($orders) > 0) {
                        while ($order = mysqli_fetch_assoc($orders)) { 
                            $orderId = $order['idorder'];

    $orderdetails = $orderdetailObj->selectOrdertailsandProduct($orderId);
                            ?>
                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div class="gold-members p-4">
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
                                       
                                        <h6 class="mb-2" style="font-size: 18px; font-weight:400;">
                                        <?php echo $orderdetail['name']; ?>
                                        </h6>
                                        <div class="flex-container" style="margin-bottom: 5px;">
                                           
                                            <p class="mb-3">$<?php echo $orderdetail['price']; ?>.00</p>
                                            <p class="text-gray mb-1">x<?php echo $orderdetail['sl_mua']; ?></p>
                                          </div>
                                      
                                    
                                        <hr>
                                    
                                   
                                      
                                    </div>
                                </div>

                                <?php } ?>
                                <?php 
                                         if($order['status']==1){
                                            echo ' <p  style="color: #26aa99;" id="successful"> <i class="fa-solid fa-truck"></i> Delivery successful</p>';
                                         }else if($order['status']==0){
                                            echo ' <p  style="color: #26aa99;" id="successful"> <i class="fa-regular fa-circle-check"></i> Confirmed</p>';
                                         }else if($order['status']==2){
                                            echo ' <p  style="color: red;" id="successful"> <i class="fa-solid fa-ban"></i> Delivery cancelled</p>';
                                         }else{
                                            echo '<p  style="color: gray;" id="successful"> <i class="fa-solid fa-hourglass-half"></i> Awaiting processing</p>';
                                         }
                                       
                                    
                                       ?>
                                <p class="mb-0 text-black" id="total-money"><span class="text-black font-weight-bold"> Total:</span> $<?php echo $order['total']; ?>.00
                                        </p>
                                <div class="float-right">
                                            <a class="btn btn-sm btn-outline-primary" href="user-order-info.php?idorder=<?php echo $order['idorder']; ?>&page=<?php echo $page; ?>"><i class="icofont-headphone-alt"></i> DETAIL</a>
                                           
                                        </div>
                            </div>
                        </div>
                        <?php }
                        }else{
                            echo "<div style='margin-top: 20vh; height:50vh;'>
                            <div style='display:flex; justify-content:center; align-items:center; margin-bottom:6px;'>
                            <img src='assets/images/pic/order-empty.png'>
                            </div> 
                            <div><p style='text-align:center;font-size:21px; '>No Orders Yet</p></div>
                            </div>";   
                        }
                        ?>

<?php if (mysqli_num_rows($orders) > 0): ?>
                        <ul class="pagination" id="pagination">
                    <?php
        
            if ($page > 1) {
                echo '<li><a href="?page=' . ($page - 1) . '">Prev</a></li>';
            } else {
                echo '<li class="disabled">Prev</li>';
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li ' . (($i == $page) ? 'class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
            }

            if ($page < $totalPages) {
                echo '<li ><a href="?page=' . ($page + 1) . '">Next</a></li>';
            } else {
                echo '<li class="disabled">Next</li>';
            }
            ?>
                      </ul>
                      <?php endif; ?>


                        <div  id="profile-button" style="display: flex; justify-content: center;margin-top: 50px;margin-bottom: 20px;">
                                        <button type="button" class="btn btn-default" id="button-go-back" onclick="window.location.href='shop.php'"><i class="fa-solid fa-chevron-left"></i> Back To Shop</button>
                                        <button type="button" class="btn btn-primary" style="cursor: not-allowed;background:#94c3f6;border:#94c3f6;" disabled>Save changes</button>&nbsp;
                                       
                                    </div>

                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
</div>
</body>
</html>