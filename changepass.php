<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
    
  }else{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9,maximum-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/user.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   
   <!DOCTYPE html>
   <html lang="en">
   
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=0.9,maximum-scale=1">
       <title>Change Password</title>
       <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     
       <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
       <link rel="stylesheet" href="assets/css/history.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   
   <body>

       <div class="container">
           <div class="row">
               <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;">
                   <div class="osahan-account-page-left  bg-white h-100">
                       <div class="border-bottom p-4">
                        <div style="display: flex; justify-content: center;"  id="logo-history">
                            <img src="assets/images/pic/logo.png" width="52%" style="cursor: pointer;" onclick="window.location.href='index.php' " id="logo-history">
                        </div>
                                        
                       </div>
                     
                  
                           <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="user.php">Profile</a>
                           <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="history.php">Purchase order</a>
       
                       <a class="list-group-item list-group-item-action active" data-toggle="list"
                           href="changepass.php">Change password</a>
                    
                       
                      
                   </div>
                   
               </div>
               <div class="col-md-9" style="border: 1px solid #DFDFDF;">
                   <div class="osahan-account-page-right bg-white p-2 h-100">
                       <div class="tab-content" id="myTabContent">
                        <div class="col-md-9">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                   </div>
                   
               </div>
               <div class="text-right mt-3" id="profile-button">
                <button type="button" class="btn btn-default" onclick="window.location.href='shop.php'">Back</button>
                <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
               
            </div>
        
           
            </div>
           
       </div>
   </body>
   
   </html>
   
   
   
</body>

</html>




