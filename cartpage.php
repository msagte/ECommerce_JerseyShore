<?php
include("config.php");
if (!isset($_SESSION["shopping_cart"])) {
  if (!isset($_SESSION)) {
    session_start();
  } 
}
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
if (isset($_REQUEST['Product_ID']) && $_REQUEST['Product_ID'] != "") 
{
  $Product_ID = $_REQUEST['Product_ID'];
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
    'Images'=>$Images)
  );
  $_SESSION["shopping_cart"] = $cartArray;
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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login !</title>
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
    <title>Jersey Shore Furniture Cart</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid"></div>
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
                        <a class="nav-link" href="product.php">Insert Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customerlogin.php">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<section class="h-100 gradient-custom">
<form method="post" action="cartpage.php">
  <div class="container py-5">
  <?php 
  if (isset($_POST["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));

?>

<span><?php echo $cart_count; ?></span></a>

<?php
  }

  if (isset($_SESSION["shopping_cart"])) {
    $total_price = 0;

  ?>
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - <?php 
  echo count(array_keys($_SESSION["shopping_cart"]));
    
?> item/s</h5>
          </div>
          <div class="card-body">
            <!-- Single item -->
            <?php
    foreach ($_SESSION["shopping_cart"] as $product) {
            ?>
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="pictures/<?php echo $product["Images"]; ?>"
                    class="w-100" alt=<?php echo $product["Name"]; ?> />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong><?php echo $product["Name"]; ?></strong></p>
                <p>Price: $<?php echo $product["Price"]; ?></p>
                
               
                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                
          
                    <div class="form-outline">
                    <input type='hidden' name='Product_ID' value="<?php echo $product["Product_ID"]; ?>" />
                    <input type='hidden' name='action' value="change" />
                    <input id="form1" min="0" name="quantity" value="<?php echo $product["quantity"]; ?>" 
                       type="number" class="form-control" onchange="this.form.submit" />
                    <label class="form-label" for="form1">Quantity</label>
                  </div>
                
         
                </div>
                <!-- Quantity -->

                <!-- Price -->
               
                <!-- Price -->
              </div>
            </div>
            <?php 
      $total_price += ($product["Price"] * $product["quantity"]  );
    }
  }
  else 
{
	echo "<h3>Your cart is empty!</h3>";
    exit;
	}

          ?>
            <!-- Single item -->

            <hr class="my-4" />

           
            <!-- Single item -->
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <p><strong>Expected shipping delivery</strong></p>
            <p class="mb-0"><script> var date = new Date(); date.setDate(date.getDate() + 2); document.write(date.toLocaleDateString());           
</script></p>
          </div>
        </div>       
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products
                <span>$<?php echo number_format($total_price, 2, '.', '') ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>$5.00</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including Tax)</p>
                  </strong>
                </div>
                <span><strong>$<?php echo number_format($total_price + 5, 2, '.', ''); ?></strong></span>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</section>
    



<div class="message_box" style="margin:10px 0px;">
<?php echo $status;
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "esports_website"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
mysqli_close($con);?></div>


<a href="customerhome.php">Return</a>

</body>
</html>