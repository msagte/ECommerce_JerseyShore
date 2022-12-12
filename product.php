<?php
require 'config.php';
?>
<html>
    <head>  
              
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    </head>
    <body> 
    <title>View Products</title>
   <!-- Navbar section -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div>
    <a class="nav-link" href="product.php"> <img  src="pictures/HomeLogo.png" width='200' height='100' /></a>
   </div>
    <div class="container-fluid"></div>
    <div class="container-fluid"></div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
           
                <a class="nav-link" href="product.php"> <img  src="pictures/logout.png" width='20' height='20' /></a>  
                
           
        </div>
    </nav>
    <!-- Sidebar filter section -->

    <section id="sidebar">
    
        <div class="border-bottom pb-2 ml-2">
        <h1 id="burgundy">Filters</h1>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h3 class="font-weight-bold">Categories</h3>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <?php 
            // Connect to database
                $con = mysqli_connect("localhost","root","","esports_website");

                // Get all the categories from category table
                $sql = "SELECT * FROM category";
                    $sqls = "SELECT * FROM brand";
            $all_categories = mysqli_query($con,$sql);
            $all_brands = mysqli_query($con, $sqls);

            while ($category = mysqli_fetch_array(
                $all_categories,MYSQLI_ASSOC)):;
                 ?> 
                <div class="form-group">
                <input type="checkbox" id="<?php echo $category["Category_ID"];?>">
                <label for="breakfast"><?php echo $category["Category_Name"];?></label>
                </div>
                <?php
				    endwhile;?>                                            
            </form>
        </div>
            <div class="py-2 border-bottom ml-3">
            <h3 class="font-weight-bold">Brands</h3>
            <div id="orange"><span class="fa fa-minus"></span></div>
        <form>
            <?php while ($brand = mysqli_fetch_array(
            $all_brands,MYSQLI_ASSOC)):; ?>
            <div class="form-group">
                <input type="checkbox" id="<?php echo $brand["Brand_ID"];?>">
                <label for="tea"><?php echo $brand["Brand_Name"];?></label>
            </div>
                                         
            <?php
				endwhile;?>     
        </form>
        </div>
    
    </section>
    <?php
        $query = "SELECT P.Product_ID,P.Name,B.Brand_Name,P.Price,C.Category_Name,P.Quantity,P.Images FROM product P INNER JOIN category C ON C.Category_ID = P.category_id INNER JOIN brand B ON B.Brand_ID = P.brand_id WHERE 1;";
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
       
            <?php while ($row = mysqli_fetch_assoc($res)) {
                $st = '';
                $cb = '';
                $idd = 0;
                if (isset($row['Product_ID'])) {
                    $idd = $row['Product_ID'];
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
                        <button class="btn w-100 rounded my-2">Add to cart</button>      
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

</body>
</html>
