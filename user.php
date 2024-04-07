<?php
require 'config.php';

$select = new Select();
if(isset($_SESSION["username"])){
    $user = $select->selectUserById($_SESSION["username"]);
    
  }else{
    header("Location: login.php");
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
exit();
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


<div class="containerz" >
           <div class="row">
               <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;">
                   <div class="osahan-account-page-left bg-white h-100" >
                       <div class="border-bottom p-4" >
                            <div style="display: flex; justify-content: center;" id="logo-history">
        <img src="assets/images/pic/logo.png" class="logo-user" style="cursor: pointer;" onclick="window.location.href='index.php' " >
    </div>
                       </div>
                     
                  
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
                        <div class="col-md-11" style="padding-left: 0; padding-right: 0;">
                            <div class="card-body pb-2">
                                <div class="tab-pane fade active show" id="account-general">
                                    <form method="post" action="updateuser.php" enctype="multipart/form-data" onsubmit="return kttrong()"> 
                                    <div class="card-body media align-items-center">
                                    <img src="<?php echo $user['imguser']; ?>" alt class="d-block ui-w-80" id="userImage">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Select photo
                                                <input type="file" class="account-settings-fileinput" onchange="previewImage()" id="imageInput" accept="image/jpeg, image/png, image/gif" name="userImage">
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
                                        
                                        <div class="row" style="margin-bottom: 14px;">
                                            <div class="col-lg-4">
                                                <div class="mb-4 mb-lg-0">
                                                    <label class="form-label">Birthday</label>
                                                    <input type="date" name="birthday" class="form-control" value="<?php echo $user['birthday']; ?>" id="dateInput" >
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4">
                                                <div class="mb-4 mb-lg-0">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" name="phone" maxlength="11" class="form-control" value="<?php echo $user['phone']; ?>" id="phone" required>
                                                </div>
                                            </div>
                
                                            
                                        </div>
                                      
                                        <div class="form-group" style="margin-bottom: 25px;">

                                        <label class="form-label">Adress</label>

                                        <div class="input-group">
  <input type="text" name="sonha" id="sonha"  class="form-control" placeholder="House number" value="<?php echo $user['sonha']; ?>" required>

  <input type="text" name="duong" id="duong" class="form-control" placeholder="Street" value="<?php echo $user['duong']; ?>" required>

  <select class="form-control" name="city" id="city" aria-label=".form-select-sm">
<option value="0" selected>Select City</option> 
<option value="Hồ Chí Minh City" <?php echo ($user['city'] == 'Hồ Chí Minh City') ? 'selected' : ''; ?>>Hồ Chí Minh City</option> 
<option value="Hà Nội City" <?php echo ($user['city'] == 'Hà Nội City') ? 'selected' : ''; ?>>Hà Nội City</option> 
   </select>

                                        </div>
                                        </div>

                                        <div class="form-group">
                                   
                                        <div class="input-group">
                                      
                                        <select class="form-control" id="district" name="district" aria-label=".form-select-sm" >
                                  <option value="0">Select District</option>
                                  <option value="District 1" <?php echo ($user['district'] == 'District 1') ? 'selected' : ''; ?>>District 1</option> 
                                  <option value="District 2" <?php echo ($user['district'] == 'District 2') ? 'selected' : ''; ?>>District 2</option> 
                                  <option value="District 3" <?php echo ($user['district'] == 'District 3') ? 'selected' : ''; ?>>District 3</option> 
                                  <option value="District 4" <?php echo ($user['district'] == 'District 4') ? 'selected' : ''; ?>>District 4</option> 
                                  <option value="District 5" <?php echo ($user['district'] == 'District 5') ? 'selected' : ''; ?>>District 5</option> 
                                  <option value="District 6" <?php echo ($user['district'] == 'District 6') ? 'selected' : ''; ?>>District 6</option> 
                                     </select>
 
                                     <select  class="form-control" id="ward" name="ward" aria-label=".form-select-sm" >
                    <option value="0" selected>Select Ward</option>
                    <option value="Ward 1" <?php echo ($user['ward'] == 'Ward 1') ? 'selected' : ''; ?>>Ward 1</option> 
                                  <option value="Ward 2" <?php echo ($user['ward'] == 'Ward 2') ? 'selected' : ''; ?>>Ward 2</option> 
                                  <option value="Ward 3" <?php echo ($user['ward'] == 'Ward 3') ? 'selected' : ''; ?>>Ward 3</option> 
                                  <option value="Ward 4" <?php echo ($user['ward'] == 'Ward 4') ? 'selected' : ''; ?>>Ward 4</option> 
                                  <option value="Ward 5" <?php echo ($user['ward'] == 'Ward 5') ? 'selected' : ''; ?>>Ward 5</option> 
                                  <option value="Ward 6" <?php echo ($user['ward'] == 'Ward 6') ? 'selected' : ''; ?>>Ward 6</option> 
                                       </select>

                                        </div>
                                         </div>
                                       
                                        <div  id="profile-button" style="display: flex; justify-content: center;margin-top: 50px;margin-bottom: 20px;">
                                        <button type="button" class="btn btn-default" id="button-go-back" onclick="window.location.href='shop.php'"><i class="fa-solid fa-chevron-left"></i> Back To Shop</button>
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
</body>

</html>




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
  var addressRegex = /[a-zA-Z0-9\s/đĐÀÁẢẠÃÀÂẤẦẨẬẪĂẮẰẲẶẴÉẺẸẼÈẾỀỂỆỄÍÌỈỊĨÓÒỎỌÕÔỐỒỔỘỖƠỚỜỞỢỠÚÙỦỤŨỨỪỬỰỮÝỲỶỴỸíìỉịĩóòỏọõôốồổộỗơớờởợỡúùủụũưứừửựữýỳỷỵỹ]/;
  if (!fullnameRegex.test(fullname)) {
        alert("Full name must contain only letters.");
        window.location.href='user.php';
        return false;
    } 
    if (!emailRegex.test(email)) {
        alert("Invalid Email.");
        window.location.href='user.php';
        return false;
    }
    if(!phoneRegex.test(phone)){
        alert("Invalid Phone Number.");
        window.location.href='user.php';
        return false;
    }
    if(!addressRegex.test(sonha) || !addressRegex.test(duong)){
        alert("Invalid Address.");
        window.location.href='user.php';
        return false;
    }

        var city = document.getElementById('city').value;
        if (city === "0") {
            alert("Please select a city");
            window.location.href='user.php';
            return false;
        }


        var district = document.getElementById('district').value;
        if (district === "0") {
            alert("Please select a district");
            window.location.href='user.php';
            return false;
        }

        var ward = document.getElementById('ward').value;
        if (ward === "0") {
            alert("Please select a ward");
            window.location.href='user.php';
            return false;
        }

        return true;
       
    }
</script>


