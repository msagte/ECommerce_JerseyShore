<html>
<head>
  <title>Jersey Shore Furniture - Add Employee</title>
 
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up !</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

</head>

<body>
  <!-- Section: Design Block -->
  <form class="modal-content" action="employeesignup.php" method="post">
<section class="text-center">
  <!-- Background image -->
  
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <img src="pictures/Homelogo.png"
                    style="width: 185px;" alt="logo">
          <h2 class="fw-bold mb-5">Add New Employee</h2>
          <form>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">                 
                  <input type="text" id="First_Name" class="form-control" placeholder="First Name" name="First_Name" maxlength="60" size="30" required/>                    
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text"  id="Last_Name" class="form-control"  placeholder="Last Name" name="Last_Name" maxlength="60" size="30" required/>
                </div>
              </div>
            </div>

            <div class="row">
            <!-- Email input -->
            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="email" id="Email" class="form-control" placeholder="Email Address" name="Email" maxlength="60" size="30" required/>
            </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="number" placeholder="Phone number" name="Employee ID" maxlength="30" size="25" pattern="[7-9]{1}[0-9]{9}"   class="form-control" id="Phone_Number" required />
            </div>
            </div>
          </div>
          
            <div class="row">
            <!-- Password input -->
            <div class="col-md-6 mb-4"">
              <div class="form-outline">
                <input type="text" id="Login_ID" class="form-control" placeholder="Login ID" name="Login_ID" maxlength="20" size="20" required>
            </div>
            </div>
          
            <div class="col-md-6 mb-4"">
              <div class="form-outline">
                <input type="password" id="Password" class="form-control" placeholder="Password" name="Password" maxlength="60" size="30" required>
            </div>
            </div>
          </div>
          
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
              <label class="form-check-label" for="form2Example33">
                Subscribe to our newsletter
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Add Employee
            </button>
            <button type="button" onclick="window.location='CustomerLogin.php';" class="btn btn-primary btn-block mb-4">
              Return
            </button>
            <!-- Register buttons -->
            <div class="text-center">              
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<!--   
<div id="id01" class="modal">
  
  <form class="modal-content" action="signup3.php" method="post">
    <div class="s"><center><h1>Jersey Shore Furniture - SIGN UP</h1></center></div>
<div class="container">
     <div class="clearfix">
    <table border="0">
      <tr>
        <td>First Name</td>
         <td><input type="text" placeholder="Enter First Name" name="First_Name" maxlength="30" size="18"></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td> <input type="text" placeholder="Enter Last Name" name="Last_Name" maxlength="40" size="30"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td> <input type="text" placeholder="Enter Email" name="Email" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td> <input type="text" placeholder="Enter Address" name="Address" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td><input type="text" placeholder="Enter Phone Number" name="Phone_Number" maxlength="30" size="25"></td>
      </tr>
      <tr>
        <td>Login ID</td>
        <td><input type="text"  placeholder="Enter Login ID" name="Login_ID" maxlength="20" size="20"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" placeholder="Enter Password" name="Password" maxlength="30" size="20"></td>
      </tr>
      
      <tr>
  
     <td>  <button type="submit" class="signupbtn">Sign Up</button></td>
      <td><a href="CustomerLogin.php">Return</a></td>
      </tr>
      
    </table>
    </div>
    </div>
  </form>
  </div> -->
</body>
</html>
