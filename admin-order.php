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
$searchCity = isset($_GET['city']) ? $_GET['city'] : null;
$searchUsername = isset($_GET['username']) ? $_GET['username'] : null;
$searchStatus = isset($_GET['status']) ? $_GET['status'] : null;
$limit = 10;
$start = ($page - 1) * $limit; 
    $orders = $order->selectOrders($start, $limit,$dateStart,$dateEnd,$searchDistrict,$searchWard,$searchCity,$searchUsername,$searchStatus);
    $totalOrders = $order->getOrderCount($dateStart,$dateEnd,$searchDistrict,$searchWard,$searchCity,$searchUsername,$searchStatus);

$totalPages = ceil($totalOrders / $limit);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Order</title>
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
        <div class="page-content" style="margin-top: 50px;">
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Orders <?php echo '(' . $totalOrders . ')'; ?></h1>
          
        </div>
        
        <div class="records table-responsive" >
           
            <div class="record-header">
              <div class="browse">
                <input type="search" placeholder="Search (username)" class="record-search">
              
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
            <input type="hidden" name="username">
                <table width="100%" id="table-order">
                <thead>
                        <tr id="select-filter">
                            <th>ID ORDER</th>                                          
                            <th>USERNAME</th>
                            <th style="position: relative;"> <span style="cursor: pointer; padding:11px 0;" onmouseover="toggleDropdown2()" onmouseout="toggleDropdown2()"> ORDER DATE <i style="cursor: pointer; font-size:18px;" class="fa-solid fa-sort-down"></i>
                       <div id="datedropdown" class="hide1">
                        <form method="GET" action="admin-order.php">
                        <input type="hidden" name="status" value="<?php if(isset($searchStatus)) echo $searchStatus; ?>">
                        <input type="hidden" name="district" value="<?php if(isset($searchDistrict)) echo $searchDistrict; ?>">
                        <input type="hidden" name="ward" value="<?php if(isset($searchWard)) echo $searchWard; ?>">
                        <input type="hidden" name="city" value="<?php if(isset($searchCity)) echo $searchCity; ?>">
                        <input type="hidden" name="username" value="<?php if(isset($searchUsername)) echo $searchUsername; ?>">
                            <div id="dropdowninside1">
                            <label>From</label>
                            <input type="date" name="date_from">
                        </div>
                        <div id="dropdowninside1">
                            <label>To</label>
                            <input type="date" name="date_to">
                        </div>
                     
                        <div id="button-content">
    <button type="submit">Filter</button>
   </div>
   </form>
                       </div>
                        </span>
                        </th>
                            <th style="position: relative;"> <span style="cursor: pointer; padding:11px 0;" onmouseover="toggleDropdown1()" onmouseout="toggleDropdown1()">DELIVERY ADDRESS <i style="cursor: pointer; font-size:18px;" class="fa-solid fa-sort-down"></i>
                            <div id="addressdropdown" class="hidden">
                            <form method="GET" action="admin-order.php">
                            <div id="dropdowninside">
    <label>City</label>
    <select name="city" id="city">
    <option value="0">Select City</option>

    </select>
   </div>
                            <div id="dropdowninside">
                            <input type="hidden" name="status" value="<?php if(isset($searchStatus)) echo $searchStatus; ?>">
                            <input type="hidden" name="date_from" value="<?php if(isset($dateStart)) echo $dateStart; ?>">
                            <input type="hidden" name="date_to" value="<?php if(isset($dateEnd)) echo $dateEnd; ?>">
                            <input type="hidden" name="username" value="<?php if(isset($searchUsername)) echo $searchUsername; ?>">
    <label>Districs</label>
    <select name="district" id="district">
        <option value="0">Select District</option>

    </select>
   </div>
   <div id="dropdowninside">
    <label>Ward</label>
    <select name="ward" id="ward">
    <option value="0">Select Ward</option>

    </select>
   </div>
   <div id="button-content">
    <button type="submit">Filter</button>
   </div>
        </form>
   
</div>
</span>
                            </th>
                            <th  style="position: relative;"><span style="cursor:pointer; padding:11px 0;" onmouseover="toggleDropdown()" onmouseout="toggleDropdown()">STATUS <i style="cursor: pointer; font-size:18px;" class="fa-solid fa-sort-down"></i>
                
                            <div id="statusDropdown" class="dropdown-content show">
                            <a href="admin-order.php?status=<?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?>">All</a>
                            <input type="hidden" name="status">
    <a href="admin-order.php?status=0<?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?>">Confirm</a>
    <a href="admin-order.php?status=1<?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?>">Successful</a>
    <a href="admin-order.php?status=2<?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?>">Cancel</a>
    <a href="admin-order.php?status=3<?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?>">Waiting</a>
</div>
</span>
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
        <td><?php echo date('d/m/Y', strtotime($order['dateorder'])); ?></td>
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
<a href="order-detail-admin.php?idorder=<?php echo $order['idorder']; ?>&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?>"><span class="las la-external-link-alt" style="color:#076FFE;"></span></a>
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


            </div>
        
        </div> 

</main>

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
if (isset($_GET['city'])) {
    $searchParams['city'] = $_GET['city'];
}
if (isset($_GET['username'])) {
    $searchParams['username'] = $_GET['username'];
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

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.select-status-order').on('change', function(){ 
        var confirmation = confirm('Are you sure you want to change the status of this order?');
        if (confirmation) {
            var status = $(this).val();
            var orderId = $(this).find('option:selected').data('order-id');

            $.ajax({
                url: 'update-status-order.php',
                type: 'POST',
                data: {status: status, orderId: orderId},
                success: function(response){
                    window.location.href='admin-order.php?page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($searchUsername)) echo '&username=' . $searchUsername; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?>';
                }
            });
        } else {
            window.location.reload();
        }
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

<script>
document.querySelector('.record-search').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        var searchUsername = this.value.trim();
        window.location.href = 'admin-order.php?username=' + encodeURIComponent(searchUsername) + '&page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?><?php if(isset($searchDistrict)) echo '&district=' . $searchDistrict; ?><?php if(isset($searchWard)) echo '&ward=' . $searchWard; ?><?php if(isset($searchCity)) echo '&city=' . $searchCity; ?><?php if(isset($dateStart)) echo '&date_from=' . $dateStart; ?><?php if(isset($dateEnd)) echo '&date_to=' . $dateEnd; ?>';
    }
});
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
 
<script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");

        var Parameter = {
            url: "https://raw.githubusercontent.com/lamquang4/car/main/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
            citis.dispatchEvent(new Event('change'));
            districts.dispatchEvent(new Event('change'));
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                districts.length = 1;
                wards.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            districts.onchange = function () {
                wards.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>