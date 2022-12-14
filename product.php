<?php 
if(!isset($_GET["CustID"])){
    header('Location: CustomerLogin.php');
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jersey Shore Furniture Products</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel='stylesheet' href='css/style_bootstrap.css' type='text/css' media='all' />

   
   

      
</head>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div>
    <a class="nav-link"> <img  src="pictures/HomeLogo.png" width='200' height='100' /></a>
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
                        <a class="nav-link" href="product.php?CustID=<?php echo $_GET['CustID'] ?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    
                    </div>
                    <div>
                    <a class="nav-link" href="customerlogin.php"> <img  src="pictures/logout.png" href="customerlogin.php" width='30' height='30' /></a>
                    </div>
                    <div>
                    <a class="nav-link" href="cartpage.php?CustID=<?php echo $_GET['CustID']?>"><img  src="pictures/Shoppingcart.png" href="cartpage.php?Cust_ID=<?php echo $_GET['CustID'] ?>" width='30' height='30' /></a><span>  <?php
                    if (isset($_POST["shopping_cart"])) {
                      echo count(array_keys($_SESSION["shopping_cart"]));
                    }?>
                     </div></span>
                    </div>
                   
                </ul>
            
        </div>
    </nav>
    
    <section id="sidebar">
    <section class="h-100 gradient-custom">
   
        <div class="border-bottom pb-2 ml-2">
        <h1 id="burgundy">Filters</h1>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h3 class="font-weight-bold">Categories</h3>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <div>
            <form method="POST" action="product.php?CustID=<?php echo $_GET['CustID'] ?>">
                <?php
              
                // Connect to database
                $con = mysqli_connect("localhost","root","","jerseyshoredb");

                // Get all the categories from category table
                $sql = "SELECT * FROM category";
                $sqls = "SELECT * FROM brand";
                $all_categories = mysqli_query($con,$sql);
                $all_brands = mysqli_query($con, $sqls);

                while ($category = mysqli_fetch_array(
                $all_categories,MYSQLI_ASSOC)):;

                    if (!empty($_POST['categories'])) {
                        foreach ($_POST['categories'] as $catscheckbox) {
                            if ($category["Category_ID"] == $catscheckbox)
                                $catschecked = "checked";
                            else
                                $catschecked = "";
                        }
                    }
                 ?> 
                <div class="form-group">
                <input type="checkbox"  value="<?php echo $category["Category_ID"];?>" name="categories[]" 
                <?php if(isset($catschecked)) {
                        echo $catschecked; } 
                ?>>                
                <label for="breakfast"><?php echo $category["Category_Name"];?></label>
                </div>
                <?php
                    
				    endwhile;
                    
                    
                    //echo $("input[type=checkbox][name=brands]:checked").val();
                    
                    ?>                                            
            
               
       
                <div class="py-2 border-bottom ml-3">
                <h3 class="font-weight-bold">Brands</h3>
                <div id="orange"><span class="fa fa-minus"></span></div>
       
                <?php while ($brand = mysqli_fetch_array(
                $all_brands,MYSQLI_ASSOC)):; 
                
                if (!empty($_POST['brands'])) {
                    foreach ($_POST['brands'] as $brandcheckbox) {
                       if($brand["Brand_ID"]== $brandcheckbox)
                        $brandschecked= "checked";
                    else
                        $brandschecked= "";
                    }
                    
                }
                ?>
                <div class="form-group">
                <input type="checkbox"  value="<?php echo $brand["Brand_ID"];?>" name="brands[]" 
                <?php if(isset($brandschecked)) {
                        echo $brandschecked; } 
                ?>>
                
                <label for="tea"><?php echo $brand["Brand_Name"];?></label>
                
                </div>
                                         
                <?php
				endwhile;?>     
                
                </div>
                
                <button type="submit"  id="btn_click"  class="btn btn-primary btn-lg btn-block">
                Apply
                </button>
                
                </div>
                <div>
                <a class="nav-link" href="cartpage.php?CustID=<?php echo $_GET['CustID']?>"><button type="button"  id="cartpage" href="cartpage.php?CustID=<?php echo $_GET['CustID']?>"  class="btn btn-primary btn-lg btn-block">
                Continue to Cart
                </button></a>
                </div>
                </form>
    </section>
    
</section>

<?php
if (!empty($_POST['brands'])) {
    // Loop to store and display values of individual checked checkbox.
    foreach ($_POST['brands'] as $selected) {
        $brandvals = rtrim($selected, ",");
    }
}
if (!empty($_POST['categories'])) {
    // Loop to store and display values of individual checked checkbox.
    foreach ($_POST['categories'] as $selected) {
        $catvals = rtrim($selected, ",");
    }
}
    //    echo "<script>alert('Hi' </script>"
        $wheres[]  =' 1';
        if(!empty($brandvals))
        {
            $wheres[] = 'P.brand_id in(' . $brandvals .')';
            
        }
        if(!empty($catvals))
        {
            $wheres[] = 'P.category_id in(' . $catvals .')';
            
        }
        $wheres = implode(" AND ", $wheres);

        $query = "SELECT P.Product_ID,P.Name,B.Brand_Name,P.Price,C.Category_Name,P.Quantity,P.Images FROM product P INNER JOIN category C ON C.Category_ID = P.category_id INNER JOIN brand B ON B.Brand_ID = P.brand_id WHERE $wheres;";
        $res = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($res);
        $i = 1; 
        ?>
     <!-- products section -->
     <section id="products">
    <div class="container">
        <div class="d-flex flex-row">
            <div class="text-muted m-2" id="res">Showing <?php echo $total_rows; ?> results</div>
            <div class="ml-auto mr-lg-4">
                <div id="sorting" class="border rounded p-1 m-1">
                    <span class="text-muted">Sort by</span>
                    <select name="sort" id="sort">
                        <option value="popularity"><b>Popularity</b></option>
                        <option value="prcie"><b>Price</b></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            
       
            <?php
            if (isset($_GET['ProductID'])) {

                $query = "Insert Into Cart (cust_id,Product_Id) values
            ('".$_GET['CustID']."', '".$_GET['ProductID']."')";
  
              $result = $con->query($query);

            }
            while ($row = mysqli_fetch_assoc($res)) {
                $st = '';
                $cb = '';
                $idd = 0;
                if (isset($row['Product_ID'])) {
                    $idd = $row['Product_ID'];
                    ?>
                   
                   
                    <?php
                }
            ?>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                <div class="card">
                    <img class="card-img-top" src="Pictures/<?php echo $row['Images']; ?>">
                    <div class="card-body">
                        <h5><b><?php echo $row['Brand_Name'] . " ";?><?php echo $row['Name'];?></b> </h5>
                        <div class="d-flex flex-row my-2">
                            <div class="text-muted">$<?php echo $row['Price'];?></div>
                            
                        </div> 
                        <button class="btn w-100 rounded my-2" type="button" onclick="window.location='product.php?CustID=<?php echo $_GET['CustID'] ?>&ProductID=<?php echo $row['Product_ID'] ?>';" id="btnAddToCart" name="btnAddToCart">Add to cart</button>   
                        <input type="hidden" name="ProductID" id="ProductID" value="1"/>  
                        <input type="hidden" name="CustID" id="CustID" value="<?php echo $_GET['CustID'] ?>"/>  
                    </div>
                </div>
                </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>    
    </section>
    


<div class="message_box" style="margin:10px 0px;">
<?php 
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "jerseyshoredb"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
mysqli_close($con);?></div>



</body>
</html>