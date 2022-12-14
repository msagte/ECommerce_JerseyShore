<html>
<head>
  <title>Jersey Shore Furniture Delete Employee Results</title>
</head>
<body>
<h1>Jersey Shore Furniture Delete Employee Results</h1>
<?php
  // create short variable names
 
  $Employee_ID=$_POST['Employee_ID'];
 
  

  if ( !$Employee_ID  ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!stripslashes_deep($Employee_ID)) {
   
    $Employee_ID = addslashes($Employee_ID);
    
  }

  @ $db = new mysqli('localhost', 'root', '', 'jerseyshoredb');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
$query = "DELETE FROM Employee WHERE Employee_ID='$Employee_ID'"
;
  $result = $db->query($query);



  if ($result) {
      echo  $db->affected_rows." employee  deleted from database.";
  } else {
  	  echo "An error has occurred.  The employee was not deleted.";
  }

  $db->close();
?>
</body>
</html>
