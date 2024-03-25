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
                                            <input type="text" id="usernameInput" maxlength="9" readonly class="form-control mb-1" value="<?php echo $user['username']; ?>">
                                        </div>
                              
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" id="fullnameInput" maxlength="20" class="form-control" value="<?php echo $user['fullname']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control mb-1" maxlength="50" id="emailInput" value="<?php echo $user['email']; ?>">
                                        
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
                                                    <input type="date" class="form-control" value="<?php echo $user['birthday']; ?>" id="dateInput">
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4">
                                                <div class="mb-4 mb-lg-0">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" maxlength="11" class="form-control" value="<?php echo $user['phone']; ?>" id="phoneInput">
                                                </div>
                                            </div>
                
                                            
                                        </div>
                                      
                                        <div class="form-group" style="margin-bottom: 14px;">

                                        <label class="form-label">Adress</label>

                                        <div class="input-group">
  <input type="text" class="form-control" placeholder="House number" >

  <input type="text" class="form-control" placeholder="Street" >

  <select class="form-control" id="city" aria-label=".form-select-sm">
<option value="" selected>Select City</option> 
   </select>

                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="form-label">District/Ward</label>
                                        <div class="input-group">
                                      
                                        <select class="form-control" id="district" aria-label=".form-select-sm" >
                                  <option value="" selected>Select District</option>
                                     </select>
 
                                     <select  class="form-control" id="ward" aria-label=".form-select-sm" >
                    <option value="" selected>Select Ward</option>
                                       </select>

                                        </div>
                                         </div>
                                       
                                        <div  id="profile-button" style="display: flex; justify-content: center;margin-top: 50px;margin-bottom: 20px;">
                                        <button type="button" class="btn btn-default" id="button-go-back" onclick="window.location.href='shop.php'"><i class="fa-solid fa-chevron-left"></i> Back To Shop</button>
                                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>&nbsp;
                                       
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

</html>

<script>
document.getElementById('saveChangesBtn').addEventListener('click', function() {
    var newUsername = document.getElementById('usernameInput').value;
    var newEmail = document.getElementById('emailInput').value;
    var newFullname = document.getElementById('fullnameInput').value;
    var newBirthday = document.getElementById('dateInput').value;
    var newPhone = document.getElementById('phoneInput').value;
    var genderMale = document.getElementById('male').checked;
    var genderFemale = document.getElementById('female').checked;
    var selectedGender = genderMale ? 'male' : (genderFemale ? 'female' : '');
    var formData = new FormData();
    formData.append('username', "<?php echo $_SESSION["username"]; ?>");
    formData.append('newUsername', newUsername);
    formData.append('email', newEmail);
    formData.append('fullname', newFullname);
    formData.append('birthday', newBirthday);
    formData.append('phone', newPhone);
    formData.append('gender', selectedGender);

    // Append image file if selected
    var fileInput = document.getElementById('imageInput');
    if (fileInput.files.length > 0) {
        formData.append('image', fileInput.files[0]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'updateuser.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            alert('Update successful');
            window.location.reload();
        } else {
            console.error('Error updating user:', xhr.statusText);
        }
    };

    xhr.send(formData);
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
url: "https://raw.githubusercontent.com/lamquang4/login2/main/data.json", 
method: "GET", 
responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
renderCity(result.data);
});

function renderCity(data) {
for (const x of data) {
citis.options[citis.options.length] = new Option(x.Name, x.Id);
}
citis.onchange = function () {
district.length = 1;
ward.length = 1;
if(this.value != ""){
  const result = data.filter(n => n.Id === this.value);

  for (const k of result[0].Districts) {
    district.options[district.options.length] = new Option(k.Name, k.Id);
  }
}
};
district.onchange = function () {
ward.length = 1;
const dataCity = data.filter((n) => n.Id === citis.value);
if (this.value != "") {
  const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

  for (const w of dataWards) {
    wards.options[wards.options.length] = new Option(w.Name, w.Id);
  }
}
};
}
</script>


<script>
     
        const fullnameInput = document.getElementById('fullnameInput');
        const emailInput = document.getElementById('emailInput');
        const phoneInput = document.getElementById('phoneInput');
        const saveChangesBtn = document.getElementById('saveChangesBtn');

   
        fullnameInput.addEventListener('input', validateForm);
        emailInput.addEventListener('input', validateForm);
        phoneInput.addEventListener('input', validateForm);

     
        function validateForm() {
            const fullname = fullnameInput.value.trim();
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();

       
            const fullnameRegex = /^[a-zA-Z\s]+$/; 
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; 
            const phoneRegex = /^0[1-9]\d{8,9}$/;

       
            if (fullname.match(fullnameRegex) && email.match(emailRegex) && phone.match(phoneRegex)) {
                saveChangesBtn.disabled = false; 
                saveChangesBtn.style.background = '#007bff';
                saveChangesBtn.style.cursor = 'pointer';
                saveChangesBtn.style.border = '#007bff';
               
            } else {
            
                saveChangesBtn.disabled = true; 
                saveChangesBtn.style.background = '#94c3f6';
                saveChangesBtn.style.cursor = 'not-allowed';
                saveChangesBtn.style.border = '#94c3f6';
               
            }
        }
    </script>











