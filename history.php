<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order</title>
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/history.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  
<div class="container">
    <div class="row">
        <div class="col-md-3" style="border: 1px solid #DFDFDF;padding-left: 0;padding-right: 0;" >
            <div class="osahan-account-page-left  bg-white h-100">
                <div class="border-bottom p-4">
                    <div style="display: flex; justify-content: center;"  id="logo-history">
                        <img src="assets/images/pic/logo.png" width="50%" style="cursor: pointer;" onclick="window.location.href='index.php' " id="logo-history">
                    </div>
                                   
                </div>
              
           
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="user.php">Profile</a>
                    <a class="list-group-item list-group-item-action active" data-toggle="list"
                    href="history.php">Purchase order</a>

                <a class="list-group-item list-group-item-action" data-toggle="list"
                    href="changepass.php">Change password</a>
             

                   
               
            </div>
        </div>
        <div class="col-md-9" style="border: 1px solid #DFDFDF;" class="right-containers">
            <div class="osahan-account-page-right  bg-white p-2 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4 class="font-weight-bold mt-0 mb-4">Purchase Order</h4>

                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-4" src="assets/images/sp/cocaori.png" alt="Generic placeholder image">
                                    </a>
                                    
                                    <div class="media-body">
                                       
                                        <h6 class="mb-2" style="font-size: 18px;">
                                         
                                            Coca Original
                                        </h6>
                                        <div class="flex-container">
                                            <p class="mb-3"> $13.00</p>
                                            <p class="text-gray mb-1">x2</p>
                                            
                                          </div>
                                        
                                        <p  style="color: #26aa99;" id="successful"><i class="fa-solid fa-truck"></i> Delivery successful</p>
                                    
                                        <hr>
                                      
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-4" src="assets/images/sp/lemon.png" alt="Generic placeholder image">
                                    </a>
                                    
                                    <div class="media-body">
                                       
                                        <h6 class="mb-2" style="font-size: 18px;">
                                         
                                           Lemon Tea
                                        </h6>
                                        <div class="flex-container">
                                            <p class="mb-3">$16.00</p>
                                            <p class="text-gray mb-1">x2</p>
                                           
                                          </div>
                                
                                        
                                        <p  style="color: #26aa99;" id="successful"><i class="fa-solid fa-truck"></i> Delivery successful </p>
                                      
                                        <p class="mb-0 text-black text-primary pt-2" id="total-money"><span class="text-black font-weight-bold"> Total:</span> $60.00</p>
                                        <hr>
                                        <div class="float-right" >
                                            <a class="btn btn-sm btn-outline-primary" href="user-order-info.html"><i class="icofont-headphone-alt"></i> DETAIL</a>
                                           
                                        </div>
                                    </div>
                                </div>
                              
                            
                            </div>
                        </div>
                     
                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-4" src="assets/images/sp/fanta3.png" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                       
                                        <h6 class="mb-2" style="font-size: 18px;">
                                            Fanta Sassafras
                                        </h6>
                                        <div class="flex-container">
                                           
                                            <p class="mb-3">$10.00</p>
                                            <p class="text-gray mb-1">x6</p>
                                          </div>
                                      
                                        <p  style="color: #26aa99;" id="successful"> <i class="fa-solid fa-truck"></i> Delivery successful</p>
                                    
                                        <p class="mb-0 text-black text-primary pt-2" id="total-money"><span class="text-black font-weight-bold"> Total:</span> $60.00
                                        </p>
                                        <hr>
                                        <div class="float-right">
                                            <a class="btn btn-sm btn-outline-primary" href="#"><i class="icofont-headphone-alt"></i> DETAIL</a>
                                           
                                        </div>
                                   
                                      
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-right mt-3" id="profile-button">
                    <button type="button" class="btn btn-default" id="button-go-back"  onclick="window.location.href='shop.php'"><i class="fa-solid fa-chevron-left"></i> Back To Shop</button>
                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                   
                </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>