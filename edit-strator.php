<?php
require 'config.php';
if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$connection = new Connection();
$username = $_GET['manager'];

 $edit_sql = "SELECT * FROM tb_manager WHERE username='$username'";
$result = mysqli_query($connection->conn, $edit_sql);
$row = mysqli_fetch_assoc($result); 


$adinad = new Adinad();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($page - 1) * $limit;
$ads = $adinad->selectAds($start,$limit);
$totalAds = $adinad ->getAdCount();
$totalPages = ceil($totalAds / $limit);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Administrator</title>
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
                        <a href="admin-strator.php" >
                             <span style="color: #fff;" class="las la-address-card"></span>
                             <small style="color: #fff;">Managers</small>
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
               
            <div class="page-content" >
    
                <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="adminstrator">Managers</h1>
                
    <div >
    <button style="margin-bottom: 8px;" id="showadd" onclick="showadd()"><i class="fa-solid fa-circle-plus" style="margin-right: 4px;"></i>  Add User</button>
                   
    </div>
    </div>
             
            
            <div class="records table-responsive" >
               
                <div class="record-header">  
                    
                    <div class="browse">
                       <input type="search" placeholder="Search" class="record-search">
                     
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
                    <table width="100%" id="table-adminstrator">
                    <thead>
                            <tr id="select-filter">
                            <th> USERNAME</th> 
                            <th> FULLNAME</th>                   
                                <th> EMAIL</th>
                                <th> PHONE</th>
                                <th>STATUS </th>
                                <th> ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ad = mysqli_fetch_assoc($ads)) { ?>
                            <tr>
                                
                            <td>
<?php echo $ad['username']; ?>
</td>   
<td>
<?php echo $ad['fullname']; ?>
</td>                        
<td>
<?php echo $ad['email']; ?>
</td>
<td>
<?php echo $ad['phone']; ?>
</td>

                             
                                <td>
                                    Normal
                                </td>
                                <td>
                                <div class="actions">
                                <a href="edit-strator.php?manager=<?php echo $user['username'];?>&page=<?php echo $page; ?>"><span class="las la-edit" style="color:#076FFE;"></span></a>
                                        <span class="las la-lock" style="color: #FFAD27;"></span>
                                        <span class="las la-undo-alt"></span>
                                       
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
        
    </div>
</body>
</html>

<div id="container-inputs" style="display: block;">

  <div class="user-tab">
    <h1>Add Manager</h1>
  <i class="fa-solid fa-xmark" id="closeadd" onclick="window.location.href='admin-strator.php?page=<?php echo $page; ?>';"></i>

    <form method="post" action="update-strator.php"  onsubmit="return kttrong()">

    <input type="hidden" name="page" value="<?php echo htmlspecialchars($page); ?>">

    <div class="user-input" style="margin-top: 30px;">
                 <label>Username:</label>
                 <input type="text" name="manager" id="username" maxlength="9" value="<?php echo $row['username']?>" readonly style="cursor:not-allowed;">
    
            </div>
       
            <div class="user-input">
                <label>Fullname:</label>
               <input type="text" name="fullname" id="fullname" maxlength="30" value="<?php echo $row['fullname']?>"> 
         </div>

              <div class="user-input">
                <label>Email:</label>
               <input type="text" name="email" id="email" value="<?php echo $row['email']?>"> 
         </div>

         <div class="user-input">
                <label>Phone:</label>
               <input type="text" name="phone" id="phone" maxlength="11" value="<?php echo $row['phone']?>"> 
         </div>

         <div style="text-align: center;" id="button-submit">
  <button type="submit" name="submit">Submit</button>
</div>  

    </form>

</div>
</div>

</html>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




<script>
const showadd= document.getElementById('showadd');
const containerinputs=document.querySelector('#container-inputs');
const usertab = document.querySelector('.usertab');


function kttrong() {
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var fullname = document.getElementById("fullname").value.trim();
    var password = document.getElementById("password").value.trim();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var phoneRegex = /^0[1-9]\d{8,9}$/;
  var fullnameRegex = /^[a-zA-Z\s]+$/; 
  if (!fullnameRegex.test(fullname)) {
        alert("Full name must contain only letters.");
        return false;
    }
    if (!emailRegex.test(email)) {
        alert("Invalid Email.");
        return false;
    }
    if(!phoneRegex.test(phone)){
        alert("Invalid Phone Number.");
        return false;
    }
 
    return true;
}
</script>


