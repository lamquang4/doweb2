<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/pic/logo1.png">
    <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/admin-order.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,  initial-scale=0.9,maximum-scale=1">
    <title>Order Details Admin</title>
</head>
<body>
  <div class="container-order-detail">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                         
                            <h4 class="float-end font-size-15" style="margin-bottom: 10px;text-align: center;">ORDER <span style="font-weight: 400;margin-left: 4px;"> #DS0204 </span> <span class="badge bg-success font-size-11 ms-2" style="color: white;font-size: 16px; padding: 6px 10px;margin-left: 4px;">Shipping</span></h4>
                      
                            <hr>
                             <div>
                                    <h5 class="font-size-16 mb-2">Customer Information:</h5>
                                    <h3 class="h6">By: <span style="font-weight: 400;">Andrew Bruno</span></h3>
                                    <h3 class="h6">Email: <span style="font-weight: 400;">bruno@crossover.org</span></h3>
                                    <h3 class="h6">Phone: <span style="font-weight: 400;">+17637740318</span></h3>
                                    <h3 class="h6">Address: <span style="font-weight: 400;">45 Beaver St</span></h3>
                                </div>
                        </div>
    
                        <hr class="my-4">
                    
                        <div class="row">
                            <div class="col-sm-6">
                              
                                 <div >
                                 <h5 class="font-size-16 mb-2">Order Information:</h5>
                          <h3 class="h6">Payment Method:<span style="font-weight: 400;"> COD</span></h5>
                          <h3 class="h6">Date Order:<span style="font-weight: 400;"> 22-11-2021</span></h5>
                          <h3 class="h6">Estimated Delivery Date:<span style="font-weight: 400;"> 25-11-2021</span></h3>
                      </div>
                            </div>
                       
                            <div class="col-sm-6">
                              <div class="text-sm-end">
                             
                                  <div class="mt-4">
                                      <h3 class="mb-1" style="font-size: 16px;">Note: <span style="font-weight: 400;"> If you cannot send the complete order within 10 days, please inform me immediately.</span></h5>
                                    
                                  </div>
                             
                              </div>
                          </div>
                        
                    
                        </div>
                        <!-- end row -->
                        <hr class="my-3">

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary:</h5>
    
                            <div class="table-responsive">
                              <table class="table table-borderless" id="order-detail-table">
                                <thead>
                                  <tr style="border-bottom: 1px solid black;">
                               <th>No.</th>
                                      <th style="text-align: left; padding-left: 30px;">Item</th>
                                      <th>Quantity</th>
                                      <th >Subtotal</th>
                                    
                                    
                                  </tr>
                              </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">01</th>
                                    <td>
                                      <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                          <img src="assets/images/sp/cocaori.png" alt="" width="55" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3" >
                                          <h6 class="small mb-0"><aclass="text-reset">Coca Original</aclass=></h6>
                                          <span class="small">Price: $13.00</span>
                                        
                                        </div>
                                      </div>
                                    </td>
                                    <td>x2</td>
                                    <td class="text-end">$26.00</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">02</th>
                                    <td>
                                      
                                      <div class="d-flex mb-2">
                                        <div class="flex-shrink-0">
                                          <img src="assets/images/sp/pepsi.png" alt="" width="55" class="img-fluid">
                                        </div>
                                        <div class="flex-lg-grow-1 ms-3">
                                          <h6 class="small mb-0"><a class="text-reset">Pepsi Original</a></h6>
                                          <span class="small">Price: $12.00</span>
                                        </div>
                                      </div>
                                    </td>
                                    <td>x3</td>
                                    <td class="text-end">$36.00</td>
                                  </tr>
                                  
                                </tbody>
                     
                              </table>

                              <table id="table-price" style="margin-bottom: 10px; margin-left: 10px;">
                            <tbody>
                              <tr>
                                <td colspan="2">Subtotal:</td>
                                <td class="text-end">$62.00</td>
                              </tr>

                              <tr>
                                <td colspan="2">Shipping:</td>
                                <td class="text-end">$2.00</td>
                              </tr>
                          
                              <tr class="fw-bold" style="border-top: 1px solid black;">
                                <td colspan="2" style="font-size: 20px; font-weight: 600;">TOTAL:</td>
                                <td class="text-end" style="font-size: 20px; font-weight: 600;">$64.00</td>
                              </tr>
                         
                            </tbody>
                              </table>
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" id="print-order"><i class="fa fa-print"></i></a>
                            
                                    <a id="back-to-admin-order" onclick="window.location.href='admin-order.php'">Back</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
</body>
</html>

