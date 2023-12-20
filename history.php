<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/5.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/history.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<div style="display: flex; justify-content: center; margin-top: 20px;margin-bottom: 10px;">
    <img src="assets/images/pic/logo.png" width="8%" style="cursor: pointer;" onclick="window.location.href='index-user.html' " id="logo-history">
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="overflow-hidden card table-nowrap table-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 25px;">Purchase History</h5>
                    <span class="mb-0" style="font-size: 15px; font-weight: 500; color:#1a8cff;">Click to view details</span>
                  
                </div>
                
                <div class="table-responsive">
                    <table class="table mb-0" id="history-table">
                        <thead class="small text-uppercase bg-body text-muted">
                            <tr>
                                <th>ID ORDER</th>
                                <th>QUANTITY</th>
                                <th>ORDER DATE</th>
                                <th>DELIVERY DATE</th>
                                <th>TOTAL</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <tr onclick="window.location.href='user-order-info.html'">
                                <td>#2023</td>
                              
                                <td>
                                 x4
                                     </td>
                                <td>
                                    21 April, 2022
                                </td>
                                <td>
                                    23 April, 2022
                                </td>
                                <td>
                                  $60.00
                                </td>
                             
                            </tr>
                           
                            <tr >
                                <td>#1504</td>
        
                                <td >
                                   x3
                                        </td>
                                <td>
                                    19 April, 2022
                                </td>
                                <td>
                                    20 April, 2022
                                </td>
                                <td>
                                 $30.00
                                </td>
                            
                         
                            </tr>
                            <tr>
                                <td>#4950</td>
                             
                    
                                <td >
                                    x2
                                        </td>
                                <td>
                                    12 April, 2022
                                </td>
                                <td>
                                    15 April, 2022
                                </td>
                                <td>
                                  $34.00
                                </td>
                             
                            </tr>
                          
                          
                       
                            <tr>
                                <td>#5035</td>
                             
                              
                                <td>
                                    x5
                                        </td>
                                <td>
                                    1 April, 2022
                                </td>
                                <td>
                                    5 April, 2022
                                </td>
                                <td>
                                  $50.00
                                </td>
                            
                            </tr>
                            <tr>
                                <td>#5050</td>
                             
                              
                                <td>
                                    x5
                                        </td>
                                <td>
                                    8 April, 2022
                                </td>
                                <td>
                                    12 April, 2022
                                </td>
                                <td>
                                  $75.00
                                </td>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex; justify-content: right; margin-top: 40px;">
          
                <button  id="back-to-admin-order" onclick="window.location.href='shop-user.html'">Back</button> 
              
        </div>
        </div>
   
    </div>
</div>
</body>
</html>