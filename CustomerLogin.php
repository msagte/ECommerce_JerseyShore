
<?php


unset($_SESSION['cuname']);
if (isset($_POST['cuname'])) {
    
   // if ($_SESSION['cuname'] == '') {
     //   echo ('you are logged out');
    //}
	
echo ('you are logged out');
}


?>
<!DOCTYPE html>
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

    <body>
	<div class="container-fluid vh-70" style="margin-top:50px">
        <div class="" style="margin-top:50px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
						<img src="pictures/Homelogo.png"
                    style="width: 185px;" alt="logo">
                            <h3 class="text-primary">Customer Sign In</h3>
                        </div>
                <form method="post" class="modal-content" action="customerhome.php">


					<?php if (isset($_GET['error'])) {
	                    if ($_GET['error'] == "true") { ?>
					<div class="col-sm-12 text-align--center error">Invalid Username and Password Combination</div>
					<?php }
                    } ?>
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" name="Login_ID" id="Login_ID" placeholder="Login ID" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
                                </div>
                                <div class="col-md-12 text-center">
                                <button class="btn btn-primary text-center mt-2" type="submit">
                                    Login
                                </button></div>
                                <p class="text-center mt-5">Don't have an account?									
                                    <span class="text-primary"><a href="signup2.html">Sign up</a></span>
                                </p>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>