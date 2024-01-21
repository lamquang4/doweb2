<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Product</title>
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
                        <span class="las la-user-alt"></span>
                        <small>Customers</small>
                    </a>
                </li>
             
                <li>
                   <a href="admin-product.php">
                        <span class="las la-clipboard-list" style="color: #fff;"></span>
                        <small style="color: #fff;">Products</small>
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
<div class="page-content">
        
    <h1 style="padding: 1.3rem 0rem;color: #74767d;" id="product">Products</h1>
    <div class="user-tab">

        <div class="user-input">
             ID:<input type="text" name="id-product" id="id-product" >         
        </div>

        <div class="user-input" >
          Product's Image:<input type="file" name="fimage1" id="fimage1" onchange="previewImage()">
        
                </div>

            

                 
                  <img id="preview-image" src="" alt="Preview Image" width="30%" style="display: none; margin-bottom: 5px;">
              

        <div class="user-input" style="display: none;">
           Product's Url:<input type="text" name="fimage" id="fimage" >
                 </div>
                 <div class="user-input">
                  Product Type:<select style="padding: 2px 50px;">
                    <option>Select Type</option>
                    <option>Carbonated</option>
                    <option>Non-carbonated</option>
                  </select>
                       </div>
        <div class="user-input">
Product Name:<input type="text" name="fproduct" id="fproduct">
     </div>

  <div class="user-input">
       Price:<input type="text" name="quantity" id="quantity">     
  </div>

  <div class="user-input">
    Quantity:<input type="number" name="dateadd" id="dateadd" min="1" >
</div>

<div class="user-input">
        Date Add:<input type="date" name="price" id="price">
       </div>
       <div class="user-input">
        Description:<input type="text" name="descrip" id="descrip" >
       </div>
       <div class="user-input" style="display: none;">
        Action:<input type="text" name="action" id="action" >
       </div>
       <div>

        <button onclick="addHtmlTableRow1();">Add +</button>
        
                <button id="editButton" onclick="editHtmlTbleSelectedRow1();" style="visibility: hidden;" disabled>Edit <span class="las la-edit"></span></button>
                <button id="deleteButton" onclick="removeSelectedRow1();" style="visibility: hidden;" disabled>Delete <span class="las la-trash"></span></button>
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
<table width="100%" id="table-product">
<thead>
<tr>
    <th>ID PRODUCT</th>
    <th><span class="las la-sort"></span> IMAGE</th>
    <th><span class="las la-sort"></span> PRODUCT</th>
    <th><span class="las la-sort"></span> PRICE</th>
    <th ><span class="las la-sort"></span> QUANTITY</th>
    <th><span class="las la-sort"></span> DATE ADD</th>
    <th><span class="las la-sort"></span> ACTION</th>
   
</tr>
</thead>
<tbody>
<tr>
<td>#SP01</td>
<td>

   <div class="image-product-admin">
    <div>
   <img src="assets/images/sp/coca1.png" id="productImage">
    </div>
    
        
   </div>
 
</td>
<td>

Coca Zero Sugar

</td>
<td>$10.00</td>
<td>120</td>
<td>2023-05-20</td>
<td>
  <div class="actions">
     
      <span class="las la-edit"></span>
      <span class="las la-trash"></span>
  </div>
</td>
</tr>

<tr>
<td>#SP02</td>
<td>

    <div class="image-product-admin">
     <div>
    <img src="assets/images/sp/sprite1.png" id="productImage">
     </div>
 
         
    </div>
  
 </td>
<td>


Sprite

</td>
<td>$10.00</td>
<td>100</td>
<td>2023-08-12</td>
<td>
  <div class="actions">
  
    <span class="las la-edit"></span>
    <span class="las la-trash"></span>
</div>
</td>
</tr>
<tr>
<td>#SP03</td>
<td>

    <div class="image-product-admin">
     <div>
    <img src="assets/images/sp/pepsi.png" id="productImage">
     </div>

         
    </div>
  
 </td>
<td>
Pepsi Original
</td>
<td>$12.00</td>
<td>80</td>
<td>2023-06-01</td>
<td>
  <div class="actions">

    <span class="las la-edit"></span>
    <span class="las la-trash"></span>
</div>
</td>      

</tr>


<tr>
<td>#SP04</td>
<td>

    <div class="image-product-admin">
     <div>
    <img src="assets/images/sp/aquariusgas.png" id="productImage">
     </div>

         
    </div>
  
 </td>
<td>
Aquarius Gas
</td>
<td>$10.00</td>
<td>50</td>
<td>2023-10-19</td>
<td>
  <div class="actions">

    <span class="las la-edit"></span>
    <span class="las la-trash"></span>
</div>
</td>
      
 
</tr>

<tr>
<td>#SP05</td>
<td>

    <div class="image-product-admin">
     <div>
    <img src="assets/images/sp/cocaori.png" id="productImage">
     </div>

    </div>
  
 </td>
<td>

Coca Original

</td>
<td>$13.00</td>
<td>50</td>
<td>2023-01-10</td>
<td>
  <div class="actions">
  
    <span class="las la-edit"></span>
    <span class="las la-trash"></span>
</div>
</td>

</tr>

<tr>
  <td>#SP01</td>
  <td>
  
     <div class="image-product-admin">
      <div>
     <img src="assets/images/sp/coca1.png" id="productImage">
      </div>
      
          
     </div>
   
  </td>
  <td>
  
  Coca Zero Sugar
  
  </td>
  <td>$10.00</td>
  <td>120</td>
  <td>2023-05-20</td>
  <td>
    <div class="actions">
       
        <span class="las la-edit"></span>
        <span class="las la-trash"></span>
    </div>
  </td>
  </tr>
  <tr>
    <td>#SP01</td>
    <td>
    
       <div class="image-product-admin">
        <div>
       <img src="assets/images/sp/coca1.png" id="productImage">
        </div>
        
            
       </div>
     
    </td>
    <td>
    
    Coca Zero Sugar
    
    </td>
    <td>$10.00</td>
    <td>120</td>
    <td>2023-05-20</td>
    <td>
      <div class="actions">
         
          <span class="las la-edit"></span>
          <span class="las la-trash"></span>
      </div>
    </td>
    </tr>
    <tr>
      <td>#SP01</td>
      <td>
      
         <div class="image-product-admin">
          <div>
         <img src="assets/images/sp/coca1.png" id="productImage">
          </div>
          
              
         </div>
       
      </td>
      <td>
      
      Coca Zero Sugar
      
      </td>
      <td>$10.00</td>
      <td>120</td>
      <td>2023-05-20</td>
      <td>
        <div class="actions">
           
            <span class="las la-edit"></span>
            <span class="las la-trash"></span>
        </div>
      </td>
      </tr>
      <tr>
        <td>#SP01</td>
        <td>
        
           <div class="image-product-admin">
            <div>
           <img src="assets/images/sp/coca1.png" id="productImage">
            </div>
            
                
           </div>
         
        </td>
        <td>
        
        Coca Zero Sugar
        
        </td>
        <td>$10.00</td>
        <td>120</td>
        <td>2023-05-20</td>
        <td>
          <div class="actions">
             
              <span class="las la-edit"></span>
              <span class="las la-trash"></span>
          </div>
        </td>
        </tr>
        <tr>
          <td>#SP01</td>
          <td>
          
             <div class="image-product-admin">
              <div>
             <img src="assets/images/sp/coca1.png" id="productImage">
              </div>
              
                  
             </div>
           
          </td>
          <td>
          
          Coca Zero Sugar
          
          </td>
          <td>$10.00</td>
          <td>120</td>
          <td>2023-05-20</td>
          <td>
            <div class="actions">
               
                <span class="las la-edit"></span>
                <span class="las la-trash"></span>
            </div>
          </td>
          </tr>
          <tr>
            <td>#SP01</td>
            <td>
            
               <div class="image-product-admin">
                <div>
               <img src="assets/images/sp/coca1.png" id="productImage">
                </div>
                
                    
               </div>
             
            </td>
            <td>
            
            Coca Zero Sugar
            
            </td>
            <td>$10.00</td>
            <td>120</td>
            <td>2023-05-20</td>
            <td>
              <div class="actions">
                 
                  <span class="las la-edit"></span>
                  <span class="las la-trash"></span>
              </div>
            </td>
            </tr>
            <tr>
              <td>#SP01</td>
              <td>
              
                 <div class="image-product-admin">
                  <div>
                 <img src="assets/images/sp/coca1.png" id="productImage">
                  </div>
                  
                      
                 </div>
               
              </td>
              <td>
              
              Coca Zero Sugar
              
              </td>
              <td>$10.00</td>
              <td>120</td>
              <td>2023-05-20</td>
              <td>
                <div class="actions">
                   
                    <span class="las la-edit"></span>
                    <span class="las la-trash"></span>
                </div>
              </td>
              </tr>
              <tr>
                <td>#SP01</td>
                <td>
                
                   <div class="image-product-admin">
                    <div>
                   <img src="assets/images/sp/coca1.png" id="productImage">
                    </div>
                    
                        
                   </div>
                 
                </td>
                <td>
                
                Coca Zero Sugar
                
                </td>
                <td>$10.00</td>
                <td>120</td>
                <td>2023-05-20</td>
                <td>
                  <div class="actions">
                     
                      <span class="las la-edit"></span>
                      <span class="las la-trash"></span>
                  </div>
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

<script>

var predefinedContent = '<div class="actions"><span class="lab la-telegram-plane"></span><span class="las la-edit"></span><span class="las la-trash"></span></div>';
  document.getElementById("action").value = predefinedContent;

window.addEventListener("DOMContentLoaded", function() {
  var predefinedContent = '<div class="image-product-admin"><div><img src="assets/images/sp/cocaori.png" id="productImage"></div></div>';
  document.getElementById("fimage").value = predefinedContent;

  const fileInput = document.getElementById('fimage1');
  fileInput.addEventListener('change', (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile) {
 
      const reader = new FileReader();
      reader.onload = (event) => {
        const dataURL = event.target.result;
  
        document.getElementById('fimage').value = '<div class="image-product-admin"><div><img src="' + dataURL + '" id="productImage"></div></div>';
      };
      reader.readAsDataURL(selectedFile);
    }
  });
});

      
    var rIndex,
        table1 = document.getElementById("table-product");
    

    function checkEmptyInput1()
    {
        var isEmpty = false,
        idproduct = document.getElementById("id-product").value,
        fproduct = document.getElementById("fproduct").value,
            quantity = document.getElementById("quantity").value,
          dateadd = document.getElementById("dateadd").value,
         descrip = document.getElementById("descrip").value,
            price= document.getElementById("price").value;
          
            if(idproduct === ""){
            alert("Please fill in");
            isEmpty = true;
        }
        else if(fproduct === ""){
            alert("Please fill in");
            isEmpty = true;
        }
        else if(quantity === ""){
            alert("Please fill in");
            isEmpty = true;
        }
        else if(dateadd === ""){
            alert("Please fill in");
            isEmpty = true;
        }
        else if(price === ""){
            alert("Please fill in");
            isEmpty = true;
        }
      
        return isEmpty;
    }
  
    function addHtmlTableRow1()
    {
   
        if(!checkEmptyInput1()){
        var newRow = table1.insertRow(table1.length),
            cell1 = newRow.insertCell(0),
            cell2 = newRow.insertCell(1),
            cell3 = newRow.insertCell(2),
            cell4 = newRow.insertCell(3),
            cell5 = newRow.insertCell(4),
            cell6 = newRow.insertCell(5),
          cell7 = newRow.insertCell(6),
            idproduct = document.getElementById("id-product").value,
            fimage=document.getElementById("fimage").value,
            fproduct = document.getElementById("fproduct").value,
            quantity = document.getElementById("quantity").value,
           dateadd = document.getElementById("dateadd").value,
           action = document.getElementById("action").value,
            price = document.getElementById("price").value;
           
            cell1.innerHTML = idproduct;
            cell2.innerHTML = fimage;
            cell3.innerHTML = fproduct;
        cell4.innerHTML = quantity;
        cell5.innerHTML = dateadd;
        cell6.innerHTML = price;
       cell7.innerHTML = action;

        selectedRowToInput1();
    }
    resetForm();
    }
    

    function selectedRowToInput1()
    {
        
        for(var i = 1; i < table1.rows.length; i++)
        {
            
            table1.rows[i].onclick = function()
            {
              resetImage();
              rIndex = this.rowIndex;
              
              document.getElementById("id-product").value = this.cells[0].innerHTML;
              document.getElementById("fimage").value = this.cells[1].innerHTML;
              document.getElementById("fproduct").value = this.cells[2].innerHTML;
              document.getElementById("quantity").value = this.cells[3].innerHTML;
              document.getElementById("dateadd").value = this.cells[4].innerHTML;
              document.getElementById("price").value = this.cells[5].innerHTML;
              document.getElementById("action").value = this.cells[6].innerHTML;
              
              const addButton = document.querySelector('button[onclick="addHtmlTableRow1();"]');
      if (!addButton.disabled) {
        addButton.disabled = true;
                };
                const deleteButton = document.getElementById('deleteButton');
                const editButton = document.getElementById('editButton');
                editButton.disabled = false;
                deleteButton.disabled = false;
                addButton.style.visibility = 'hidden';
                editButton.style.visibility = 'visible';
                deleteButton.style.visibility = 'visible';
      editButton.innerHTML = 'Update <span class="las la-check"></span>';    
            };
            
        }
        
        
    }
    selectedRowToInput1();
    
    function editHtmlTbleSelectedRow1()
    {
        var     idproduct = document.getElementById("id-product").value,
        fimage = document.getElementById("fimage").value,
            fproduct = document.getElementById("fproduct").value,
            quantity = document.getElementById("quantity").value,
           dateadd = document.getElementById("dateadd").value,
            price = document.getElementById("price").value;
            
       if(!checkEmptyInput1()){
        table1.rows[rIndex].cells[0].innerHTML = idproduct;
        table1.rows[rIndex].cells[1].innerHTML = fimage;
        table1.rows[rIndex].cells[2].innerHTML = fproduct;
        table1.rows[rIndex].cells[3].innerHTML = quantity;
        table1.rows[rIndex].cells[4].innerHTML = dateadd;
        table1.rows[rIndex].cells[5].innerHTML = price;
      
      }
      resetForm();
          const addButton = document.querySelector('button[onclick="addHtmlTableRow1();"]');
      if (addButton.disabled) {
        addButton.disabled = false;
                };
                       const editButton = document.getElementById('editButton');
                       addButton.style.visibility = 'visible';
                editButton.style.visibility = 'hidden';
                deleteButton.style.visibility = 'hidden';
                       editButton.disabled = true; 
                       deleteButton.disabled = true;
      editButton.innerHTML = 'Edit <span class="las la-edit"></span>';    
            
    }
    
    function removeSelectedRow1() {

  if (rIndex > 0) {
 
    var result = confirm("Are you sure you want to delete?");

  
    if (result == true) {
      table1.deleteRow(rIndex);
    } else {

      event.preventDefault();
    }
  }

  document.getElementById("id-product").value = "";
  document.getElementById("fimage1").value = "";
  document.getElementById("fproduct").value = "";
  document.getElementById("quantity").value = "";
  document.getElementById("dateadd").value = "";
  document.getElementById("price").value = "";
 
  resetImage();
  deleteButton.disabled = true;
  editButton.disabled = true; 
  editButton.innerHTML = 'Edit <span class="las la-edit"></span>';  
  const addButton = document.querySelector('button[onclick="addHtmlTableRow1();"]');
      if (addButton.disabled) {
        addButton.disabled = false;
                };
                addButton.style.visibility = 'visible';
                editButton.style.visibility = 'hidden';
                deleteButton.style.visibility = 'hidden';
}

function resetForm() {
  document.getElementById("id-product").value = "";
  document.getElementById("fimage1").value = "";
  document.getElementById("fproduct").value = "";
  document.getElementById("quantity").value = "";
  document.getElementById("dateadd").value = "";
  document.getElementById("price").value = "";
  document.getElementById("descrip").value = "";
  resetImage();
}

</script>

<script>

 const imageProductAdminDivs = document.querySelectorAll('.image-product-admin');

for (const imageProductAdminDiv of imageProductAdminDivs) {
  const imageInput = imageProductAdminDiv.querySelector('#imageInput');
  const image = imageProductAdminDiv.querySelector('#productImage');

  imageInput.addEventListener('change', function() {
    const file = this.files[0];

    const reader = new FileReader();

    reader.onload = function() {

      image.src = reader.result;
    };


    reader.readAsDataURL(file);
  });
}
   </script>


<script>
 function previewImage() {
    var input = document.getElementById('fimage1');
    var preview = document.getElementById('preview-image');

    
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
       
        preview.src = e.target.result;
        
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]); 
    } else {
  
      preview.style.display = 'none';
    }
  }
  function resetImage() {
    var input = document.getElementById('fimage1');
    var preview = document.getElementById('preview-image');

  
    input.value = '';

 
    preview.style.display = 'none';
  }

</script>

