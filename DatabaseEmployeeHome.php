<?php
session_start();
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: DatabaseEmployeeview.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: page.php');
}
?>
<!doctype html>
<html>
    <head>
        <style>
            a:link, a:visited { background-color:  #33adff;
                                color: white;
                                padding: 14px 25px;
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
        
         
 
     <h2>Product Insert</h2>
     <a href="form.php" target="_blank">Add Product</a>
       <br>
     <h2>Product Delete</h2>
        <a href="productdelete.html" target="_blank">Delete Product</a>
        <br>
         <h2>Insert Employee</h2>
        <a href="Employee_insert.html" target="_blank">Add Employee</a>
          <br>
         <h2>Delete Employee</h2>
        <a href="Employee_Deletes.html" target="_blank">Delete Employee</a>
        <h2>Insert Manager</h2>
     <a href="inputManager1.html" target="_blank">Add Manager</a>
       <br>
     <h2>Delete Manager</h2>
        <a href="productdelete.html" target="_blank">Delete Manager</a>
        <br>
            <h2>Insert Customer</h2>
     <a href="inputcustomer1.html" target="_blank">Add Customer</a>
       <br>
     <h2>Delete Customer</h2>
        <a href="productdelete.html" target="_blank">Delete Customer</a>
        <br>
        
            <form method='post' action="">
                <br>
                <br>
            <input type="submit" value="Logout" name="but_logout">
        </form>
        
        
       
    </body>
</html>