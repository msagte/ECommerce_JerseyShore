<?php
session_start();
require 'config.php';

if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])){

    // Save new order
    $sql = "INSERT INTO Orders (Customer_LoginID)
    VALUES ('{$_SESSION['cuname']}')";
    
   if (!mysqli_query($con, $sql)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } 
      $Order_ID = mysqli_insert_id($con);
      
    // Save order details for new order
    $cart = $_SESSION ['shopping_cart'];
   
    foreach($cart as $key=>$val) {
        $sql_details="insert into Orderdetail(Product_ID, quantity, Order_ID, Price) values('{$val['Product_ID']}', '{$val['quantity']}','{$Order_ID}','{$val['Price']}')";
       
    	mysqli_query($con, $sql_details);
    	
        if($Order_ID!="") {
    	     $sql_select_product="SELECT Quantity FROM Product WHERE Product_ID = '{$val['Product_ID']}'";
    	     $product_result = mysqli_query($con, $sql_select_product);
    	     $row=mysqli_fetch_assoc($product_result);
    	     
    	     
    	       $nQuantity=$row['Quantity']-$val['quantity'];
    	     
             $sql_update_product="UPDATE Product SET Quantity='{$nQuantity}' WHERE Product_ID ='{$val['Product_ID']}'";
             $product_result = mysqli_query($con, $sql_update_product);
         }
    }

}



// Clear all products in cart
unset($_SESSION['shopping_cart']);

?>
Thanks for buying products. Click <a href="Home.html">here</a> to continue buy product.