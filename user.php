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
    <div class="container light-style flex-grow-1 container-p-y">
        <div style="margin-bottom: 5px; margin-top: 20px;">
            <h4 class="font-weight-bold py-3 mb-4"style="display: inline;">
           Customer Profile
        </h4>  
        <img id="user-logo-shop" src="assets/images/pic/logo.png" width="10%" onclick="window.location.href='index.php';" style="cursor: pointer;">
        </div>
      
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a style="margin-top: 35px;" class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">My profile</a>
                        
                   
                        
                        
                       
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>

                        
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="assets/images/pic/custome1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Select photo
                                        <input type="file" class="account-settings-fileinput" id="imageInput" accept="image/jpeg, image/png, image/gif">
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
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="date" class="form-control" value="<?php echo $user['birthday']; ?>" id="dateInput">
                                </div>
                                <div class="form-group" style="margin-bottom: 35px;">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" value="<?php echo $user['phone']; ?>" id="phoneInput">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Adress</label>
                                    <input type="text" class="form-control" value="<?php echo $user['diachi']; ?>" id="addressInput">
                                </div>
                               
                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
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
            </div>
        </div>
        <div class="text-right mt-3" id="profile-button">
            <button type="button" class="btn btn-default" onclick="window.location.href='shop.php'">Back</button>
            <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>&nbsp;
            
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>

<script>
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






