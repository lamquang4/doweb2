<?php
require 'config.php';

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
$connection = new Connection();
$order = new Order();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$dateStart = isset($_GET['date_from']) ? $_GET['date_from'] : null;
$dateEnd = isset($_GET['date_to']) ? $_GET['date_to'] : null;
$searchDistrict = isset($_GET['district']) ? $_GET['district'] : null;
$searchWard = isset($_GET['ward']) ? $_GET['ward'] : null;

$limit = 10;
$start = ($page - 1) * $limit;
if (isset($_GET['status']) && ($_GET['status'] === '0' || $_GET['status'] === '1' || $_GET['status'] === '2'|| $_GET['status'] === '3')) {
    $status = $_GET['status'];
    $orders = $order->selectOrdersByStatus($status, $start, $limit); 
    $totalOrders = $order->getOrderCountByStatus($status); 
} else {
   
    $orders = $order->selectOrders($start, $limit,$dateStart,$dateEnd,$searchDistrict,$searchWard);
    $totalOrders = $order->getOrderCount($dateStart,$dateEnd,$searchDistrict,$searchWard);
}
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
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Orders <?php echo '(' . $totalOrders . ')'; ?></h1>
          
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
                            <th style="position: relative;"> ORDER DATE <i style="cursor: pointer;" class="fa-solid fa-sort" onclick="toggleDropdown2()"></i>
                       <div id="datedropdown" class="hide1">
                        <form method="GET" action="admin-order.php">
                            <div id="dropdowninside1">
                            <label>From</label>
                            <input type="date" name="date_from">
                        </div>
                        <div id="dropdowninside1">
                            <label>To</label>
                            <input type="date" name="date_to">
                        </div>
                        <div id="button-content">
    <button type="submit">Submit</button>
   </div>
   </form>
                       </div>
                        
                        </th>
                            <th style="position: relative;"> DELIVERY ADDRESS <i style="cursor: pointer;" class="fa-solid fa-sort" onclick="toggleDropdown1()"></i>
                            <div id="addressdropdown" class="hidden">
                            <form method="GET" action="admin-order.php">
                            <div id="dropdowninside">
    <label>Districs</label>
    <select name="district">
        <option value="0">Select District</option>
        <option value="District 1">District 1</option>
        <option value="District 2">District 2</option>
        <option value="District 3">District 3</option>
        <option value="District 4">District 4</option>
        <option value="District 5">District 5</option>
        <option value="District 6">District 6</option>
    </select>
   </div>
   <div id="dropdowninside">
    <label>Ward</label>
    <select name="ward">
    <option value="0">Select Ward</option>
        <option value="Ward 1">Ward 1</option>
        <option value="Ward 2">Ward 2</option>
        <option value="Ward 3">Ward 3</option>
        <option value="Ward 4">Ward 4</option>
        <option value="Ward 5">Ward 5</option>
        <option value="Ward 6">Ward 6</option>
    </select>
   </div>
   <div id="button-content">
    <button type="submit">Submit</button>
   </div>
        </form>
   
</div>
                            </th>
                            <th  style="position: relative;">STATUS <i style="cursor: pointer;" class="fa-solid fa-sort" onclick="toggleDropdown()"></i>
                
                            <div id="statusDropdown" class="dropdown-content show">
                            <a href="admin-order.php">All</a>
    <a href="admin-order.php?status=0">Confirm</a>
    <a href="admin-order.php?status=1">Successful</a>
    <a href="admin-order.php?status=2">Cancel</a>
    <a href="admin-order.php?status=3">Waiting</a>
</div>
                        </th>    
                    
                            <th> ACTION</th>
                          
                        </tr>
                    </thead>
 
                    <tbody>
                  
                    <?php 
                          if(mysqli_num_rows($orders) > 0) {  
                        while ($order = mysqli_fetch_assoc($orders)) { ?>
    <tr>
        <td><?php echo $order['idorder']; ?></td>
        <td><?php echo $order['username']; ?></td>
        <td><?php echo $order['dateorder']; ?></td>
        <td><?php echo $order['sonha']; ?> <?php echo $order['duong']; ?> <?php echo $order['city']; ?> <?php echo $order['district']; ?> <?php echo $order['ward']; ?></td>
                              <td>
                              <select id="select-status-order" class="select-status-order" onchange="checkStatus(this)" name="status">
                                <option value="3">Select status</option>
                                <option value="0" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 0) ? 'selected' : ''; ?>>Confirm</option>
                                <option value="1" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 1) ? 'selected' : ''; ?>>Successful</option>
                                <option value="2" data-order-id="<?php echo $order['idorder']; ?>" <?php echo ($order['status'] == 2) ? 'selected' : ''; ?>>Cancel</option> 
                              </select>
                              </td>
                              <td>
                              <div class="actions">
<a href="order-detail-admin.php?idorder=<?php echo $order['idorder']; ?>&page=<?php echo $page; ?><?php if(isset($status)) echo '&status=' . $status; ?>"><span class="las la-external-link-alt" style="color:#076FFE;"></span></a>
                    </div>
                              </td>
     
       
    </tr>
  
<?php }
}else{
    echo "
    <tfoot>
    <tr>
    <td colspan='6'>
    <div style='margin-top: 20vh; height:54vh;'>
    <div style='display:flex; justify-content:center; align-items:center; margin-bottom:6px;'>
    <img src='assets/images/pic/order-empty.png'>
    </div> 
    <div><p style='text-align:center;font-size:21px;'>No Orders Yet</p></div>
    </div>
    </td>
    </tr>
    </tfoot>
    ";   
}
?>
       
       </tbody>         
                    </table>

                    
                    <?php if (mysqli_num_rows($orders) > 0): ?>
<ul class="pagination" id="pagination">
<?php
      $searchParams = array();
if (isset($_GET['status'])) {
  $searchParams['status'] = $_GET['status'];
}  
if (isset($_GET['date_from'])) {
    $searchParams['date_from'] = $_GET['date_from'];
}

if (isset($_GET['date_to'])) {
    $searchParams['date_to'] = $_GET['date_to'];
}
if (isset($_GET['district'])) {
    $searchParams['district'] = $_GET['district'];
}
if (isset($_GET['ward'])) {
    $searchParams['ward'] = $_GET['ward'];
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

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.select-status-order').on('change', function(){ 
        var status = $(this).val();
        var orderId = $(this).find('option:selected').data('order-id');

        $.ajax({
            url: 'update-status-order.php',
            type: 'POST',
            data: {status: status, orderId: orderId},
            success: function(response){
                if (response === "shortage") {
                    alert("This order doesn't have enough items in stock.");
                    window.location.href='admin-order.php';
                } else {
                    console.log(response);
                }
            }
        });
    });
});



</script>


<script>
    function checkStatus(select) {
        var status = select.value;
        var options = select.options;
        for (var i = 0; i < options.length; i++) {
            options[i].disabled = false;
        }
        if (status == 0) {
       
            options[0].disabled = true;
            options[1].disabled = false;
            options[2].disabled = false;
            options[3].disabled = false;
        } else if (status == 1) {
            options[0].disabled = true;
            options[1].disabled = true;
            options[3].disabled = true;
        } else if (status == 2) {
            options[0].disabled = true;
            options[1].disabled = true;
            options[2].disabled = true;
        } else if (status == 3) {
        
            options[0].disabled = false;
            options[1].disabled = false;
            options[2].disabled = true;
            options[3].disabled = false;
       
        }
    }

    document.querySelectorAll('.select-status-order').forEach(function(select) {
    checkStatus(select);
});

function toggleDropdown2() {
    var dropdown2 = document.getElementById("datedropdown");
    dropdown2.classList.toggle("hide1");
}
function toggleDropdown1() {
    var dropdown = document.getElementById("addressdropdown");
    dropdown.classList.toggle("hidden");
}
function toggleDropdown() {
    var dropdown1 = document.getElementById("statusDropdown");
    dropdown1.classList.toggle("show");
    
}
</script>


