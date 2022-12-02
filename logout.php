<?php
session_start();

unset($_SESSION['cuname']);

if($_SESSION['cuname']==''){
    echo('you are logged out');
}


?>

<a href="CustomerLogin.php" ><p>Log In</p> </a> 