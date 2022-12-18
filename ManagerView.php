<?php
include "config.php";

if(isset($_POST['but1_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt1_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt1_pwd']);


    if ($uname != "" && $password != ""){
        $sql_query = "select count(*) as cntUser,Employee_ID,CONCAT(First_Name , ' ' , Last_Name) 'Name' from Employee where Login_ID='".$uname."' and Password='".md5($password)."' and Is_Manager=1 group by Employee_ID,First_Name,Last_Name";
        
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['EmpName'] = $row['Name'];
            $_SESSION["Emp_ID"] = $row['Employee_ID'];
            header('Location: product_Management.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>

<html>
    <head>
        <title>Jersey Shore Furniture Login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Manager Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt1_uname" name="txt1_uname" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt1_pwd" name="txt1_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but1_submit" id="but1_submit" />
                    </div>
                </div>
            </form>
        <a href="CustomerLogin.php" ><p>Main Log in</p> </a>
        </div>
  
  
  
    </body>
</html>

