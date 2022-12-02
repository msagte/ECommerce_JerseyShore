<?php
$hostName= 'localhost';
$authName= 'grammaa2_aldo';
$pass='Grammatica101!!';
$dbname= 'grammaa2_Classic_Shave_database';

$conn=new mysqli($hostName,$authName,$pass,$dbname);

 $pwd = $_POST['Password'];
 $encrypted_pwd = md5($pwd);
 $username = $_POST['Login_ID']; 
 $fname = $_POST['First_Name'];
 $lname = $_POST['Last_Name'];
 $email = $_POST['Email'];

 $employee = $_POST['Employee_ID'];
 
  if (!get_magic_quotes_gpc()) {
   
   
    $lname = addslashes($lname);
    $fname = addslashes($fname);
    $email = addslashes($email);
    $username = addslashes($username);
  }
 
 
 
 
 $insert ="INSERT into Employee ( First_Name, Last_Name, Employee_ID, Email,    , Password) 
 VALUES  ('$fname', '$lname', '$employee', '$email',   '$username', '$encrypted_pwd')";
 if($conn->query($insert)){
  echo 'You have entered an employee';
 }
 else{
  echo 'Error '.$conn->error;  
 }





?>