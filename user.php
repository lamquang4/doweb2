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
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/user.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
           <div class="row">
               <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;">
                   <div class="osahan-account-page-left bg-white h-100" >
                       <div class="border-bottom p-4" >
                            <div style="display: flex; justify-content: center;" id="logo-history">
        <img src="assets/images/pic/logo.png" width="52%" style="cursor: pointer;" onclick="window.location.href='index.php' " id="logo-history">
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
               <div class="col-md-9" style="border: 1px solid #DFDFDF;">
                   <div class="osahan-account-page-right  bg-white p-4 h-100">
                       <div class="tab-content" id="myTabContent">
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center">
                                    <img src="<?php echo $user['imguser']; ?>" alt class="d-block ui-w-80" id="userImage">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Select photo
                                                <input type="file" class="account-settings-fileinput" onchange="previewImage()" id="imageInput" accept="image/jpeg, image/png, image/gif">
                                    </label> &nbsp;       
                                            
                                           
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" id="usernameInput" readonly class="form-control mb-1" value="<?php echo $user['username']; ?>">
                                        </div>
                              
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" id="fullnameInput" class="form-control" value="<?php echo $user['fullname']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control mb-1" id="emailInput" value="<?php echo $user['email']; ?>">
                                        
                                        </div>
                               
                                        <div class="form-group">
                                            <label class="form-label">Sex</label>
                                            <input id="male" style="margin-left: 10px;" type="radio" name="gender" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?>> Male
    <input id="female" style="margin-left: 10px;" type="radio" name="gender" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?>> Female
                                        </div>
                                        
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-lg-4">
                                                <div class="mb-4 mb-lg-0">
                                                    <label class="form-label">Birthday</label>
                                                    <input type="date" class="form-control" value="<?php echo $user['birthday']; ?>" id="dateInput">
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4">
                                                <div class="mb-4 mb-lg-0">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" class="form-control" value="<?php echo $user['phone']; ?>" id="phoneInput">
                                                </div>
                                            </div>
                
                                            
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="form-label">Adress</label>
                                            <input type="text" class="form-control" value="<?php echo $user['diachi']; ?>" id="addressInput">
                                        </div>
                                     
                                       
                                    </div>
           
                             
                            </div>
                        </div>
                  
                       </div>
                       
                   </div>
               </div>
               <div class="text-right mt-3" id="profile-button">
                <button type="button" class="btn btn-default" onclick="window.location.href='shop.php'">Back</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>&nbsp;
               
            </div>
           </div>
           
       </div>
</body>

</html>

<script>
document.getElementById('saveChangesBtn').addEventListener('click', function() {

    var imageInput = document.getElementById('imageInput');
    var selectedImage = imageInput.files[0];

    if (selectedImage) {
        var formData = new FormData();
        formData.append('id', <?php echo $_SESSION["id"]; ?>);
        formData.append('image', selectedImage);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateuser.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error uploading image:', xhr.statusText);
            }
        };
        xhr.send(formData);
    }

});

document.getElementById('saveChangesBtn').addEventListener('click', function() {
    var newUsername = document.getElementById('usernameInput').value;
    var newEmail = document.getElementById('emailInput').value;
    var newFullname = document.getElementById('fullnameInput').value;
    var newBirthday = document.getElementById('dateInput').value;
    var newPhone = document.getElementById('phoneInput').value;
    var newAddress = document.getElementById('addressInput').value;
    var genderMale = document.getElementById('male').checked;
    var genderFemale = document.getElementById('female').checked;
    var selectedGender = genderMale ? 'male' : (genderFemale ? 'female' : '');

    window.location.href = 'updateuser.php?id=<?php echo $_SESSION["id"]; ?>&username=' + newUsername + '&email=' + newEmail + '&fullname=' + newFullname + '&birthday=' + newBirthday + '&phone=' + newPhone + '&diachi=' + newAddress + '&gender=' + selectedGender;
});
</script>

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






