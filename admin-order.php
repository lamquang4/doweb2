<?php
require 'config.php';


if (!isset($_SESSION["loginad"]) || $_SESSION["loginad"] !== true) {
    header("Location: login-admin.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Order</title>
    <link rel="stylesheet" href="assets/css/admin.css">

    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <li >
                       <a href="admin-order.php" >
                            <span class="las la-shopping-cart" style="color: #fff;"></span>
                            <small style="color: #fff;">Orders</small>
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
            
            <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="order">Orders</h1>
          
        </div>
        
        <div class="records table-responsive" >
           
            <div class="record-header">
              <div class="browse">
                <input type="search" placeholder="Search (#ID)" class="record-search">
              
             </div>
                <div class="add">
                    <span>Entries</span>
                    <select name="" id="">
                    <option value="">10</option>
                        <option value="">16</option>
                        <option value="">20</option>
                    </select>
                    
                </div>
        
              
            </div>
        
            <div>
                <table width="100%" id="table-order">
                <thead>
                        <tr id="select-filter">
                            <th>ID ORDER</th>                          
                           
                            <th>DELIVERY ADDRESS</th>
                            <th> ORDER DATE </th>
                            <th> DELIVERY DATE </th>
                            
                            <th> ORDER STATUS </th>
                            <th> ACTION</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1285</td>
                         
                         

<td>
  95 Starrs Rd
</td>

<td>
2023/05/20
</td>
<td>
2023/05/22                        
</td>

                            <td>
                            <select>
                              <option selected>Processed</option>
                              <option >Unprocessed</option>

                            </select>
                            </td>
                            <td>
                                <a href="">Details</a>
                            </td>
                         
                          
                        </tr>
                   
                        <tr>
                            <td>#555</td>
                          
                      

                            <td>
                              45 Beaver St
                            </td>
                            <td>
                              2023/01/12
                              </td>
                            <td>
                              2023/01/15
                            </td>
                        
                            <td>
                              <select>
                                <option >Processed</option>
                                <option selected>Unprocessed</option>
                                
                              </select>
                            </td>
                            <td>
                                <a href="order-detail-admin.php">Details</a>
                            </td>
                        
                       
                        </tr>
                        <tr>
                            <td>#1478</td>
                           
                    

                            <td>
                              370 Memorial
                            </td>
                            <td>
                              2023/02/01
                            </td>
                            <td>
                              2023/02/10
                            </td>
                            
                            <td>
                              <select>
                                <option selected>Processed</option>
                                <option >Unprocessed</option>
                                
                              </select>
                            </td>
                            <td>
                                <a href="">Details</a>
                            </td>
                          
                     
                        </tr>
                 
                        <tr>
                            <td>#4862</td>
                            
                  

                            <td>
                            	37 Royal Terrace
                            </td>
                            <td>
                              2023/04/18
                            </td>
                            <td>
                              2023/04/21
                            </td>
                          
                            <td>
                              <select>
                                <option selected>Processed</option>
                                <option >Unprocessed</option>
                                
                              </select>
                            </td>
                            <td>
                                <a href="">Details</a>
                            </td>
                         
                         
                        </tr>
               
                        <tr>
                            <td>#4899</td>
                            
                        

                            <td>
                              257 Avenue
                            </td>
                            <td>
                              2023/02/24
                            </td>
                            <td>
                              2023/02/26
                            </td>
                           
                            <td>
                              <select>
                                <option selected>Processed</option>
                                <option >Unprocessed</option>
                                
                              </select>
                            </td>
                            <td>
                                <a href="">Details</a>
                            </td>
                         
                         
                        </tr>
                 
                        
                    </tbody>
                </table>

                <ul class="pagination" id="pagination">
                  <li onclick="prevPage()">Prev</li>
                 
                  <li onclick="nextPage()">Next</li>
                </ul>
            </div>
        
        </div> 
        
    

</main>




<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>



 

