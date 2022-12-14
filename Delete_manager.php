<html>
<head>
  <title>Jersey Shore Furniture Delete Employee Results</title>
</head>
<body>
<h1>Jersey Shore Furniture Delete Employee Results</h1>
<?php
require("include/function.php");
  // create short variable names
 
  $Manager_ID=$_POST['Manager_ID'];
 
  

  if ( !$Manager_ID  ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!stripslashes_deep($Manager_ID) {
   
    $Manager_ID = addslashes($Manager_ID);
    
  }

  @ $db = new mysqli('localhost', 'root', '', 'jerseyshoredb');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
$query = "DELETE FROM Manager WHERE Manager_ID='$Manager_ID'"
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
