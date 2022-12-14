<?php
session_start ();
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
 $address = $_POST['Address'];
 $phone = $_POST['Phone_Number'];
 
 
 
 $insert ="INSERT into Customer ( First_Name, Last_Name, Email, Address, Phone_Number, Login_ID, Password) 
 VALUES  ('$fname', '$lname', '$email', '$address', '$phone', '$username', '$encrypted_pwd')";
 if($conn->query($insert)){
  echo 'You have been signed up';
 }
 else{
  echo 'Error '.$conn->error;  
 }

?>

<a href="CustomerLogin.php" ><p>Log in</p> </a>