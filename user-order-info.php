<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/pic/logo.png">
    <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user-order.css">
    <meta name="viewport" content="width=device-width,  initial-scale=0.9,maximum-scale=1">
    <title>Purchase History Details</title>
</head>
<body>
  
    <div class="container-fluid">

        <div class="container">
          <!-- Title -->
          <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0" style="font-size: 36px;"><a href="#" class="text-muted"></a> Order #2023 </h2>
            <img src="assets/images/pic/logo.png" id="h2o-logo" width="12%">
          </div>
        
          <!-- Main content -->
          <div class="row">
            <div class="col-lg-8">
              <!-- Details -->
              <div class="card mb-4">
                <div class="card-body">
                  <div class="mb-3 d-flex justify-content-between">
                    <div>
                      <span class="me-3">21-4-2022</span>
                      <span class="me-3">#2023</span>
                      <span class="me-3">COD</span>
                     
                    </div>
                
                  </div>
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex mb-2">
                            <div class="flex-shrink-0">
                              <img src="assets/images/sp/cocaori.png" alt="" width="50" class="img-fluid">
                            </div>
                            <div class="flex-lg-grow-1 ms-3">
                              <h6 class="small mb-0"><a href="#" class="text-reset">Coca Original x2</a></h6>
                              <span class="small">Price: $13.00</span>
                            
                            </div>
                          </div>
                        </td>
                        <td>x2</td>
                        <td class="text-end">$26.00</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex mb-2">
                            <div class="flex-shrink-0">
                              <img src="assets/images/sp/lemon.png" alt="" width="50" class="img-fluid">
                            </div>
                            <div class="flex-lg-grow-1 ms-3">
                              <h6 class="small mb-0"><a href="#" class="text-reset">Lemon Tea x2</a></h6>
                              <span class="small">Price: $16.00</span>
                            
                            </div>
                          </div>
                        </td>
                        <td>x2</td>
                        <td class="text-end">$32.00</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2"><span style="font-weight: 600;">Subtotal:</span></td>
                        <td class="text-end">$58.00</td>
                      </tr>
                      <tr>
                        <td colspan="2"><span style="font-weight: 600;">Shipping:</span></td>
                        <td class="text-end">$2.00</td>
                      </tr>
                  
                      <tr class="fw-bold">
                        <td colspan="2" style="font-size: 20px; font-weight: 600;">TOTAL:</td>
                        <td class="text-end" style="font-size: 20px; font-weight: 600;">$60.00</td>
                      </tr>
                      <tr>
                        <td>
                          
                        <button id="back-to-admin-order" onclick="window.location.href='history.html'">Back</button> 
                        </td>
                        
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- Payment -->
             
            </div>
            <div class="col-lg-4">
              <!-- Customer Notes -->
            
              <div class="card mb-4">
                <!-- Shipping information -->
                <div class="card-body">
                  <h3 class="h6" style="font-size: 20px;">Order Information</h3>
                  
                  
                  <hr>
                  <h3 class="h6">Address: <span style="font-weight: 400;">45 Beaver St</span> </h3>
                  <h3 class="h6">Payment Method: <span style="font-weight: 400;">COD</span></h3>
                  <h3 class="h6">Date Order: <span style="font-weight: 400;">21-4-2021</span></h3>
                  <h3 class="h6">Delivery Date: <span style="font-weight: 400;">23-4-2021</span></h3>
                  <h3 class="h6">Your Note: <span style="font-weight: 400;">I love your website</span></h3>
                 
              
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
</body>
</html>


