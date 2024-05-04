<?php
require 'config.php';

if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
$connection = new Connection();
$order = new Order();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : null;
$dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : null;
$orders_result = $order->selectTopOrder($dateStart, $dateEnd);

$usernames = [];
$totals = [];
$colors = ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)'];
$colorIndex = 0;

while ($row = mysqli_fetch_assoc($orders_result)) { 
    $usernames[] = $row['username'];
    $totals[] = $row['total_total'];
    $colorIndex++;
    if ($colorIndex >= count($colors)) {
        $colorIndex = 0;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Statistic</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li >
                       <a href="admin-static.php" >
                            <span class="las la-chart-bar" style="color: #fff;"></span>
                            <small style="color: #fff;">Statistics</small>
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
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Statistics </h1>
          
            <div>
                <form method="GET" id="form-searchdate">
                <label style="margin-right: 4px;">Date from</label>
                <input type="date" name="dateStart" style="margin-right: 10px;">
                <label style="margin-right: 4px;">Date to</label>
                <input type="date" name="dateEnd" style="margin-right: 10px;">
                <button type="submit">Statistics</button>
                </form>
            </div>
        
            <canvas id="myChart" width="300" height="120" ></canvas>
           
        </div>
 
        <div class="records table-responsive" style="margin-bottom: 20px;">
           
            <div class="record-header" style="display: none;">
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
   
                <table width="100%" id="table-static">
                <thead>
                        <tr id="select-filter">
                                                        
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                  <th> TOTAL ALL ORDERS</th>
                      
                          <th>ACTION</th>
                        </tr>
                    </thead>
 
                    <tbody>
                  
                    <?php 
                  
                  foreach ($usernames as $username) {
                    $order_kq = $order->selectOrderWithMaxTotal($username,$dateStart,$dateEnd);
                 
                    while ($order_row = mysqli_fetch_assoc($order_kq)) {
                        ?>
                        <tr>
                       
                            <td><?php echo $order_row['username']; ?></td>
                            <td><?php echo $order_row['email']; ?></td>
                            <td><?php echo $order_row['phone']; ?></td>
                            <td><?php echo $order_row['sonha']; ?> <?php echo $order_row['duong']; ?> <?php echo $order_row['city']; ?> <?php echo $order_row['district']; ?> <?php echo $order_row['ward']; ?></td>
                            <td>$<?php echo $order_row['total_total']; ?>.00</td>
                            <td>
                                <div class="actions">
                                    <a href="admin-order.php?username=<?php echo $order_row['username']; ?>&page=<?php echo $page; ?>&status=1&date_from=<?php echo $dateStart; ?>&date_to=<?php echo $dateEnd; ?>"><span class="las la-external-link-alt" style="color:#076FFE;"></span></a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                    }
                }
                ?>
       
       </tbody> 

      
                    </table>

                  

            </div>
        
        </div> 
        
       

</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



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


</script>
<script>
   
    const usernames = <?php echo json_encode($usernames); ?>;
    const hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = "Gusername"; 
    hiddenInput.value = usernames.join(','); 

    document.getElementById("yourForm").appendChild(hiddenInput); 

</script>
<script>
    const data = {
        labels: <?php echo json_encode($usernames); ?>,
        datasets: [{
            label: 'Total Orders',
            data: <?php echo json_encode($totals); ?>,
            backgroundColor: [
                <?php 
                for ($i = 0; $i < count($usernames); $i++) {
                    echo "'" . $colors[$i % count($colors)] . "',";
                }
                ?>
            ],
            borderColor: [
                <?php 
                for ($i = 0; $i < count($usernames); $i++) {
                    echo "'" . $colors[$i % count($colors)] . "',";
                }
                ?>
            ],
            borderWidth: 1
        }]
    };

    const options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

