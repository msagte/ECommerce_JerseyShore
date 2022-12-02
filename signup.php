<html>
<head>
  <title>Classic Shave Customer sign up Entry Results</title>
</head>
<body>
<h1>Classic Shave Customer sign up Entry Results</h1>
<?php
  // create short variable names

  $Password=$_POST['Password'];
  $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
  


  if (!$First_Name || !$Last_Name || !$Email || !$Address || !$Phone_Number || !$Login_ID || !$Password ) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $First_Name = addslashes($First_Name);
    $Last_Name = addslashes($Last_Name);
    $Employee_ID = addslashes($Email);
    $Address = addslashes($Address);
    $Phone_Number = addslashes($Phone_Number);
    $Login_ID = addslashes($Login_ID);
    $Password = addslashes($Password);
    

   
  }

  @ $db = new mysqli('localhost', 'grammaa2_aldo', 'Grammatica101!!', 'grammaa2_Classic_Shave_database');
    

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
