<!DOCTYPE html>
<link rel="icon" type="image/png" href="assets/images/pic/logo.png">
<link rel="stylesheet" href="assets/css/main.css">
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
   <div class="popup" id="popup">
    <img src="assets/images/pic/404-tick.png">
    <h2>Thank you!</h2>
    <p>Mail has been sent</p>
    <button type="button" onclick="closePopup()">OK</button>
         </div>
 </section>
 <?php
include_once 'footer.php'
  ?>
 <script>
  const bar = document.getElementById('bar');
  const icon = document.getElementById('icons');
  
  if(bar){
    bar.addEventListener('click',() =>{
  icon.classList.add('active');
    })}
 
  
  const icons = document.getElementById("icons");
const dong = document.getElementById("close");
const barmenu = document.getElementById('bar');
dong.addEventListener("click", function() {
 
  icons.style.right = "-300px";
});
barmenu.addEventListener("click", function() {
  icons.style.right = "0px";
});
const popup=document.getElementById("popup");
function closePopup(){
  popup.classList.remove("open-popup");

}
window.addEventListener("resize", function() {

if (window.innerWidth >= 1138) {
  icons.classList.remove('active');
}
else{
    icons.style.right="-300px";
   }
}
);

   </script>
  

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