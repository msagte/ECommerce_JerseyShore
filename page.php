<?php
session_start();
include "config.php";

if(isset($_POST['but1_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt1_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt1_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from Employee where Login_ID='".$uname."' and Password='".md5($password)."'";
        //var_dump($sql_query); exit;
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<style>
.modal {
    overflow-y: auto;
}
</style>

<body>
    <div class="container-fluid vh-70" style="margin-top:50px">
        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                    <img src="pictures/Homelogo.png"
                style="width: 185px;" alt="logo">
                        <h3 class="text-primary">Employee Sign In</h3>
                    </div>
            <form method="post" class="modal-content" action="home.php">


                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == "true") { ?>
                <p class="error">Incorrect username or password</p>
                <?php }
                } ?>
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" id="txt1_uname" name="txt1_uname"  class="form-control"  placeholder="User Name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                        <input type="password" class="form-control" id="txt1_pwd" name="txt1_pwd" placeholder="Password"/>
                            </div>
                            <div class="col-md-12 text-center">
                            <button class="btn btn-primary text-center mt-2" type="submit">
                                Login
                            </button>
                            <p class="text-center mt-5">Are you a customer?									
                                    <span class="text-primary"><a href="CustomerLogin.php">Log In As Customer</a></span>
                                    <p class="text-center mt-5">Login as Admin?									
                                    <span class="text-primary"><a href="DatabaseEmployeeView.php">Log In As Admin</a></span>
                                </p>   
                            </div>                                                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- <html>
    <head>
        <title>Jersey Shore Sports Login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Employee Login</h1>
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
        <a href="CustomerLogin.php" ><p>Customer Log in</p> </a>
        </div>
  
  
  
    </body>
</html> -->

