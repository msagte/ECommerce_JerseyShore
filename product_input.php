<html>
<head>
  <title>Jersey Shore Sports Entry Results</title>
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
<h1>Jersey Shore Sports Entry Results</h1>
<?php
  // create short variable names
  $Name=$_POST['Name'];
  $Brand=$_POST['Brand'];
  $Price=$_POST['Price'];
  $Product_ID=$_POST['Product_ID'];
  $Category=$_POST['Category'];
  $Quantity=$_POST['Quantity'];
  $Images=$_POST['Images'];
  

  if (!$Name || !$Brand || !$Price || !$Product_ID || !$Category || !$Quantity || !$Images ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $Name = addslashes($Name);
    $Brand = addslashes($Brand);
    $Price = doubleval($Price);
    $Product_ID = addslashes($Product_ID);
    $Category = addslashes($Category);
    $Quantity = addslashes($Quantity);
    $Images = addslashes($Images);
  }

  @ $db = new mysqli('localhost', 'root', '', 'esports_website');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into Product values
            ('".$Name."', '".$Brand."', '".$Price."','".$Product_ID."', '".$Category."','".$Quantity."','".$Images."')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." product inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }
  

  $db->close();
?>
 <br>
 <br>
 <br>
     <a href="productIP.html" target="_blank">Insert Another</a>
     <a href="home.php" target="_blank">Return</a>
       <br>
</body>
</html>
