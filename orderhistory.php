<?php
session_start();
require 'config.php';




$sql_history="SELECT Orders.Order_ID AS orderID, SUM(Orderdetail.quantity) AS quantity, SUM(Orderdetail.Price) AS price FROM Orders INNER JOIN Orderdetail ON Orders.Order_ID= Orderdetail.Order_ID WHERE Customer_LoginID='{$_SESSION['cuname']}' GROUP BY Orders.Order_ID";
 $product_result = mysqli_query($con, $sql_history);
 
 


  
  




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Document</title>
</head>
<body>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Quantity</th>
      <th scope="col"> Total Price</th>
    </tr>
  </thead>
  <tbody>
      
      <?php 
     if ($product_result = mysqli_query($con, $sql_history)) {
         
    while ($row = mysqli_fetch_assoc($product_result)) {
 ?>
  
    <tr>
      <th scope="row"><?php echo $row['orderID'] ?></th>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php echo $row['price'] ?></td>
    </tr>
<?php
}
}
?>
  </tbody>
</table>

<a href="customerhome.php">Return</a>
</body>
</html>