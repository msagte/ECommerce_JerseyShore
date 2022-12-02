<html>
<head>
  <title>Classic Shave Delete Admin Results</title>
</head>
<body>
<h1>Classic Shave Delete Admin Results</h1>
<?php
  // create short variable names
 
  $Database_Worker_ID=$_POST['Database_Worker_ID'];
 
  

  if (!$Database_Worker_ID) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
   
    $Database_Worker_ID = addslashes($Database_Worker_ID);
    
  }

  @ $db = new mysqli('localhost', 'grammaa2_aldo', 'Grammatica101!!', 'grammaa2_Classic_Shave_database');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
$query = "DELETE FROM admin WHERE ID='$Database_Worker_ID'";
  $result = $db->query($query);



  if ($result) {
      echo  $db->affected_rows." Admin deleted from database.";
  } else {
  	  echo "An error has occurred. The Admin was not deleted.";
  }

  $db->close();
?>
</body>
</html>
