<?php
session_start();
require 'config.php';


 
  
            if(isset($_SESSION['cartArray']) && !empty($_SESSION['cartArray'])){

              // Save new order
              $sql ="Insert Into orders (cust_id,invoicenumber,orderdate) values
              (". $_SESSION['CustID'] ."," . rand(pow(10, 4), pow(10, 5)-1) . ",'" . date("Y/m/d") ."')";
              
             if (!mysqli_query($con, $sql)) {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
              } 
                $Order_ID = mysqli_insert_id($con);
              $_SESSION['OrderID'] = $Order_ID;
              
              // Save order details for new order
              $cart = $_SESSION ['cartArray'];
             
              foreach($cart as $key=>$val) {
                  $sql_details="insert into Orderdetail(Product_ID, quantity, Order_ID, Price) values({$val[$key]['Product_ID']}, {$val[$key]['quantity']},{$Order_ID},{$val[$key]['Price']})";
                 
                mysqli_query($con, $sql_details);
                
                  if($Order_ID!="") {
                     $sql_select_product="SELECT Quantity FROM Product WHERE Product_ID = '{$val[$key]['Product_ID']}'";
                     $product_result = mysqli_query($con, $sql_select_product);
                     $row=mysqli_fetch_assoc($product_result);
                     
                     
                       $nQuantity=$row['Quantity']-$val[$key]['quantity'];
                     
                       $sql_update_product="UPDATE Product SET Quantity='{$nQuantity}' WHERE Product_ID ='{$val[$key]['Product_ID']}'";
                       $product_result = mysqli_query($con, $sql_update_product);

                       $sql_Delete_Cart="DELETE FROM cart WHERE cust_id =" . $_SESSION['CustID'];
                       $product_result = mysqli_query($con, $sql_Delete_Cart);

                       unset($_SESSION['cartArray']);
                   }




               
              }

            

          }

//$sql_history="SELECT Orders.Order_ID AS orderID, SUM(Orderdetail.quantity) AS quantity, SUM(Orderdetail.Price) AS price FROM Orders INNER JOIN Orderdetail ON Orders.Order_ID= Orderdetail.Order_ID WHERE Customer_LoginID='{$_SESSION['cuname']}' GROUP BY Orders.Order_ID";
 //$product_result = mysqli_query($con, $sql_history);
 
 


  
  




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Order History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
.gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div>
    <a class="nav-link" href="product.php"> <img  src="pictures/HomeLogo.png" width='200' height='100' /></a>
   </div>
    <div class="container-fluid"></div>
    <div class="container-fluid"></div>
    <div class="container-fluid"></div>
    
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="product.php?CustID=<?php echo $_SESSION['CustID']?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    
                    </div>
                    <div>
                    <a class="nav-link" href="customerlogin.php"> <img  src="pictures/logout.png" href="customerlogin.php" width='30' height='30' /></a>
                    </div>
                    <div>
                    <a class="nav-link" href="cartpage.php?CustID=<?php echo $_SESSION['CustID']?>"><img  src="pictures/Shoppingcart.png" href="cartpage.php?Cust_ID=<?php echo $_SESSION['CustID'] ?>" width='30' height='30' /></a><span>  <?php
                    if (isset($_POST["shopping_cart"])) {
                      echo count(array_keys($_SESSION["shopping_cart"]));
                    }
          ?></span>
                    </div>
                   
                </ul>
            
        </div>
    </nav>
    <?php if (isset($_SESSION['OrderID']) && !empty($_SESSION['OrderID'])) { ?>
<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;"><?php echo $_SESSION['fullName'] ?></span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
              <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
            </div>
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
            <?php

      $res1 = "select DISTINCT CONCAT(b.Brand_Name , ' ' , p.Name ) as 'Name',Ct.Category_Name,P.Price,P.Images,OD.quantity,O.invoicenumber,O.orderdate  FROM orders O INNER JOIN orderdetail OD ON O.Order_ID = OD.Order_ID  INNER JOIN product P on P.Product_ID = OD.Product_ID  INNER JOIN brand B ON B.Brand_ID = P.brand_id   INNER JOIN category Ct on Ct.Category_ID = p.category_id WHERE O.cust_id=" . $_SESSION['CustID'] . " AND O.Order_ID = " . $_SESSION['OrderID'];
      $query_result = mysqli_query($con, $res1);

      $total_price = 0;

      while ($row = mysqli_fetch_assoc($query_result)) {






            ?>

                <div class="row">
                  <div class="col-md-2" aria-colspan="2">
                    <img src="pictures/<?php echo $row['Images'] ?>"
                      class="img-fluid" alt="">
                  </div>                  
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $row['Name'] ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $row['Category_Name'] ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: <?php echo $row['quantity'] ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Invoice Date:<?php echo $row['orderdate'] ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">$<?php echo $row['Price']*$row['quantity']  ?></p>
                  </div>
                </div>
                <?php
        $total_price = $total_price + ($row['Price']*$row['quantity']);
        $inv_number = $row['invoicenumber'];
      }
                ?>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small">Track Order</p>
                  </div>
                  <div class="col-md-10">
                    <div class="progress" style="height: 6px; border-radius: 16px;">
                      <div class="progress-bar" role="progressbar"
                        style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-around mb-1">
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $<?php if (!empty($total_price))
        echo $total_price;
      else
        echo 0; ?></p>
            </div>

            <div class="d-flex justify-content-between pt-2">
             
              <p class="text-muted mb-0">Invoice Number :  <?php
      echo $inv_number;
              ?></p>             
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Expected Delivery Date : <script> var date = new Date(); date.setDate(date.getDate() + 2); document.write(date.toLocaleDateString());   
  </script></p>
            </div>

            <div class="d-flex justify-content-between mb-5">
              <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> $<?php if (!empty($total_price))
        echo $total_price * 0.01;
      else
        echo 0; ?></p>
            </div>
          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">$<?php if (!empty($total_price))
        echo $total_price + ($total_price * 0.01);
      else
        echo 0; ?></span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }


?>
</body>
</html>