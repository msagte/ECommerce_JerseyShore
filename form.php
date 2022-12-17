


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jersey Shore Furniture - Insert Product</title>
 
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up !</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

</head>
<body>

<form class="modal-content"  action="form.php" method="post">
<?php

// Connect to database
$con = mysqli_connect("localhost","root","","jerseyshoredb");

// Get all the categories from category table
$sql = "SELECT * FROM category order by Category_ID asc";
  $sqls = "SELECT * FROM brand order by Brand_ID";
$all_categories = mysqli_query($con,$sql);
  $all_brands = mysqli_query($con, $sqls);

// The following code checks if the submit button is clicked
// and inserts the data in the database accordingly
if(isset($_POST['submit']))
{
  // Store the Product name in a "name" variable
  $Name = mysqli_real_escape_string($con,$_POST['Name']);
      $brand_id = mysqli_real_escape_string($con,$_POST['Brand']);
      $Price = mysqli_real_escape_string($con,$_POST['Price']);      
      $Quantity = mysqli_real_escape_string($con,$_POST['Quantity']);
  $Images = mysqli_real_escape_string($con,$_POST['Images']);
      // $Category = mysqli_real_escape_string($con,$_POST['Category']);
  // Store the Category ID in a "id" variable
  $category_id = mysqli_real_escape_string($con,$_POST['Category']);

  if (isset($_POST['updateProduct']) && !empty($_POST['updateProduct'])) {

    
    
    $sql_update_product = "UPDATE Product SET Quantity='{$Quantity}',Name = '{$Name}',Price = '{$Price}',brand_id='{$brand_id}',category_id='{$category_id}' WHERE Product_ID ='{$_POST['updateProduct']}'";
    if(mysqli_query($con, $sql_update_product))
    {
      echo '<script>alert("Product Updated successfully")
      window.location.href="product_Management.php"
      </script>';
    }
   
  } else {

     // Creating an insert query using SQL syntax and
    // storing it in a variable.
    $sql_insert =
      "insert into product (Name,brand_id,Price,category_id,Quantity,Images) values
          ('" . $Name . "', '" . $brand_id . "', '" . $Price . "', '" . $category_id . "','" . $Quantity . "','" . $Images . "')";

          if(mysqli_query($con,$sql_insert))
          {
            echo '<script>alert("Product added successfully")</script>';
          }
  }
  // The following code attempts to execute the SQL query
  // if the query executes with no errors
  // a javascript alert message is displayed
  // which says the data is inserted successfully
 
}
?>
<section class="text-center">
  <!-- Background image -->
  
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <img src="pictures/Homelogo.png"
                    style="width: 185px;" alt="logo">

        <?php  if (isset($_GET['ProductID']) && !empty($_GET['ProductID'])) { ?>
          <h2 class="fw-bold mb-5">Update Product</h2>
        <?php } else { ?>
          <h2 class="fw-bold mb-5">Insert Product</h2>
          <?php } ?>
<?php

$ProductName = "";
$brandId = 0;
$categoryId= 0;
$quantityNo =0;
$priceAmt = 0;
$imgFile = "";

          if (isset($_GET['ProductID']) && !empty($_GET['ProductID']))
          {
            $prodSQL = "SELECT * FROM Product where Product_ID = " . $_GET['ProductID'];
            $results = mysqli_query($con,$prodSQL);

            if (!$results) {
    echo 'Could not run query: ';
              exit;
          }
          
          $row = mysqli_fetch_array($results);
          if(mysqli_num_rows($results) > 0)
          {
                   foreach($results as $result)
           {
            $ProductName = $result['Name'];
            $brandId = $result['brand_id'];
            $categoryId= $result['category_id'];
            $quantityNo= $result['Quantity'];
            $priceAmt= $result['Price'];
            $imgFile = $result['Images'];
            

           }
          }


            
          }
?>
          
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-12 mb-4">
                <div class="form-outline">                 				
                  <input type="text" id="Name" class="form-control" placeholder="Enter Product Name" name="Name" maxlength="60" size="300" value ="<?php echo $ProductName; ?>" required/>                    
                </div>
              </div>
			  </div>

            <div class="row">
              <div class="col-md-6 mb-4">
				
                <div class="dropdown">
					
					<select class="form-select" aria-labelledby="dropdownMenu2" name="Category" required>
						<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
			?>
				<option <?=$categoryId == $category['Category_ID'] ? 'selected="selected"' : '';?> value="<?php echo $category["Category_ID"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["Category_Name"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
				</select>
                 
                </div>
              </div>
            
            <!-- Email input -->
            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <select class="form-select" name="Brand">
						<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($brand = mysqli_fetch_array(
						$all_brands,MYSQLI_ASSOC)):;
			?>
				<option <?=$brandId == $brand['Brand_ID'] ? 'selected="selected"' : '';?> value="<?php echo $brand["Brand_ID"];
					// The value we usually set is the primary key
				?>">
					<?php echo $brand["Brand_Name"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
			  </select>
            </div>
            </div>
			
			
            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="number" placeholder="Price" name="Price" maxlength="30" size="25"   class="form-control" id="Price" value ="<?php echo $priceAmt; ?>" required />
            </div>
            </div>
          

            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="number" placeholder="Quantity" name="Quantity" maxlength="30" size="25"  class="form-control" id="Quantity" value ="<?php echo $quantityNo; ?>" required/>
            </div>
            </div>
			</div>
          <div class="row">
		  <input type="file" name="Images" id="uploadimage" onchange="show_preview('preview1','uploadimage')" maxlength="100" value ="" size="130"/> 
		  <img class="media-object" src="http://placehold.it/50x50" alt="" ><?php echo $imgFile; ?></img>
		  </div>
          
        
        <?php
               if (isset($_GET['ProductID']) && !empty($_GET['ProductID'])) {?>
            <!-- Submit button -->
            <button type="submit" id ="submit" name="submit" class="btn btn-primary btn-block mb-4">
              Update Product
            </button>
            <button type="button" onclick="window.location='product_Management.php';" class="btn btn-primary btn-block mb-4">
              Return
            </button>
            <input type = "Hidden" name="updateProduct" value = '<?php echo $_GET['ProductID']?>' />
            <?php } else {   ?>

            <button type="submit" id ="submit" name="submit" class="btn btn-primary btn-block mb-4">
              Add Product
            </button>
            <button type="button" onclick="window.location='product_Management.php';" class="btn btn-primary btn-block mb-4">
              Return
            </button>
              <?php } ?>
            <!-- Register buttons -->
            
          
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</body>

</html>
