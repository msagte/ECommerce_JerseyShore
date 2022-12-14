<html>
<head>
  <title>Jersey Shore Furniture Entry Results</title>
</head>
<body>
<h1>Jersey Shore Furniture Entry Results</h1>
<?php
  // create short variable names
  require('include/function.php');
  $Product_ID=$_POST['Product_ID'];
 
  

  if ( !$Product_ID  ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!stripslashes_deep($Product_ID)) {
   
    $Product_ID = addslashes($Product_ID);
    
  }

  @ $db = new mysqli('localhost', 'root', '', 'jerseyshoredb');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
$query = "DELETE FROM Product WHERE Product_ID='$Product_ID'";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." product deleted into database.";
  } else {
  	  echo "An error has occurred.  The item was not deleted.";
  }

  $db->close();
?>
</body>
</html>
