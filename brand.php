<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["idkh"])){
    $user = $select->selectUserById($_SESSION["idkh"]);
    
  }

?>
<!DOCTYPE html>
<link rel="stylesheet" href="assets/css/main.css">
<link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  <title>Brands</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

  
<section id="product1">
<div>
    <h6>EXPLORE OUR BRANDS</h6>
  
</div>

    <div class="pro-container">
        <div class="pro">
          <a >
            
      <img  src="assets/images/pic/coca.png" id="img1" alt="">
      
      </a>
     
      </div> 
      <div class="pro">
        <a >
        <img src="assets/images/pic/fanta.png" alt=""></a>
     
  </div> 
  <div class="pro">
    <a>
    <img src="assets/images/pic/tea.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/sprite.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/thumb.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/pepsilogo.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/dasani.png" alt=""></a>
 
</div> 
<div class="pro">
    <a >
    <img src="assets/images/pic/aquarius.png" alt=""></a>
 
</div> 
</div> 
   
</section>
<?php
include_once 'footer.php'
  ?>


