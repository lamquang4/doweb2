<?php
require 'config.php';
if (!isset($_GET['customer'])) {
    header('Location: admin-user.php');
    exit(); 
  }
  if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$connection = new Connection();
$username = $_GET['customer'];

 $edit_sql = "SELECT * FROM tb_customer WHERE username='$username'";
$result = mysqli_query($connection->conn, $edit_sql);
$row = mysqli_fetch_assoc($result); 

$userinad = new Userinad();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$searchStatus = isset($_GET['status']) ? $_GET['status'] : null;
$limit = 10;
$start = ($page - 1) * $limit;

    $users = $userinad->selectUsers($start,$limit,$searchStatus);
    $totalUsers = $userinad->getUserCount($searchStatus);
$totalPages = ceil($totalUsers / $limit);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $birthday = $_POST['birthday'];
    $username = $_POST['customer'];
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $statuscur = isset($_GET['status']) ? $_GET['status'] : '';
    
    $checkquery = "SELECT * FROM tb_customer WHERE (email='$email' OR phone='$phone') AND username!='$username'";
    $result = mysqli_query($connection->conn, $checkquery);

if (mysqli_num_rows($result) > 0) {
    
    $_SESSION['fail'] = 'Email or Phone Number has already taken';
        echo "<script> window.location.href='edit-user.php?customer=$username&page={$page}&status={$statuscur}'; </script>";
        exit;
    } else {
        $updatequery = "UPDATE tb_customer SET fullname='$fullname', email='$email', phone='$phone', birthday='$birthday' WHERE username='$username'";
        if (mysqli_query($connection->conn, $updatequery)) {
            $_SESSION['success'] = 'Update Successful';
            echo "<script>window.location.href='edit-user.php?customer=$username&page={$page}&status={$statuscur}'; </script>";
            exit;
        } else {
        
            echo "<script>  window.location.href='edit-user.php?customer=$username&page={$page}&status={$statuscur}'; </script>";
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Customer</title>
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
                            <span class="las la-user-alt" style="color: #fff;"></span>
                            <small style="color: #fff;">Customers</small>
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
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="customer">Customers <?php echo '(' . $totalUsers . ')'; ?></h1>
     
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
                    <table width="100%" id="table-user">
                    <thead>
                            <tr id="select-filter">
                                <th>USERNAME</th>
                                <th> FULL NAME</th>
                                <th> EMAIL</th>       
                                <th> BIRTHDAY</th>
                                <th> ADDRESS</th>  
                                <th onclick="toggleDropdown()" style="position: relative;">STATUS <i class="fa-solid fa-sort-down" style="cursor: pointer; font-size:18px;"></i>
                
                <div id="statusDropdown" class="dropdown-content show">
                <input type="hidden" name="status">
                <a href="admin-user.php">All</a>
<a href="admin-user.php?status=1">Normal</a>
<a href="admin-user.php?status=0">Blocked</a>

</div>
            </th>  
                                <th> ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(mysqli_num_rows($users) > 0) { 
                        while ($user = mysqli_fetch_assoc($users)) { ?>
    <tr>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['fullname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>  <?php 
        if ($user['birthday'] == '0000-00-00') {
            echo 'Unknown';
        } else {
            echo date('d/m/Y', strtotime($user['birthday']));
        }
    ?></td>
        <td><?php echo $user['sonha']; ?> <?php echo $user['duong']; ?> <?php echo $user['city']; ?> <?php echo $user['district']; ?> <?php echo $user['ward']; ?></td>
        <td>
        <?php 
        if ($user['status'] == 1) {
            echo 'Normal';
        } else {
            echo 'Blocked';
        }
    ?>
        </td>
        <td>
            <div class="actions">
            <a href="edit-user.php?customer=<?php echo $user['username'];?>&page=<?php echo $page; ?>"><span class="las la-edit" style="color:#076FFE;"></span></a>
            
            <?php if ($user['status'] == 1) { ?>
        <a onclick="return confirm('Are you sure you want to block this customer?');" href="admin-user.php?action=block&customer=<?php echo $user['username']; ?>&page=<?php echo $page; ?>">
            <span class="las la-lock" style="color: #FFAD27;"></span>
        </a>
    <?php } else { ?>
        <a onclick="return confirm('Are you sure you want to unblock this customer?');" href="admin-user.php?action=unblock&customer=<?php echo $user['username']; ?>&page=<?php echo $page; ?>">
            <span class="las la-unlock" style="color: #FFAD27;"></span>
        </a>
    <?php } ?>
           
            </div>
        </td>
    </tr>
    <?php }
}else{
    echo "
    <tfoot>
    <tr>
    <td colspan='8'>
    <div style='margin-top: 13vh; height:67vh;'>
    <div style='display:flex; justify-content:center; align-items:center;'>
    <img src='assets/images/pic/notfound.png' width='315px' id='product-not-found'>
    </div> 
   
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

<?php if (mysqli_num_rows($users) > 0): ?>
<ul class="pagination" id="pagination">
<?php
      $searchParams = array();
if (isset($_GET['status'])) {
  $searchParams['status'] = $_GET['status'];
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

<div id="container-inputs" style="display: block;">

  <div class="user-tab">
    <h1>Edit Customer</h1>
  <i class="fa-solid fa-xmark" id="closeadd"  onclick="window.location.href='admin-user.php?page=<?php echo $page; ?><?php if(isset($searchStatus)) echo '&status=' . $searchStatus; ?>';"></i>

<form method="post" action=""  onsubmit="return kttrong()">

<input type="hidden" name="page" value="<?php echo htmlspecialchars($page); ?>">

<div class="user-input" style="margin-top: 30px;">  
<label>Username:</label>
<input type="text" name="customer" id="username" value="<?php echo $row['username']?>" readonly style="cursor:not-allowed;">   
             </div>

             <div class="user-input">
                <label>Fullname:</label>
                <input type="text" value="<?php echo $row['fullname']?>" name="fullname" id="fullname" maxlength="30"> 
        </div>

             <div class="user-input" >  
<label>Email:</label>
                <input type="text" value="<?php echo $row['email']?>" name="email" id="email"> 
             </div>

        <div class="user-input">
                <label>Phone:</label>
                <input type="text" value="<?php echo $row['phone']?>" name="phone" id="phone" maxlength="11"> 
        </div>

        <div class="user-input">
                <label>Birthday (m/d/y):</label>
                <input type="date" value="<?php echo $row['birthday']?>" name="birthday" id="birthday"> 
        </div>
     
<div style="text-align: center;" id="button-submit">
  <button type="submit" name="submit">Update</button>
</div>

</form>
                
</div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
const showadd= document.getElementById('showadd');
const containerinputs=document.querySelector('#container-inputs');
const usertab = document.querySelector('.usertab');

function kttrong() {
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var fullname = document.getElementById("fullname").value.trim();
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

      return true
    
}
</script>

<script>
           document.addEventListener('DOMContentLoaded', function() {
    <?php if(isset($_SESSION['success'])): ?>
        swal('Success!', '<?php echo $_SESSION['success']; ?>', 'success');
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['fail'])): ?>
     swal('Fail!', '<?php echo $_SESSION['fail']; ?>', 'error');
     <?php unset($_SESSION['fail']); ?> 
    <?php endif; ?>
});
</script>