<?php
require 'config.php';


if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$userinad = new Userinad();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($page - 1) * $limit;
$users = $userinad->selectUsers($start,$limit);
$totalUsers = $userinad->getUserCount();
$totalPages = ceil($totalUsers / $limit);

$register  = new Register();
if (isset($_POST["submit"])) {
 
  $username = isset($_POST["username"]) ? $_POST["username"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $password2 = isset($_POST["password2"]) ? $_POST["password2"] : "";
  $sonha = isset($_POST["sonha"]) ? $_POST["sonha"] : "";
  $duong = isset($_POST["duong"]) ? $_POST["duong"] : "";
  $quan = isset($_POST["quan"]) ? $_POST["quan"] : "";
  $phuong = isset($_POST["phuong"]) ? $_POST["phuong"] : "";
  $tp = isset($_POST["tp"]) ? $_POST["tp"] : "";
  $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
  $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
  $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
  $imguser = isset($_POST["imguser"]) ? $_POST["imguser"] : "";
  $status = isset($_POST["status"]) ? $_POST["status"] : "";

  $result = $register->registration(
      $username,
      $email,
      $password,
      $password2,
      $sonha,
      $duong,
      $quan,
      $phuong,
      $tp,
      $fullname,
      $phone,
      $birthday,
      $gender,
      $imguser,
      $status
  );

  if ($result == 1) {
      echo "<script> alert('Registration Successful'); window.location.href='admin-user.php';</script>";
  
  } elseif ($result == 10) {
      echo "<script> alert('Username or Email has already taken'); window.location.href='admin-user.php'; </script>";
   
  } elseif ($result == 100) {
      echo "<script> alert('Password does not match'); window.location.href='admin-user.php'; </script>";
   
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin User</title>
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
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="customer">Customers</h1>

       

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
                               
                                <th> STATUS </th>
                                <th> ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)) { ?>
    <tr>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['fullname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['birthday']; ?></td>
        <td></td>
        <td>
        <?php echo $user['status']; ?>
        </td>
        <td>
            <div class="actions">
                <span class="las la-edit" style="color:#076FFE;"></span>
                <span class="las la-lock" style="color: #FFAD27;"></span>
           
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

<div id="container-inputs">

  <div class="user-tab">
    <h1>Add User</h1>
  <i class="fa-solid fa-xmark" id="closeadd" onclick="hideadd()"></i>

<form method="post"  onsubmit="return kttrong()">

<div class="user-input" style="margin-top: 30px;">  
  <label>Username:</label>
<input type="text" name="username" id="username" maxlength="9" required>
             </div>

             <div class="user-input">
                <label>Email:</label>
                <input type="text" name="email" id="email" required> 
        </div>
    

        <div class="user-input">
                <label>Password:</label>
                <input type="password" name="password" id="password" required> 
        </div>

        <div class="user-input">
                <label>Confirm password:</label>
                <input type="password" name="password2" id="password" required> 
        </div>
    
<div style="text-align: center;" id="button-submit">
  <button type="submit" name="submit">Submit</button>
</div>

</form>
                
</div>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




<script>
const showadd= document.getElementById('showadd');
const containerinputs=document.querySelector('#container-inputs');
const usertab = document.querySelector('.usertab');
showadd.onclick=function(){
  containerinputs.style.display="block";
  usertab.style.display="block";
}
function hideadd(){
    var container = document.getElementById('container-inputs');
    var inputs = container.querySelectorAll('input, select, textarea');

    inputs.forEach(function (input) {
        if (input.type !== 'button') {
            input.value = '';
        }
    });
  containerinputs.style.display="none";
  usertab.style.display="none";

}

function kttrong() {
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var password = document.getElementById("password").value.trim();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  var phoneRegex = /^0[1-9]\d{8,9}$/;
    if (!emailRegex.test(email)) {
        alert("Invalid Email.");
        return false;
    }
    if(!phoneRegex.test(phone)){
        alert("Invalid Phone Number.");
        return false;
    }
    if(password.length<6){
      alert('The password must be over 6 characters.');
      return false;
    }
      return true
    
}
</script>




