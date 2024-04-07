<?php
require 'config.php';

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
$connection = new Connection();
$order = new Order();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($page - 1) * $limit;
$orders = $order->selectOrders($start,$limit);
$totalOrders = $order->getOrderCount();
$totalPages = ceil($totalOrders / $limit);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Order</title>
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
                            <span class="las la-clipboard-list"></span>
                            <small>Products</small>
                        </a>
                    </li>
                    <li >
                       <a href="admin-order.php" >
                            <span class="las la-shopping-cart" style="color: #fff;"></span>
                            <small style="color: #fff;">Orders</small>
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
        <div class="page-content" style="margin-top: 50px;">
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Orders</h1>
          
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
                <table width="100%" id="table-order">
                <thead>
                        <tr id="select-filter">
                            <th>ID ORDER</th>                                          
                            <th>USERNAME</th>
                            <th> ORDER DATE </th>
                            <th> DELIVERY ADDRESS </th>
                            <th>STATUS </th>
                            <th> ACTION</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php while ($order = mysqli_fetch_assoc($orders)) { ?>
    <tr>
        <td><?php echo $order['idorder']; ?></td>
        <td><?php echo $order['username']; ?></td>
        <td><?php echo $order['dateorder']; ?></td>
        <td><?php echo $order['sonha']; ?> <?php echo $order['duong']; ?> <?php echo $order['city']; ?> <?php echo $order['district']; ?> <?php echo $order['ward']; ?></td>
                              <td>
                              <select id="select-status-order" class="select-status-order">
                                <option value="">Select status</option>
                                <option value="0" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 0) ? 'selected' : ''; ?>>Confirm</option>
                                <option value="1" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 1) ? 'selected' : ''; ?>>Successful</option>
                                <option value="2" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 2) ? 'selected' : ''; ?>>Cancel</option> 
                              </select>
                              </td>
                              <td>
                              <div class="actions">
<a href="order-detail-admin.php?idorder=<?php echo $order['idorder']; ?>"><span class="las la-external-link-alt" style="color:#076FFE;"></span></a>
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
                echo '<li ' . (($i == $page) ? 'class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
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

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.select-status-order').on('change', function(){ // Sử dụng class thay vì id
        var status = $(this).val();
        var orderId = $(this).find('option:selected').data('order-id');

        $.ajax({
            url: 'update-status-order.php',
            type: 'POST',
            data: {status: status, orderId: orderId},
            success: function(response){
                console.log(response);
            }
        });
    });
});
</script>

 

