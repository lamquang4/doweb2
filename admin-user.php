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



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin User</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
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
                             <small>Administrator</small>
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
                       <input type="search" placeholder="Search (#ID)" class="record-search">
                     
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
                                <th>ID USER</th>
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
        <td>#USER<?php echo $user['id']; ?></td>
        <td><?php echo $user['fullname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['birthday']; ?></td>
        <td><?php echo $user['diachi']; ?></td>
        <td>
        <?php echo $user['status']; ?>
        </td>
        <td>
            <div class="actions">
                <span class="las la-edit"></span>
                <span class="las la-lock"></span>
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
    <h1>ADD USER</h1>
  <i class="fa-solid fa-xmark" id="closeadd" onclick="hideadd()"></i>

                <div class="user-input" style="margin-top: 32px;">
                <label> ID USER:</label>
                    <input type="text" name="id-user" id="id-user" > 
                     
                </div>

                <div class="user-input">  
                    <label>Full Name:</label>
<input type="text" name="fname" id="fname">
             </div>

             <div class="user-input">
                <label>Email:</label>
                <input type="text" name="email" id="email"> 
        </div>
    
          <div class="user-input">
            <label>Birthday:</label>
          <input type="date" name="birth" id="birth">

     </div>
               <div class="user-input">
                <label>Address:</label>
                   <input type="text" name="address" id="address">

               </div>
          
         <div class="user-input" style="display: none;">
            Status:<input type="text" name="status" id="status" ></input>
          </div>

          <div class="user-input" style="display: none;">
            Action:<input type="text" name="action" id="action">    
      </div>

<div style="text-align: center;" id="button-submit">
  <button>Submit</button>
 
</div>

</div>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
      window.addEventListener("DOMContentLoaded", function() {
        var predefinedContent = 'Normal';
        document.getElementById("status").value = predefinedContent;
      });
      window.addEventListener("DOMContentLoaded", function() {
        var predefinedContent = '  <div class="actions"><span class="lab la-telegram-plane"></span><span class="las la-edit"></span><span class="las la-trash"></span></div>';
        document.getElementById("action").value = predefinedContent;
      });
    
       
        
    </script>

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
</script>




