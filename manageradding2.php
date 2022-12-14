<?php
$hostName= 'localhost';
$authName= 'root';
$pass='';
$dbname= 'jerseyshoredb';

$conn=new mysqli($hostName,$authName,$pass,$dbname);

 $pwd = $_POST['Password'];
 $encrypted_pwd = md5($pwd);
 $username = $_POST['Login_ID']; 
 $fname = $_POST['First_Name'];
 $lname = $_POST['Last_Name'];
 $email = $_POST['Email'];

 $employee = $_POST['Manager_ID'];
 
  if (!stripslashes_deep($lname)) {
   
    $lname = addslashes($lname);
  }
  if (!stripslashes_deep($fname))
  {
    $fname = addslashes($fname);
  }
  if (!stripslashes_deep($email))
  {
    $email = addslashes($email);
  }
  if (!stripslashes_deep($email))
  {
    $username = addslashes($username);
  }
  
 
  function stripslashes_deep($value)
  {
      $value = is_array($value) ?
                  array_map('stripslashes_deep', $value) :
                  stripslashes($value);
  
      return $value;
  }
 
 $insert ="INSERT into Employee ( First_Name, Last_Name, Employee_ID, Email,  Login_ID, Password,Is_Manager) 
 VALUES  ('$fname', '$lname', '$employee', '$email',   '$username', '$encrypted_pwd',1)";
 if($conn->query($insert)){
  echo 'You have entered a manager';
 }
 else{
  echo 'Error '.$conn->error;  
 }





?>