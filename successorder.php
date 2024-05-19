<?php
require 'config.php';
$select = new Select();

if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
} else {
    header("Location: login.php");
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['order_id']) || !isset($_SESSION['dateorder'])) {
    header("Location: shop.php");
    exit();
}
$idorder = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
$dateorder = isset($_SESSION['dateorder']) ? $_SESSION['dateorder'] : '';


unset($_SESSION['order_id']);
unset($_SESSION['dateorder']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
 <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
<link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>
<body>
<?php
include_once 'header.php'
  ?>

<section style="margin-top: 160px; margin-bottom:60px;display:flex;justify-content:center;">
<div style=" margin:0 auto;">
  <div >
    <div style="display: flex; justify-content:center; align-items:center;margin-bottom:10px;">
     <img src="assets/images/pic/404-tick.png" width="100">    
    </div>

<h1 style="text-align: center;margin-bottom:15px;color:#6FD649;font-size:24px;">Order Successfully!</h1>
</div>
<div style=" margin:0 auto; background:#FAFAFA;"> 
    <h1 style="text-align: center;margin-bottom:15px;font-size:20px">Thank you. Your order has been received.</h1>
    <div style="margin: 0 20px;text-align:center">
    <p style="margin-bottom:10px;font-size:18px;"><?php echo htmlspecialchars($dateorder); ?></p>
      <p style="font-size:22px;"><?php echo htmlspecialchars($idorder); ?></p>
 
 
    </div>
   
</div>  
</div>

</section>

<?php
include_once 'footer.php'
  ?>
</body>
</html>