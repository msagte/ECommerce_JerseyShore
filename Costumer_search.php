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
    <title>Search Results</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all'/>
    <style>
    .button2    {
                background-color: #ff4d4d; 
                border: none;
                color: white;
                padding: 5px 30px;
                text-align: left;
                text-decoration: none;
                display: inline-block;
                font-size: 12px;
                }
    </style>
</head>

<body>
    <h1 style="text-align: center">Classic Search Results</h1>

    <a href="Home.html" style = "float:left; padding-left: 300px">
        <img src="pictures/Homelogo.png" alt="Home" style="width:50px">
    </a>  

<div style="width:1200px; margin:50 auto;">

<?php
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<div class="cart_div">
<a href="cartpage.php"><img src="pictures/Shoppingcart.png" width='50' height='50' /> Cart<span><?php echo $cart_count; ?></span></a>
 </div>

<?php

  $searchtype=$_GET['searchtype'];
  $searchterm=trim($_GET['searchterm']);
  
$result = mysqli_query($con, "select * from Product where ".$searchtype." like '%".$searchterm."%'"); 

$num_results = $result->num_rows;
echo "<p>Number of Products found: ".$num_results."</p>";
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
?>

<?php
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<a href="Home.html" class="button2"><p>Return</p> </a>
</body>
</html>