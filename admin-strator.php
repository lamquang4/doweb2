<?php
require 'config.php';


if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}
$adinad = new Adinad();

$ads = $adinad->selectAds();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Administrator</title>
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
                        <a href="admin-strator.php" >
                             <span style="color: #fff;" class="las la-address-card"></span>
                             <small style="color: #fff;">Administrator</small>
                         </a>
                     </li>
                    <li >
                       <a href="admin-user.php">
                            <span class="las la-user-alt"></span>
                            <small>Customers</small>
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
        
        
        <main >
               
            <div class="page-content" >
    
                <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="adminstrator">Administrators</h1>
                <div class="user-tab">
                 
               
                 <div class="user-input">
                    Email:<input type="text" name="email" id="email"> 
    
            </div>
       
              <div class="user-input">
               Username:<input type="text" name="username" id="username">
    
         </div>
                   <div class="user-input" style="display: none;">
                          Role:<input type="text" name="role" id="role">
    
                   </div>
              
             <div class="user-input" style="display: none;">
                Status:<input type="text" name="status" id="status" ></input>
              </div>
               
              <div class="user-input" style="display: none;">
                Action:<input type="text" name="action" id="action" ></input>
              </div>
    <div >
            <button style="margin-bottom: 8px;" onclick="addHtmlTableRow();">Add +</button>
                    <button id="editButton" style="margin-bottom: 8px; visibility: hidden;" onclick="editHtmlTbleSelectedRow();"  disabled >Edit <span class="las la-edit"></span></button>
                   
                    <button style="margin-bottom: 8px; visibility: hidden;" id="blockButton" onclick="blockRow();" disabled>Block <span class="las la-lock"></span></button>
                    <button style="margin-bottom: 8px; visibility: hidden;" id="blockButton1" onclick="unblockRow();" disabled>Unblock <span class="las la-unlock"></span></button>
    </div>
    
                </div>
            </div>
            
            <div class="records table-responsive" >
               
                <div class="record-header">  
                    
                    <div class="browse">
                       <input type="search" placeholder="Search" class="record-search">
                     
                    </div>
                   
                    <div class="add">
                        <span>Entries</span>
                    <select name="" id="">
                        <option value="">ID</option>
                    </select>
                   
                        
                    </div>
            
                </div>

                <div>
                    <table width="100%" id="table-adminstrator">
                        <thead>
                            <tr>
                                                         
                                <th><span class="las la-sort"></span> EMAIL</th>
                                <th><span class="las la-sort"></span> USERNAME</th>
                                <th><span class="las la-sort"></span> ROLE</th>
                                <th><span class="las la-sort"></span> STATUS</th>
                                <th><span class="las la-sort"></span> ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ad = mysqli_fetch_assoc($ads)) { ?>
                            <tr>
                                
                             
<td>
<?php echo $ad['email']; ?>
</td>
<td>
<?php echo $ad['username']; ?>
</td>
                                <td>
                                    <select>
                                        <option selected>Customer management</option>
                                        <option > Order management</option> 
                                        <option > Product management</option>
                                      </select>
                                </td>
                                <td>
                                    Normal
                                </td>
                                <td>
                                    <button id="btn-reset">Rest Password</button>
                                </td>
                            </tr>
                            <?php } ?>
                           
                     
                            
                        </tbody>
                    </table>
                    <ul class="pagination" id="pagination">
                        <li onclick="prevPage()">Prev</li>
                       <li class="active">1</li>
                        <li onclick="nextPage()">Next</li>
                      </ul>
                 
                </div>

            </div>
           
        
            
        </main>
        
    </div>
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", function() {
      var predefinedContent = 'Normal';
      document.getElementById("status").value = predefinedContent;
    });
    window.addEventListener("DOMContentLoaded", function() {
      var predefinedContent = '<select><option selected>Customer management</option><option > Order management</option> <option > Product management</option></select>';
      document.getElementById("role").value = predefinedContent;
    });
    window.addEventListener("DOMContentLoaded", function() {
      var predefinedContent = '<button id="btn-reset">Rest Password</button>';
      document.getElementById("action").value = predefinedContent;
    });
      var rIndex,
          table = document.getElementById("table-adminstrator");

      function checkEmptyInput()
      {
          var isEmpty = false,
          email = document.getElementById("email").value,
          username = document.getElementById("username").value,
             role = document.getElementById("role").value,  
             status = document.getElementById("status").value,            
              action= document.getElementById("action").value;
              if(email === ""){
                  alert("Please fill in");
              isEmpty = true;
          }
          else if(username === ""){
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
              email = document.getElementById("email").value,
              username = document.getElementById("username").value,
              role = document.getElementById("role").value,
              status = document.getElementById("status").value, 
              action = document.getElementById("action").value;
              cell1.innerHTML = email;
              cell2.innerHTML = username;
              cell3.innerHTML = role;
              cell4.innerHTML=status;
          cell5.innerHTML = action;
     
  
          selectedRowToInput();
      }
      resetForm();
      }


      function blockUser() {
var currentRow = table.rows[rIndex];
var confirmation = confirm("Are you sure you want to block this user?");
if (confirmation) {
  currentRow.cells[3].innerHTML = "Blocked";
  currentRow.style.backgroundColor = "red";
  editButton.innerHTML = 'Edit <span class="las la-edit"></span>'; 
  const addButton = document.querySelector('button[onclick="addHtmlTableRow();"]');
    if (addButton.disabled) {
      addButton.disabled = false;
              };
              editButton.style.visibility = 'visible';
              document.getElementById("blockButton").style.visibility= 'visible';
              document.getElementById("blockButton1").style.visibility= 'visible';
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
  currentRow.cells[3].innerHTML = "Normal";
  currentRow.style.backgroundColor = "#FFFFFF";
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
document.getElementById("blockButton1").addEventListener("click", unblockUser);




function selectedRowToInput()
      {
          
          for(var i = 1; i < table.rows.length; i++)
          {
              table.rows[i].onclick = function()
              {
          
                rIndex = this.rowIndex;
                document.getElementById("email").value = this.cells[0].innerHTML;
                document.getElementById("username").value = this.cells[1].innerHTML;

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
          var   email = document.getElementById("email").value,
          username = document.getElementById("username").value,
              role = document.getElementById("role").value,
              status = document.getElementById("status").value,
             action = document.getElementById("action").value;
         if(!checkEmptyInput()){
          table.rows[rIndex].cells[0].innerHTML = email;
          table.rows[rIndex].cells[1].innerHTML = username;
      
          
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
            editButton.innerHTML = 'Edit <span class="las la-edit"></span>'; 
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
      
          document.getElementById("email").value = "";
          document.getElementById("username").value = "";
       
      }
      function resetForm() {
        document.getElementById("email").value = "";
          document.getElementById("username").value = "";
    
   

}
      
  </script>





