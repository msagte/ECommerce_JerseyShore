<?php

include "config.php";


$hostName= 'localhost';
$authName= 'root';
$pass='';
$dbname= 'jerseyshoredb';
$empID = "";
$pass =  "";
$fName = "";
$lName = "";
$eEmail = "";
$checked = "";
$loginId = "";
$disabled = "";

$conn=new mysqli($hostName,$authName,$pass,$dbname);
require('include/function.php');


if (isset($_POST['Password']) && !empty($_POST['Password'])) {

  $password = $_POST['Password'];
  $validPwd = true;

  // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  $manager = "";

  $tempID = $_POST['updateId'];

  if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")
    window.location.href="employee_adding.php?empID='.$tempID .'"</script>';
    $validPwd = false;
  }

  if ($validPwd) {
    $encrypted_pwd = md5($password);
    $username = $_POST['Login_ID'];
    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $email = $_POST['Email'];
    if (is_null($_POST['manager']))
      $manager = 0; 
    else
      $manager = 1;

    $employee = $_POST['updateId'];

    if (!stripslashes_deep($lname)) {

      $lname = addslashes($lname);
    }
    if (!stripslashes_deep($fname)) {
      $fname = addslashes($fname);
    }
    if (!stripslashes_deep($email)) {
      $email = addslashes($email);
    }
    if (!stripslashes_deep($username)) {
      $username = addslashes($username);
    }

    if (!stripslashes_deep($manager)) {
      $manager = addslashes($manager);
    }

    if (isset($_POST['updateId']) && !empty($_POST['updateId'])) {
      $sql_update_Employee = "UPDATE Employee SET Employee_ID='{$employee}',First_Name = '{$fname}',Last_Name = '{$lname}',email = '{$email}',Login_ID='{$username}',PASSWORD='{$encrypted_pwd}',
        Is_Manager = '{$manager}' WHERE Employee_ID ='{$employee}'";

    if(mysqli_query($con, $sql_update_Employee))
    {
      echo '<script>alert("Employee Updated successfully")
      window.location.href="ManageEmployees.php"
      </script>';
    }

    } else {


      $insert = "INSERT into Employee ( First_Name, Last_Name, Employee_ID, Email, Login_ID , Password, Is_Manager) 
 VALUES  ('$fname', '$lname', '$employee', '$email',   '$username', '$encrypted_pwd',$manager)";
      if ($conn->query($insert)) {
        echo 'You have entered an employee';
      } else {
        echo 'Error ' . $conn->error;
      }

      echo '<script>alert("Employee Added Succesfully")
    window.location.href="ManageEmployees.php"
    </script>';
    }
  }

}



if (isset($_GET['empID']) && !empty($_GET['empID'])) {

  $employeeSQL = "SELECT employee_id,PASSWORD,FIRST_name,Last_name,email,Login_ID,Is_Manager 
   FROM Employee WHERE Employee_ID ='{$_GET['empID']}'";
  ;

  $query_result = mysqli_query($con, $employeeSQL);
  while ($row = mysqli_fetch_assoc($query_result)) {
    $empID = $row['employee_id'];
    $disabled = "disabled";
    $pass = $row['PASSWORD'];
    $fName = $row['FIRST_name'];
    $lName = $row['Last_name'];
    $eEmail = $row['email'];
    $loginId = $row['Login_ID'];
    if ($row['Is_Manager'] == 1) {
      $checked = "checked";
    }

  }


}

?>
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
  <form class="modal-content" action="employee_adding.php" method="post">
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
                    <?php if (isset($_GET['empID']) && !empty($_GET['empID'])) { ?>
                      <h2 class="fw-bold mb-5">Update Employee</h2>
                      <?php } else {  ?>
          <h2 class="fw-bold mb-5">Insert Employee</h2>
          <?php } ?>
          <form>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">                 
                  <input type="text" id="First_Name" class="form-control" placeholder="Enter First Name" name="First_Name" maxlength="60" size="30" 
                    value="<?php echo $fName ?>" required/>                    
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text"  id="Last_Name" class="form-control"  placeholder="Enter Last Name" name="Last_Name" maxlength="60" size="30"
                  value="<?php echo $lName ?>" required/>
                </div>
              </div>
            </div>

            <div class="row">
            <!-- Email input -->
            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="number" id="Employee_ID" class="form-control" placeholder="Enter Employee ID" name="Employee_ID" maxlength="60" size="30" 
              value="<?php echo $empID ?>" <?php echo $disabled ?>  required/>
            </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="form-outline">
              <input type="Email" placeholder="Enter Employee Email" name="Email" maxlength="30" size="25"  class="form-control" id="Email" 
              value="<?php echo $eEmail ?>"  required />
            </div>
            </div>
          </div>
            
          
            <div class="row">
            <!-- Password input -->
            <div class="col-md-6 mb-4"">
              <div class="form-outline">
                <input type="text" id="Login_ID" class="form-control" placeholder="Enter Login ID" name="Login_ID" maxlength="20" size="20" 
                value="<?php echo $loginId ?>"  required>
            </div>
            </div>
          
            <div class="col-md-6 mb-4"">
              <div class="form-outline">
                <input type="password" id="Password" class="form-control" placeholder="Enter Password" name="Password" maxlength="60" size="30" 
                value="<?php echo $pass ?>"   required>
            </div>
            </div>
          </div>
          
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="Y" name="manager" id="manager" checked="<?php echo $checked ?>" />
              <label class="form-check-label" for="manager">
                Manager ?
              </label>
            </div>
            
            <?php if (isset($_GET['empID']) && !empty($_GET['empID'])) { ?>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Update Employee
            </button>
            <input type ="hidden" name ="updateId" value="<?php echo $_GET['empID']; ?>" />
            <?php } else { ?>
              <button type="submit" class="btn btn-primary btn-block mb-4">
              Add Employee
            </button>
            <?php } ?>
            <button type="button" onclick="window.location='ManageEmployees.php';" class="btn btn-primary btn-block mb-4">
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
</body>
</html>
  <!-- <h1>Jersey Shore Furniture - New Employee Entry</h1>

  <form action="employee_adding.php" method="post">
    <table border="0">
      <tr>
        <td>First Name</td>
         <td><input type="text" name="First_Name" maxlength="30" size="18"></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td> <input type="text" name="Last_Name" maxlength="40" size="30"></td>
      </tr>
      <tr>
        <td>Employee ID</td>
        <td> <input type="text" name="Employee_ID" maxlength="60" size="30"></td>
      </tr>
    
      <tr>
        <td>Email</td>
        <td><input type="text" name="Email" maxlength="30" size="25"></td>
      </tr>
      <tr>
        <td>Login ID</td>
        <td><input type="text" name="Login_ID" maxlength="10" size="20"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="Password" name="Password" maxlength="15" size="20"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Register"></td>
        
      </tr>
    </table>
  </form> -->
  
</body>
</html>
