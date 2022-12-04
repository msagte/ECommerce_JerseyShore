<?php
session_start();
$host = "localhost"; 
$user = "root";
$pass = "";
$db = "Esports_Website";

if(!$conn = mysqli_connect($host,$user,$pass,$db))
{
    die("falied to connect");
}
$status = 0; 
$First_Name = ''; 
$Last_Name = ''; 


if(isset($_POST["Login_ID"])) { // check if person submitted form
  
  	// save post to variables
	$Login_ID=$_POST["Login_ID"];
	$Password=md5($_POST["Password"]);
 
  
  // build sql
	$sql = "SELECT First_Name,Last_Name FROM Customer WHERE Login_ID='".$Login_ID."' AND Password='".$Password."' ";
   //var_dump($sql); 
  
  // run sql
  if($result = mysqli_query($conn, $sql)) {
    
    
        if(mysqli_num_rows($result)==1) { // if we have a record, then do what follows...
        $_SESSION['cuname'] = $Login_ID;
        //var_dump($Login_ID); exit;

          $row = mysqli_fetch_array($result); // save results to $row
          $First_Name = $row['First_Name'];
          $Last_Name = $row['Last_Name'];
          
		  // show user that is logged in          
          echo $First_Name; echo "&nbsp"; echo $Last_Name;
        } else {
              // redirect to error screen
              header("Location: CustomerLogin.php?error=true");
   			  exit(); 
        }
  }
  
}
?>

<!DOCTYPE html>
<html>
    <head>  
    <title>Login</title>  
            <style type="text/css">
                h1  {text-align: center;}
                h2  {text-align: center;}
                
         .button {
             background-color: #1a8cff;
             color: white;
             padding: 14px 20px;
             margin: 8px 0;
             border: none;
             cursor: pointer;
             width: 25px;
             opacity: 0.9;
}
                  a:link, a:visited {
  background-color:  #33adff;
  color: white;
  padding: 20px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #66c2ff;
}          
                
                
                
            </style>
    </head>
    <body>    
        <h1>Jersey Shore Sports Customer Home Portal </h1>
      
      <table border = "0" cellpadding="10" cellspacing="10" class="center" height="325px"  style="width:100%">
     <tr>
         <td> <a href="Home.html" ><p>Home Page</p> </a> </td>
         <td>  <a href="cartpage.php" ><p>Cart Page</p> </a> </td>
     </tr>    
     
     <tr>
         <td><a href="logout.php" ><p>Logout</p> </a></td>
         <td><a href="orderhistory.php" ><p>Oder History</p></td>
     </tr>

</table>

</body>
</html>


