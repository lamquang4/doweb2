<?php
require 'config.php';


if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}

$userinad = new Userinad();

$users = $userinad->selectUsers();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin User</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
        
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile">
                    <ion-icon name="water-outline" style="font-size: 40px; color:white;"></ion-icon>
                    <h4>H20</h4>
                   
                </div>
            </div>

            <div class="side-menu">
                <ul>
                   
                    <li>
                        <a href="admin-strator.php">
                             <span class="las la-address-card"></span>
                             <small>Administrator</small>
                         </a>
                     </li>
                    <li >
                       <a href="admin-user.php">
                            <span class="las la-user-alt" style="color: #fff;"></span>
                            <small style="color: #fff;">Customers</small>
                        </a>
                    </li>
                 
                    <li>
                       <a href="admin-product.php">
                            <span class="las la-clipboard-list"></span>
                            <small>Products</small>
                        </a>
                    </li>
                    <li>
                       <a href="admin-order.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                
              
                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle" id="bar-admin">
                    <span class="las la-bars" style="font-size: 28px; margin-top: 8px;"></span>
                </label>
                
                <div class="header-menu">
                    <label for="">
                    
                    </label>
                    
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>
                    
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>
                    
                    <div class="user" style="margin-right: 8px;">
                      
                    <a href="logout-ad.php">    
                        <span style="font-size: 20px; cursor: pointer;"> <span style="font-size: 25px;cursor: pointer;" class="las la-power-off" ></span> Logout</span>
                      </a>
                    </div>
                </div>
            </div>
        </header>



        <div class="page-content" style="margin-top: 50px;">
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="customer">Customers</h1>

            <div class="user-tab">
                <div class="user-input">
                     ID USER:<input type="text" name="id-user" id="id-user" > 
                     
                </div>
                <div class="user-input">  
Full Name:<input type="text" name="fname" id="fname">
             </div>
             <div class="user-input">
                Email:<input type="text" name="email" id="email"> 

        </div>
    
          <div class="user-input">
           Birthday:<input type="date" name="birth" id="birth">

     </div>
               <div class="user-input">
                      Address:<input type="text" name="address" id="address">

               </div>
          
         <div class="user-input" style="display: none;">
            Status:<input type="text" name="status" id="status" ></input>
          </div>
          <div class="user-input" style="display: none;">
            Action:<input type="text" name="action" id="action">
           
      </div>
           

<div >
        <button style="margin-bottom: 8px;" onclick="addHtmlTableRow();">Add +</button>
                <button id="editButton" style="margin-bottom: 8px; visibility: hidden;" onclick="editHtmlTbleSelectedRow();" disabled >Edit <span class="las la-edit"></span></button>
               
                <button style="margin-bottom: 8px; visibility: hidden;" id="blockButton" onclick="blockRow();" disabled>Block <span class="las la-lock"></span></button>
                <button style="margin-bottom: 8px; visibility: hidden;" id="blockButton1" onclick="unblockRow();" disabled>Unblock <span class="las la-unlock"></span></button>
</div>

            </div>
        </div>

            <div class="records table-responsive" >
           
                <div class="record-header">

                    <div class="browse">
                       <input type="search" placeholder="Search (#ID)" class="record-search">
                     
                    </div>

                    <div class="add">
                        <span>Entries</span>
                    <select name="" id="">
                        <option value="">ID</option>
                    </select> 
                    </div>

                </div>

                <div>
                    <table width="100%" id="table-user">
                        <thead>
                            <tr>
                                <th>ID USER</th>
                                <th><span class="las la-sort"></span> FULL NAME</th>
                                <th><span class="las la-sort"></span> EMAIL</th>
                           
                                <th><span class="las la-sort"></span> BIRTHDAY</th>
                                <th><span class="las la-sort"></span> ADDRESS</th>
                               
                                <th><span class="las la-sort"></span> STATUS</th>
                                <th><span class="las la-sort"></span> ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)) { ?>
    <tr>
        <td>#USER<?php echo $user['id']; ?></td>
        <td><?php echo $user['fullname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['birthday']; ?></td>
        <td><?php echo $user['diachi']; ?></td>
        <td>
        <?php echo $user['status']; ?>
        </td>
        <td>
            <div class="actions">
                <span class="las la-edit"></span>
                <span class="las la-lock"></span>
            </div>
        </td>
    </tr>
<?php } ?>
       
                        </tbody>
                    </table>

                    <ul class="pagination" id="pagination">
                        <li >Prev</li>
                       <li class="active">1</li>
                        <li >Next</li>
                      </ul>
                        </div>
            </div>
          
    

</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
      window.addEventListener("DOMContentLoaded", function() {
        var predefinedContent = 'Normal';
        document.getElementById("status").value = predefinedContent;
      });
      window.addEventListener("DOMContentLoaded", function() {
        var predefinedContent = '  <div class="actions"><span class="lab la-telegram-plane"></span><span class="las la-edit"></span><span class="las la-trash"></span></div>';
        document.getElementById("action").value = predefinedContent;
      });
    
        var rIndex,
            table = document.getElementById("table-user");

        function checkEmptyInput()
        {
            var isEmpty = false,
            iduser = document.getElementById("id-user").value,
            fname = document.getElementById("fname").value,
            email = document.getElementById("email").value,
               
               birth = document.getElementById("birth").value,
                address = document.getElementById("address").value, 
                status = document.getElementById("status").value,          
                action= document.getElementById("action").value;
                if(iduser === ""){
                    alert("Please fill in");
                isEmpty = true;
            }
            else if(fname === ""){
                alert("Please fill in");
                isEmpty = true;
            }
            else if(email === ""){
                alert("Please fill in");
                isEmpty = true;
            }
         
            else if(birth === ""){
                alert("Please fill in");
                isEmpty = true;
            }
            else if(address === ""){
                alert("Please fill in");
                isEmpty = true;
            }
         
            return isEmpty;
        }

        function addHtmlTableRow()
        {
          
            if(!checkEmptyInput()){
            var newRow = table.insertRow(table.length),
                cell1 = newRow.insertCell(0),
                cell2 = newRow.insertCell(1),
                cell3 = newRow.insertCell(2),
                cell4 = newRow.insertCell(3),
                cell5 = newRow.insertCell(4),
                cell6 = newRow.insertCell(5),
                cell7 = newRow.insertCell(6),
                iduser = document.getElementById("id-user").value,
                fname = document.getElementById("fname").value,
                email = document.getElementById("email").value,
               birth = document.getElementById("birth").value,
                address = document.getElementById("address").value,
                status = document.getElementById("status").value,
                action = document.getElementById("action").value;
                cell1.innerHTML = iduser;
                cell2.innerHTML = fname;
                cell3.innerHTML = email;
            cell4.innerHTML =  birth;
            cell5.innerHTML =address;
            cell6.innerHTML = status;
            cell7.innerHTML = action;
    
            selectedRowToInput();
        }
        resetForm();
        }


        function blockUser() {
  var currentRow = table.rows[rIndex];
  var confirmation = confirm("Are you sure you want to block this user?");
  if (confirmation) {
    currentRow.cells[5].innerHTML = "Blocked";
    currentRow.cells[5].style.color = "red";
    editButton.innerHTML = 'Edit <span class="las la-edit"></span>'; 
    const addButton = document.querySelector('button[onclick="addHtmlTableRow();"]');
      if (addButton.disabled) {
        addButton.disabled = false;
                };
                editButton.disabled = true; 
                document.getElementById("blockButton").disabled=true;
                document.getElementById("blockButton1").disabled=true;
                addButton.style.visibility = 'visible';
              editButton.style.visibility = 'hidden';
              document.getElementById("blockButton").style.visibility= 'hidden';
              document.getElementById("blockButton1").style.visibility= 'hidden';
    resetForm();
  }
  else {
         event.preventDefault();
       
       }
}

document.getElementById("blockButton").addEventListener("click", blockUser);

function unblockUser() {
  var currentRow = table.rows[rIndex];
  var confirmation = confirm("Are you sure you want to unblock this user?");
  if (confirmation) {
    currentRow.cells[5].innerHTML = "Normal";
    currentRow.cells[5].style.color = "black";

    const addButton = document.querySelector('button[onclick="addHtmlTableRow();"]');
      if (addButton.disabled) {
        addButton.disabled = false;
                };
                editButton.disabled = true; 
                document.getElementById("blockButton").disabled=true;
                document.getElementById("blockButton1").disabled=true;
                addButton.style.visibility = 'visible';
              editButton.style.visibility = 'hidden';
              document.getElementById("blockButton").style.visibility= 'hidden';
              document.getElementById("blockButton1").style.visibility= 'hidden';
    resetForm();
  }
  else { 
         event.preventDefault();     
       }
}
document.getElementById("blockButton1").addEventListener("click", unblockUser);
 



function selectedRowToInput()
        {
            
            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
            
                  rIndex = this.rowIndex;
                  document.getElementById("id-user").value = this.cells[0].innerHTML;
                  document.getElementById("fname").value = this.cells[1].innerHTML;
                  document.getElementById("email").value = this.cells[2].innerHTML;
                 
                  document.getElementById("birth").value = this.cells[3].innerHTML;
                  document.getElementById("address").value = this.cells[4].innerHTML;
              
                  const addButton = document.querySelector('button[onclick="addHtmlTableRow();"]');
      if (!addButton.disabled) {
        addButton.disabled = true;
                };
                const editButton = document.getElementById('editButton');
                addButton.style.visibility= 'hidden';
              editButton.style.visibility = 'visible';
              document.getElementById("blockButton").style.visibility= 'visible';
              document.getElementById("blockButton1").style.visibility= 'visible';
                editButton.disabled = false; 
                document.getElementById("blockButton").disabled=false;
                document.getElementById("blockButton1").disabled=false;
              editButton.innerHTML = 'Update <span class="las la-check"></span>'; 
            }
        }
    }
        selectedRowToInput();
        
        function editHtmlTbleSelectedRow()
        {
            var   iduser = document.getElementById("id-user").value,
            fname = document.getElementById("fname").value,
            email = document.getElementById("email").value,
               birth = document.getElementById("birth").value,
                address = document.getElementById("address").value,
               status = document.getElementById("status").value,
               action = document.getElementById("action").value;
           if(!checkEmptyInput()){
            table.rows[rIndex].cells[0].innerHTML = iduser;
            table.rows[rIndex].cells[1].innerHTML = fname;
            table.rows[rIndex].cells[2].innerHTML = email;
            table.rows[rIndex].cells[3].innerHTML = birth;
            table.rows[rIndex].cells[4].innerHTML = address;
            
          }
          resetForm();
          const addButton = document.querySelector('button[onclick="addHtmlTableRow();"]');
      if (addButton.disabled) {
        addButton.disabled = false;
                };
                const editButton = document.getElementById('editButton');
              
              addButton.style.visibility = 'visible';
              editButton.style.visibility = 'hidden';
              document.getElementById("blockButton").style.visibility= 'hidden';
              document.getElementById("blockButton1").style.visibility= 'hidden';
              editButton.disabled = true; 
                document.getElementById("blockButton").disabled=true;
                document.getElementById("blockButton1").disabled=true;
        }
        
        function removeSelectedRow()
        {
            if (rIndex > 0) {
        var result = confirm("Are you sure you want to delete?");
        if (result == true) {
          table.deleteRow(rIndex);
        } else {
         
          event.preventDefault();
        }
      }
        
            document.getElementById("id-user").value = "";
            document.getElementById("fname").value = "";
            document.getElementById("email").value = "";
           
            document.getElementById("birth").value = "";
            document.getElementById("address").value = "";
       
        }
        function resetForm() {
            document.getElementById("id-user").value = "";
            document.getElementById("fname").value = "";
            document.getElementById("email").value = "";
         
            document.getElementById("birth").value = "";
            document.getElementById("address").value = "";
     
  
}
        
    </script>






