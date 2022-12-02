<?php
session_start ();
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
 $address = $_POST['Address'];
 $phone = $_POST['Phone_Number'];
 
  if (!get_magic_quotes_gpc()) {
   
    $lname = addslashes($lname);
    $fname = addslashes($fname);
    $email = addslashes($email);
    $username = addslashes($username);
  }
 
 
 
 
 $insert ="INSERT into Customer ( First_Name, Last_Name, Email, Address, Phone_Number, Login_ID, Password) 
 VALUES  ('$fname', '$lname', '$email', '$address', '$phone', '$username', '$encrypted_pwd')";
 if($conn->query($insert)){
  echo 'Customer has been added';
 }
 else{
  echo 'Error '.$conn->error;  
 }





?>