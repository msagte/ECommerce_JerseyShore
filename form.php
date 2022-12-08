<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","esports_website");
	
	// Get all the categories from category table
	$sql = "SELECT * FROM `category`";
    $sqls = "SELECT * FROM 'brand'";
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
        $Product_ID = mysqli_real_escape_string($con,$_POST['Product_ID']);
        $Quantity = mysqli_real_escape_string($con,$_POST['Quantity']);
		$Images = mysqli_real_escape_string($con,$_POST['Images']);
        // $Category = mysqli_real_escape_string($con,$_POST['Category']);
		// Store the Category ID in a "id" variable
		$category_id = mysqli_real_escape_string($con,$_POST['Category']);
		
		// Creating an insert query using SQL syntax and
		// storing it in a variable.
		$sql_insert =
		"insert into product (Name,brand_id,Price,Product_ID,category_id,Quantity,Images) values
            ('" . $Name . "', '" . $brand_id . "', '" . $Price . "','" . $Product_ID . "', '" . $category_id . "','" . $Quantity . "','" . $Images . "')";

		
		// The following code attempts to execute the SQL query
		// if the query executes with no errors
		// a javascript alert message is displayed
		// which says the data is inserted successfully
		if(mysqli_query($con,$sql_insert))
		{
			echo '<script>alert("Product added successfully")</script>';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form action="form.php" method="POST"> 
		<label>Product:</label>
		<input type="text" name="Name" required><br>
        <!-- <label>Brand:</label>
        <input type="text" name="Brand" required><br> -->
    
		<label>Select a Category</label>
		<select name="Category">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["Category_ID"];
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
		<br>
		<label>Select a Brand</label>
		<select name="Brand">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($brand = mysqli_fetch_array(
						$all_brands,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $brand["Brand_ID"];
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
		<br>
        
        <label>Price:</label>
        <input type="text" name="Price" required><br>

        <label>Product_ID:</label>
        <input type="text" name="Product_ID" required><br>

        <label>Quantity:</label>
        <input type="text" name="Quantity" required><br>


        <div class="file">
        <td>Images</td>
        <td><img src="<?php echo $img1; ?>" alt="" id="preview1" /></td>
        <td> <input type="file" name="Images" id="uploadimage" onchange="show_preview('preview1','uploadimage')" maxlength="100" size="130"/>        </td>
      </div>
		<input type="submit" value="submit" name="submit">

	</form>
	<br>
</body>
</html>
