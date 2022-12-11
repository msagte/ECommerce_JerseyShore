<?php
require 'config.php';
?>
<html>
    <head>
        <body>       
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="wrwr">
    <div class="path" id="path">
        <a href="customerhome.php"><i class="fa fa-home" aria-hidden="true"></i> Return</a>          
    </div>
  
   
    <div class="col-sm-12">
<table class="table table-striped table-bordered" width="80%">
    <thead>
        <tr class="bg-primary text-white">
            <th>Sr#</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Image</th>       
            <th>Price</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT P.Product_ID,P.Name,B.Brand_Name,P.Price,C.Category_Name,P.Quantity,P.Images FROM product P INNER JOIN category C ON C.Category_ID = P.category_id INNER JOIN brand B ON B.Brand_ID = P.brand_id WHERE 1;";
        $res = mysqli_query($con, $query);
        $i = 1;
        while ($row = mysqli_fetch_assoc($res)) {
            $st = '';
            $cb = '';
            $idd = 0;
            if (isset($row['Product_ID'])) {
                $idd = $row['Product_ID'];
            }
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Brand_Name'];?></td>
            <td><?php echo $row['Category_Name'];?></td>
            <td><img src="Pictures/<?php echo $row['Images']; ?>" alt="product" width="200" height="200" /></td>
            <td align="center"><?php echo $row['Price'];?></td>
            <td align="center">
                <a href="cartpage.php?Product_ID=<?php echo $idd ?>" class="text-primary">Add to Cart</a> 
            </td>
 
        </tr>
        <?php
                    $i++;
                }
                ?>
    </tbody>
</table>
 
</div>               
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
    
    </div>

        </body>
</html>
