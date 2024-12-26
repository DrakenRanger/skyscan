<?php
   session_start();
   if(isset($_SESSION['is_login'])){
   	 echo '<script>
   	    location.href = "home.php";
   	 </script>';
   }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="images/logo/logo.png">
		<!-- BST CSS File -->
		<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
		<!-- Jquery Source File -->
		<script type="text/javascript" src="jquery/jquery.js"></script>
		<!-- OWN CSS File -->
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<!-- Own JS File -->
		<script type="text/javascript" src="js/register.js"></script>
		<title>SkyScan</title>
	</head>
	<body>
		<div class="alert alert-danger fixed-top" role="alert" id="danger_alert">
		</div>
		<div class="alert alert-success fixed-top" role="alert" id="success_alert">
		</div>
		<div class="container pt-5 col-sm-5">
			<div class="d-flex jusify-content-center">
				<div class="p-4 d-flex jusify-content-center shadow-lg p-3 mb-5 bg-info rounded opacity-75">
					<form class="row g-3" id="register_form">
						<div class="col-md-6">
							<label for="inputEmail4" class="form-label">First Name</label>
							<input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
							<span id="fname_err" class="form-text text-danger fw-bold">
							</span>
						</div>
						<div class="col-md-6">
							<label for="inputPassword4" class="form-label">Last Name</label>
							<input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
							<span id="lname_err" class="form-text text-danger fw-bold">
							</span>
						</div>
						<div class="col-md-6">
							<label for="inputEmail4" class="form-label">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Your@example.com">
							<span id="email_err" class="form-text text-danger fw-bold">
							</span>
						</div>
						<div class="col-md-6">
							<label for="inputPassword4" class="form-label">Contact</label>
							<input type="number" name="contact" class="form-control" id="contact">
							<span id="contact_err" class="form-text text-danger fw-bold">
							</span>
						</div>
						<div class="col-12">
							<label for="inputAddress2" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="pass" placeholder="Password">
							<span id="pass_err" class="form-text text-danger fw-bold">
							</span>
						</div>
						<!-- A Message -->
						<span id="passwordHelpInline" class="form-text">
							Must be 8-20 characters long.
						</span>
						<div class="col-md-4">
							<label for="country" class="form-label">Country</label>
							<select id="country" class="form-select" required name="country">
								<option value="" selected id="country-option">Country...</option>
							</select>
						</div>
						<div class="col-md-4">
							<label for="city" class="form-label">City</label>
							<select id="city" class="form-select" required name="city">
								<option value=""  selected id="city-option">City...</option>
							</select>
						</div>
						<div class="col-md-2">
							<label for="inputZip" class="form-label">ISO3</label>
							<input type="text" name="iso3" class="form-control" id="iso3" readonly required>
						</div>
						<div class="d-flex justify-content-center mt-2">
							<button type="button" class="btn btn-link" id="move">Already Have an Account? Login</button>
						</div>
						<input type="hidden" name="status" value="0">
						<div class="d-grid gap-2">
							<button class="btn btn-danger" type="button" id="register">Sign In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- BST JS File -->
		<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
	</body>
</html>