<html>
<head>
  <title>Jersey Shore Furniture Entry Results</title>
  <style>
       a:link, a:visited {
  background-color:  #33adff;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #66c2ff;
} 
      
      
  </style>
</head>
<body>
<h1>Jersey Shore Furniture Entry Results</h1>
<?php
require("include/function.php");
$bdefined = false;
  // create short variable names
  if(isset($_POST['Name']))
  {
  $Name=$_POST['Name'];
  $bdefined = true;
  }
if (isset($_POST['Brand'])) {
  $bdefined = true;
  $Brand = $_POST['Brand'];
}
if (isset($_POST['Price'])) {
  $bdefined = true;
  $Price = $_POST['Price'];
}
if (isset($_POST['Product_ID'])) {
  $bdefined = true;
  $Product_ID = $_POST['Product_ID'];
}
if (isset($_POST['Category'])) {
  
  $bdefined = true;
  $Category = $_POST['Category'];
}
if (isset($_POST['Quantity'])) {
  $bdefined = true;
  $Quantity = $_POST['Quantity'];
}
if (isset($_POST['Images'])) {
  $bdefined = true;
  $Images = $_POST['Images'];
}

if ($bdefined == true) {
  if (!$Name || !$Brand || !$Price || !$Product_ID || !$Category || !$Quantity || !$Images) {
    echo "You have not entered all the required details.<br />"
      . "Please go back and try again.";
    exit;
  }



  if (!stripslashes_deep($Name)) {
    $Name = addslashes($Name);
  }
  if (!stripslashes_deep($Brand)) {
    $Brand = addslashes($Brand);
  }
  if (!stripslashes_deep($Price)) {
    $Price = doubleval($Price);
  }
  if (!stripslashes_deep($Product_ID)) {
    $Product_ID = addslashes($Product_ID);
  }
  if (!stripslashes_deep($Category)) {
    $Category = addslashes($Category);
  }
  if (!stripslashes_deep($Quantity)) {
    $Quantity = addslashes($Quantity);
  }
  if (!stripslashes_deep($Images)) {
    $Images = addslashes($Images);
  }
  $query = "insert into Product (Name,Brand,Price,Product_ID,Category,Quantity,Images) values
  ('" . $Name . "', '" . $Brand . "', '" . $Price . "','" . $Product_ID . "', '" . $Category . "','" . $Quantity . "','" . $Images . "')";

  @$db = new mysqli('localhost', 'root', '', 'jerseyshoredb');

  if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
  }


  $result = $db->query($query);

  if ($result) {
    echo $db->affected_rows . " product inserted into database.";
  } else {
    echo "An error has occurred.  The item was not added.";
  }


  $db->close();
}


?>
 <br>
 <br>
 <br>
     <a href="productIP.html" target="_blank">Insert Another</a>
     <a href="home.php" target="_blank">Return</a>
       <br>
</body>
</html>