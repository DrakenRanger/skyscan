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
		<!-- OWN CSS File -->
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- Jquery Source File -->
		<script type="text/javascript" src="jquery/jquery.js"></script>
		<!-- Own JS File -->
		<script type="text/javascript" src="js/login.js"></script>
		<title>SkyScan</title>
	</head>
	<body>
		<div class="alert alert-danger fixed-top" role="alert" id="danger_alert">
		</div>
		<div class="container pt-5 d-flex justify-content-center" id="box">
			<div class="col-sm-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded d-flex opacity-75">
				<div class="col-sm-4 p-3 flex-fill">
					<p id="desc">Welcome to SkyScan, your personal meteorological companion! SkyScan brings you real-time weather updates, precise forecasts, and advanced radar imaging, all at your fingertips. Whether you're planning a weekend getaway, scheduling outdoor activities, or simply staying informed about your daily commute, SkyScan has you covered. With its intuitive interface and comprehensive features, you can effortlessly navigate through current conditions, hourly forecasts, and extended outlooks. Stay ahead of the storm with our customizable alerts and notifications, ensuring you're prepared for any weather event. Trust SkyScan to provide accurate and reliable weather information tailored to your location, keeping you safe and informed in any forecast. Join the SkyScan community today and experience the convenience of staying weather-ready wherever you go.</p>
				</div>
				<div class="col-sm-5 d-flex justify-content-center p-2 flex-grow-1 pt-3">
					<div id="form-box" class="p-5 border-rounded shadow p-3 mb-5 bg-body-tertiary rounded">
						<form id="loginForm">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email address</label>
								<input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>">
							</div>
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Password</label>
								<input type="Password" class="form-control" placeholder="Password" name="pass" value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass']; } ?>">
							</div>
							<div class="d-flex justify-content-between">
								<div class="form-check form-switch mt-2">
									<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="remember">
									<label class="form-check-label fw-bold" for="flexSwitchCheckChecked">Remember Me</label>
								</div>
								<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#check_email_present">Forgot Password?</button>
							</div>
							<br>
							<div class="d-grid gap-2">
								<button class="btn btn-primary" type="button" id="login">LOGIN</button>
							</div>
							<div class="d-flex justify-content-center mt-2">
								<button type="button" class="btn btn-link" id="move">Don't Have Any Account? Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="check_email_present" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Email Verification</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<span id="email_valid_err" class="form-text error text-danger"></span>
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="check_email" placeholder="name@example.com" name="email">
							<label for="floatingInput" class="fw-bold">Email address</label>
						</div>
						<span id="wait" class="form-text error text-success text-center"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="check_email_btn">Check</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal 2 -->
		<div class="modal fade" id="otp_verification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Enter OTP</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<center><span class="form-text error text-success text-center mb-1" id="note">Please Check Your Email..</span></center>
						<span class="form-text error text-success text-center" id="otp_err"></span>
						<input type="hidden" class="form-control" id="otp_email" name="otp_email">
						<div class="form-floating mb-1">
							<input type="number" class="form-control" id="otp" placeholder="Your OTP" name="otp">
							<label for="floatingInput" class="fw-bold">Enter Your OTP</label>
						</div>
						<center>Can't Recieve Any Email? <button type="button" class="btn btn-link" id="resend_otp_user">Resend It</button></center>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="check_otp_valid_btn">Enter</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal 3 -->
		<div class="modal fade" id="update_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Update Password</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form name="updatePass" id="updatePass">
							<input type="hidden" name="email" id="update_pass_email">
							<span id="upd_danger" class="form-text error text-danger"></span>
							<div class="input-group">
								<span class="input-group-text" id="inputGroup-sizing-default">Password</span>
								<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pass" id="pass">
							</div>
							<span id="passwordHelpInline" class="form-text mb-3">
								Must be 8-20 characters long.
							</span>
							<span id="con_pass_err" class="form-text error text-danger"></span>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Confirm Password</span>
								<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="con_pass" id="con_pass">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" id="update_pass_btn">Update</button>
					</div>
				</div>
			</div>
		</div>
		<!-- BST JS File -->
		<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
	</body>
</html>