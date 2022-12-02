<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Classic Shave Customer Login</title>
	<style type="text/css">
		div {
			text-align: center;
		}

		h1 {
			text-align: center;
		}

		h2 {
			text-align: center;
		}

		body {
			Background-color: #66b3ff;
		}


		.s {
			font-family: 'Brush Script MT', cursive;
			font-size: 30px;
		}

		form {
			text-align: center;
		}

		.modal-content {
			background-color: white;
			margin: 5% auto 15% auto;
			border: 1px solid #888;
			width: 80%;
		}


		.modal {

			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: #80bfff;
			padding-top: 50px;
		}
	</style>
</head>

<body>
	<div id="id01" class="modal">

		<div class="login">
			<form method="post" class="modal-content" action="customerhome.php">


					<?php if ($_GET['error']=="true") { ?>
					<p class="error">Incorrect username or password</p>
					<?php } ?>
					<div class="s">
						<h1>Classic Shave Customer Login</h1>
						
						<label><b>Login ID</b></label>
						<input type="text" name="Login_ID" id="Login_ID" placeholder="Login ID">
						<br><br>
						
						<label><b>Password</b></label>
						<input type="Password" name="Password" id="Password" placeholder="Password">
						<br><br>
						
						<input type="submit" name="login" value="Login">
						<p>Not a member? Sign up to become one.</p>
					</div>
				<a href="signup2.html">Sign up</a>	
				<a href="EmployeePortal.html">for Staff</a>
			</form>
		</div>
	</div>
</body>
</html>