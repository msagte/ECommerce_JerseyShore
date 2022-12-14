<html>
<head>
  <title>Jersey Shore Furniture Customer sign up Entry Results</title>
</head>
<body>
<h1>Jersey Shore Furniture Customer sign up Entry Results</h1>
<?php
require("include/function.php");
  // create short variable names

  $Password=$_POST['Password'];
  $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
  


  if (!$First_Name || !$Last_Name || !$Email || !$Address || !$Phone_Number || !$Login_ID || !$Password ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!stripslashes_deep($First_Name)) {
    $First_Name = addslashes($First_Name);
  }
  if (!stripslashes_deep($Last_Name)) {
    $Last_Name = addslashes($Last_Name);
  }
  if (!stripslashes_deep($Email)) {
    $Employee_ID = addslashes($Email);
  }
  if (!stripslashes_deep($Address)) {
    $Address = addslashes($Address);
  }
  if (!stripslashes_deep($Phone_Number)) {
    $Phone_Number = addslashes($Phone_Number);
  }
  if (!stripslashes_deep($Login_ID)) {
    $Login_ID = addslashes($Login_ID);
  }
  if (!stripslashes_deep($Password)) {
    $Password = addslashes($Password);
  }
    

   
  }

  @ $db = new mysqli('localhost', 'root', '', 'jerseyshoredb');
    

  if (mysqli_connect_errno()) {
     echo "Error: Could not sign you up.  Please try again later.";
     exit;
    
  }
  
 $query = "insert into Customer values
            ('".$First_Name."', '".$Last_Name."','".$Email."', '".$Address."','".$Phone_Number."', '".$Login_ID."','".$Password."')";
  
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." You have been signed up!!!.";
  } else {
  	  echo "An error has occurred. You have not been signed up.";
  }
  


  $db->close();
?>
</body>
</html>
