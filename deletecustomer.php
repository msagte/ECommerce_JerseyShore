<html>
<head>
  <title>Classic Shave Delete Customer</title>
</head>
<body>
<h1>Classic Shave Delete Customer</h1>
<?php
  // create short variable names
 
  $First_Name=$_POST['First_Name'];
  $Last_Name=$_POST['Last_Name'];
 
  

  if ( !$First_Name || !$Last_Name ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
   
    $First_Name = addslashes($First_Name);
    $Last_Name = addslashes($Last_Name);
    
  }

  @ $db = new mysqli('localhost', 'grammaa2_aldo', 'Grammatica101!!', 'grammaa2_Classic_Shave_database');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
$query = "DELETE FROM Customer WHERE First_Name='$First_Name'AND Last_Name='$Last_Name'"
;
  $result = $db->query($query);



  if ($result) {
      echo  $db->affected_rows." Customer deleted from database.";
  } else {
  	  echo "An error has occurred.  The Customer was not deleted.";
  }

  $db->close();
?>
</body>
</html>
