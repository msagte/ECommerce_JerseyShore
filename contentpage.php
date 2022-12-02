<?php

session_start();
include('config.php');
$status="";
if (isset($_POST['Product_ID']) && $_POST['Product_ID']!=""){
$Product_ID = $_POST['Product_ID'];
$result = mysqli_query($con,"SELECT * FROM `Product` WHERE `Product_ID`='$Product_ID'");
$row = mysqli_fetch_assoc($result);
$Name = $row['Name'];
$Brand = $row['Brand'];
$Price = $row['Price'];
$Product_ID = $row['Product_ID'];
$Images = $row['Images'];

$cartArray = array(
	$Product_ID=>array(
	'Name'=>$Name,
	'Price'=>$Price,
	'Product_ID'=>$Product_ID,
	'quantity'=>1,
	'Images'=>$Images)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($Product_ID,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<html>

<head>
    <title>Classic Shave Producs</title>

    <link rel='stylesheet' href='css/style.css' type='text/css' media='all'/>

<style>
    
        .s   {   
            font-family: 'Brush Script MT', cursive;
            font-size: 30px;
            }
</style>
</head>

<body>

<div style = "text-align: center">
    
   <div class="s"> <h2>Classic Shave Products - Shaving Cream</h2></div>  
    
</div>

<a href="Home.html" style = "float:left; padding-left: 300px">
    <img src="pictures/Homelogo.png" alt="Home" style="width:50px">
</a>  
<br>
<br>
<div style="width:1000px; margin:50 auto;">

<?php
{
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<div class="cart_div">
<a href="cartpage.php"><img src="pictures/Shoppingcart.png" width='50' height='50' /> Cart<span><?php echo $cart_count; ?></span></a>
 </div>

<?php
}

$result = mysqli_query($con,"SELECT * FROM `Product` WHERE Category = 'Shaving Cream' ");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='Product_ID' value=".$row['Product_ID']." />
			  <div class='Images' style= 'width:200px; height: 200px; text-align: center;'>
			  <img src='".$row['Images']."' width='150' height='150' /></div>
			  <div class='name'>".$row['Name']."</div>
		   	  <div class='price'>$".$row['Price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>
</body>
</html>