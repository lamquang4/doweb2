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
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $connection->conn->real_escape_string($_POST["username"]);
    $email = $connection->conn->real_escape_string(trim($_POST["email"]));
    $fullname = $connection->conn->real_escape_string(trim($_POST["fullname"]));
    $phone = $connection->conn->real_escape_string(trim($_POST["phone"]));
    $birthday = $connection->conn->real_escape_string($_POST["birthday"]);
    $gender = $connection->conn->real_escape_string(isset($_POST["gender"]) ? $_POST["gender"] : '');
$city = $connection->conn->real_escape_string($_POST["city"]);
    $district = $connection->conn->real_escape_string($_POST["district"]);
    $ward = $connection->conn->real_escape_string($_POST["ward"]);
    $duong = $connection->conn->real_escape_string(trim($_POST["duong"]));
    $sonha = $connection->conn->real_escape_string(trim($_POST["sonha"]));

    if (isset($_FILES['userImage']) && $_FILES['userImage']['size'] > 0) {
        $file = $_FILES['userImage'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName = $username . '.' . $fileExtension;
        $filePath = 'imguser/' . $fileName;

        $allowedExtensions = array('png');
        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['fail'] = 'Invalid file type. Please upload a PNG file';
            echo "<script> window.location.href='user.php';</script>";
            exit;
        }

        $maxFileSize = 300 * 1024;
    if ($file['size'] > $maxFileSize) {
        $_SESSION['fail'] = 'File size exceeds the maximum allowed size of 300 KB';
        echo "<script> window.location.href='user.php';</script>";
        exit;
    }
    
        $maxWidth = 700;
        $maxHeight = 700;
        list($width, $height) = getimagesize($file['tmp_name']);
        if ($width > $maxWidth || $height > $maxHeight) {
            $_SESSION['fail'] = 'Image dimensions exceed the maximum allowed size of 700x700';
            echo "<script> window.location.href='user.php';</script>";
            exit;
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $updateImagePathQuery = "UPDATE tb_customer SET imguser='$filePath' WHERE username='$username'";
            $resultImagePath = mysqli_query($connection->conn, $updateImagePathQuery);
            if (!$resultImagePath) {
                die('Error updating user image path: ' . mysqli_error($connection->conn));
            }
        } else {
            echo "<script> window.location.href='user.php';</script>";
            exit;
        }
    }

    $checkquery = "SELECT * FROM tb_customer WHERE (email='$email' OR phone='$phone') AND username!='$username'";
    $result = mysqli_query($connection->conn, $checkquery);

    if (mysqli_num_rows($result) > 0) {
    
        $_SESSION['fail'] = 'Email or Phone Number has already taken';
        echo "<script> window.location.href='user.php';</script>";
            exit;
        } else {
            $updatequery = "UPDATE tb_customer SET email='$email', fullname='$fullname', phone='$phone', birthday='$birthday', gender='$gender', city='$city', ward='$ward', district='$district', sonha='$sonha', duong='$duong' WHERE username='$username'";
            if (mysqli_query($connection->conn, $updatequery)) {
                $_SESSION['success'] = 'Update Successful';
                echo "<script> window.location.href='user.php';</script>";
                exit;
            } else {
            
                echo "<script> window.location.href='user.php';</script>";
                exit;
            }
        }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Profile</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logoicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/main.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
include_once 'header.php'
  ?>

<div class="containerz" style="margin-top: 50px; margin-bottom:50px;">
           <div class="row">
               <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;">
                   <div class="osahan-account-page-left bg-white h-100" >    

                           <a class="list-group-item list-group-item-action active" data-toggle="list"
                           href="user.php">Profile</a>
                           <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="history.php">Purchase order</a>
                       <a class="list-group-item list-group-item-action" data-toggle="list"
                           href="changepass.php">Change password</a>
      
                   </div>
               </div>
               <div class="col-md-9" style="border: 1px solid #DFDFDF;padding-left: 0px; padding-right: 0px;z-index:50">
                   <div class="osahan-account-page-right bg-white p-2 h-100">
                       <div class="tab-content" id="myTabContent">
                        <div class="col-md-11" style="padding-left: 0; padding-right: 0; margin:0 auto;">
                            <div class="card-body pb-2">
                                <div class="tab-pane fade show" id="account-general">
                                    <form method="post" action="" enctype="multipart/form-data" onsubmit="return kttrong()"> 
                                    <div class="card-body media align-items-center">
                                    <img src="<?php echo $user['imguser']; ?>" alt class="d-block ui-w-80" id="userImage">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Select photo
                                                <input type="file" class="account-settings-fileinput" onchange="previewImage()" id="imageInput" accept="image/png" name="userImage">
                                    </label> &nbsp;       
 
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                              
                                    <div class="card-body">
                             
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" id="username" name="username" maxlength="9" readonly class="form-control mb-1" value="<?php echo $user['username']; ?>">
                                        </div>
                              
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" id="fullname" name="fullname" maxlength="30" class="form-control" value="<?php echo $user['fullname']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" maxlength="50" id="email" value="<?php echo $user['email']; ?>" required>
                                        
                                        </div>
                               
                                        <div class="form-group">
                                            <label class="form-label">Sex</label>
                                            <input id="male" style="margin-left: 10px;" type="radio" name="gender" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?>> Male
    <input id="female" style="margin-left: 10px;" type="radio" name="gender" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?>> Female
                                        </div>
                                        
                                        <div class="row" style="margin-bottom: 12px;">
                                            <div class="col-lg-4">
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label">Birthday (mm/dd/yy)</label>
                                                    <input type="date" name="birthday" class="form-control" value="<?php echo $user['birthday']; ?>" id="dateInput" >
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4">
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" name="phone" maxlength="11" class="form-control" value="<?php echo $user['phone']; ?>" id="phone" required>
                                                </div>
                                            </div>
                  
                                        </div>
                                      

<div>   <label style="font-size: 22px; font-weight:bold;">Address:</label></div>
                                        <div class="row" style="margin-bottom: 10px;">
                                     
                                            <div class="col-lg">
                                                <div class="mb-3 mb-lg-0">
                                                <label class="form-label">House Number</label>
                                                    <input type="text" name="sonha" id="sonha"  class="form-control" placeholder="House number" value="<?php echo $user['sonha']; ?>" required>
                                                </div>
                                            </div>
                
                                            <div class="col-lg">
                                                <div class="mb-2 mb-lg-0">
                                                    <label class="form-label">Street</label>
                                                    <input type="text" name="duong" id="duong" class="form-control" placeholder="Street" value="<?php echo $user['duong']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row" style="margin-bottom: 10px;">
                                     
                                     <div class="col-lg">
                                         <div class="mb-2 mb-lg-0">
                                         <label class="form-label">City</label>
                                         <select class="form-control" name="city" id="city" aria-label=".form-select-sm">
<option value="0" selected>Select City</option> 

   </select>
                                         </div>
                                     </div>
   
                                 </div>
                                        
                                 <div class="row" style="margin-bottom: 5px;">
                                     
                                     <div class="col-lg">
                                         <div class="mb-3 mb-lg-0">
                                         <label class="form-label">District</label>
                                         <select class="form-control" id="district" name="district" aria-label=".form-select-sm" >
                                  <option value="0">Select District</option>
                                  
                                     </select>
                                         </div>
                                     </div>
   
                                     <div class="col-lg">
                                         <div class="mb-3 mb-lg-0">
                                         <label class="form-label">Ward</label>
                                         <select  class="form-control" id="ward" name="ward" aria-label=".form-select-sm" >
                    <option value="0" selected>Select Ward</option>

                                       </select>
                                         </div>
                                     </div>
                                 </div>    
                                        <div  id="profile-button" style="display: flex; justify-content: center;margin-top: 50px;margin-bottom: 20px;">
                                        <button type="button" class="btn btn-default" id="button-go-back" onclick="window.location.href='shop.php'"> Back to shop</button>
                                        <button class="btn btn-primary" id="saveChangesBtn" name="submit" type="submit">Save changes</button>&nbsp;          
                                    </div>
                                    </form>
                                    </div>
                             
                            </div>
                        </div>
                  
                       </div>
             
                   </div>
               </div>
        
           </div>
           
       </div>
       </div>
</body>
<?php
include_once 'footer.php'
  ?>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
function previewImage() {
    var input = document.getElementById('imageInput');
    var image = document.getElementById('userImage');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
    function kttrong() {
        var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var fullname = document.getElementById("fullname").value.trim();
    var sonha = document.getElementById("sonha").value.trim();
    var duong = document.getElementById("duong").value.trim();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  var phoneRegex = /^0[1-9]\d{8,9}$/;
  var fullnameRegex = /^[a-zA-Z\s]+$/;
  var addressRegex = /^[a-zA-Z0-9\s\/]+$/;
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
    if(!addressRegex.test(sonha) || !addressRegex.test(duong)){
        alert("Invalid Address.");
        return false;
    }
        var city = document.getElementById('city').value;
        if (city === "0") {
            alert("Please select a city");
            return false;
        }


        var district = document.getElementById('district').value;
        if (district === "0") {
            alert("Please select a district"); 
            return false;
        }

        var ward = document.getElementById('ward').value;
        if (ward === "0") {
            alert("Please select a ward");  
            return false;
        }

        return true;
       
    }
</script>

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
           document.addEventListener('DOMContentLoaded', function() {
    <?php if(isset($_SESSION['success'])): ?>
        swal('Success!', '<?php echo $_SESSION['success']; ?>', 'success');
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['fail'])): ?>
     swal('Fail!', '<?php echo $_SESSION['fail']; ?>', 'error');
     <?php unset($_SESSION['fail']); ?> 
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
     swal('Warning!', '<?php echo $_SESSION['error']; ?>', 'warning');
     <?php unset($_SESSION['error']); ?> 
    <?php endif; ?>
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");

        var selectedCity = "<?php echo $user['city']; ?>";
        var selectedDistrict = "<?php echo $user['district']; ?>";
        var selectedWard = "<?php echo $user['ward']; ?>";

        var Parameter = {
            url: "https://raw.githubusercontent.com/lamquang4/doweb2/main/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
            citis.value = selectedCity;
            citis.dispatchEvent(new Event('change'));
            districts.value = selectedDistrict;
            districts.dispatchEvent(new Event('change'));
            wards.value = selectedWard;
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                districts.length = 1;
                wards.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            districts.onchange = function () {
                wards.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>
