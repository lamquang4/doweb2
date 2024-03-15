<!DOCTYPE html>
<link rel="icon" type="image/png" href="assets/images/pic/logo1.png">
<link rel="stylesheet" href="assets/css/main.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width,  initial-scale=1,maximum-scale=1">
  
</head>
<body>
<?php
include_once 'header.php'
  ?>

  
 <section id="section-login1">
  <div class="container1" id="container1">
   <div class="f-box1">
        <h1 id="tittle">Reset Password</h1>
        <form  action="" id="form">
           <div class="input-group1">
         
   
             <div class="input-field1">
                 <i class="fa-solid fa-envelope"></i>
                 <input  type="text" placeholder="Enter Your Email" id="email">
                 <div class="error"></div>
                </div>
      
         <div id="fpass1">
   <a href="login.php" id="forget">Return to sign in</a></div>
           </div>
          
               <button type="submit" id="submit">Reset</button>
        
   
        </form>
   </div>
   </div>

 </section>
 <?php
include_once 'footer.php'
  ?>

  

   <style>
    .input-field1.success  {
    border-color: #09c372;
}

.input-field1.error  {
    border-color: #ff3860;
}

.input-field1  .error {
    color: #ff3860;
    font-size: 9px;
    height: 13px;
}
   </style>