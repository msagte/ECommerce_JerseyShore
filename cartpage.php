<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["Product_ID"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}
if (isset($_REQUEST['Product_Id']) and $_REQUEST['Product_Id'] != "") {
  $Product_ID = $_POST['Product_Id'];
  $result = mysqli_query($con,"SELECT * FROM `Product` WHERE `Product_ID`='$Product_ID'");
  $row = mysqli_fetch_assoc($result);
  $Name = $row['Name'];
  $Brand = $row['Brand'];
  $Price = $row['Price'];
  $Product_ID = $row['Product_ID'];
  $Quantity = $_POST['Quantity'];
  $Images = $row['Images'];
  
  $cartArray = array(
    $Product_ID=>array(
    'Name'=>$Name,
    'Price'=>$Price,
    'Product_ID'=>$Product_ID,
    'quantity'=>$Quantity,
    'Images'=>$Images)
  );
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['Product_ID'] === $_POST["Product_ID"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title>Jersey Shore Sports Cart</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />

<style>
    .button {
  background-color: #66b3ff; 
  border: none;
  color: white;
  padding: 15px 42px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   
<a href="Home.html">
    <img src="pictures/Homelogo.png" alt="Home" style="width:50px">
    </a> 
<div class="cart">
<?php {
  if (isset($_POST["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));

?>
<div class="cart_div">
<a href="cartpage.php">
<img src="pictures/Shoppingcart.png" width='50' height='50' /> Cart
 
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
  }
}
?>

<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["Images"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["Name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='Product_ID' value="<?php echo $product["Product_ID"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='Product_ID' value="<?php echo $product["Product_ID"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>

</td>
<td><?php echo "$".$product["Price"]; ?></td>
<td><?php echo "$".$product["Price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["Price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
<a href="check.php" class="button">Checkout</a>
</div>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status;
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "esports_website"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
mysqli_close($con);?>
</div>

</div>
</tbody>
</table>

<a href="customerhome.php">Return</a>

</body>
</html>