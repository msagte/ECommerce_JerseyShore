<?php
$hostName= 'localhost';
$authName= 'root';
$pass='';
$dbname= 'esports_website';

$conn=new mysqli($hostName,$authName,$pass,$dbname);

 $pwd = $_POST['Password'];
 $encrypted_pwd = md5($pwd);
 $username = $_POST['Login_ID']; 
 $fname = $_POST['First_Name'];
 $lname = $_POST['Last_Name'];
 $email = $_POST['Email'];

 $employee = $_POST['Manager_ID'];
 
  if (!get_magic_quotes_gpc()) {
   
    $lname = addslashes($lname);
    $fname = addslashes($fname);
    $email = addslashes($email);
    $username = addslashes($username);
  }
 
 
 
 $insert ="INSERT into Employee ( First_Name, Last_Name, Manager_ID, Email,  Login_ID, Password,Is_Manager) 
 VALUES  ('$fname', '$lname', '$employee', '$email',   '$username', '$encrypted_pwd',1)";
 if($conn->query($insert)){
  echo 'You have entered a manager';
 }
 else{
  echo 'Error '.$conn->error;  
 }





?>