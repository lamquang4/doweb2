<?php
require 'config.php';

$select = new Select();
$connection = new Connection();
if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
    
  }else{
    header("Location: login.php");
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
exit();
}

if (isset($_POST["submit"])) {
    $username = $user['username'];
    $password = $user['password'];
    $currentpass = md5($_POST['currentpass']);
    $newpass = $_POST['newpass'];
    $connewpass = $_POST['connewpass'];

    if ($password == $currentpass && $newpass == $connewpass) {
        $hashed_newpass = md5($newpass); 
        $stmt = $connection->conn->prepare("UPDATE tb_customer SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_newpass, $username);
        $result = $stmt->execute();

        if ($result) {
           
        } 
    } else {
        echo "<script>alert('Current password is incorrect or new passwords do not match.'); window.location.href='changepass.php';</script>";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9,maximum-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/main.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
include_once 'header.php'
  ?>
   
<div class="containerz" style="margin-top: 50px; margin-bottom:50px;">
           <div class="row">
               <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;">
                   <div class="osahan-account-page-left  bg-white h-100">
                    
                           <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="user.php">Profile</a>
                           <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="history.php">Purchase order</a>
                       <a class="list-group-item list-group-item-action active" data-toggle="list"
                           href="changepass.php">Change password</a>
                     
                   </div>
                   
               </div>
               <div class="col-md-9" style="border: 1px solid #DFDFDF;padding-left: 0px; padding-right: 0px;">
                   <div class="osahan-account-page-right bg-white p-2 h-100">
                       <div class="tab-content" id="myTabContent">
                        <div class="col-md-9" style="padding-left: 0px; padding-right: 0px; margin:0 auto;">
                            <div class="card-body pb-2">
                                <form action="" method="post" onsubmit="return kttrong()">
<div style="margin-top:10px; margin-bottom:25px;">
    <h4 class="font-weight-bold">Change Password</h4>
</div>
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" name="currentpass" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" id="newpass" name="newpass" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm new password</label>
                                    <input type="password" id="connewpass" name="connewpass" class="form-control" required>
                                </div>

                                <div  id="profile-button" style="display: flex; justify-content: center;margin-top: 50px;margin-bottom: 20px;">
                                        <button type="button" class="btn btn-default" id="button-go-back" onclick="window.location.href='shop.php#product11'"><i class="fa-solid fa-chevron-left"></i> Back To Shop</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>&nbsp;  
                                    </div>
                                    </form>
                            </div>
                        </div>
                
                   </div>
                   
               </div>
      
        
           
            </div>
           
       </div>
       </div>
       <?php
include_once 'footer.php'
  ?>
</body>

</html>

<style>
    a{
        text-decoration: none;
    }
    a:hover{
        color: #878a99;
        text-decoration: none;
    }
    ul{
        padding-left: 0;
    }
    img{
        vertical-align:0;
    }
    hr{
        opacity: 1;
        border: 0.2px solid white !important;
color: white;
        margin: 0;
    }
    h1,h2,p,ul{
        margin-bottom: 0;
        line-height: normal;
    }
    a{
        margin: 0;
    }
    input{
        font-size: 16px;
        line-height: normal;
     font-size: small;
    }
    svg{
        vertical-align:unset;
    }
    h2{
        font-weight: 550;
    }

 </style>

 <script>
    function kttrong(){
const newpass = document.getElementById('newpass').value;
const connewpass = document.getElementById('connewpass').value;
if(newpass !== connewpass){
alert("New password and Confirm New password don't match ");
return false;
}
return true;
    }
 </script>
 