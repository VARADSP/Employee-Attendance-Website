<?php
include('connection.php');

if(isset($_POST['submit']))
{
	$u = $_REQUEST['username'];
	$e = $_REQUEST['password'];





	if(strcmp($u,'vsp')==0 && strcmp($e,'vsp')==0 ){

    session_start();

    // This is how we'll know the user is logged in
    $_SESSION['logged_in'] = 'yes';




  header('location:dashboard.php');
  }
  else{
    echo "<script type='text/javascript'>alert('Incorrect Details')</script>";
  }

}
?>
<html>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:19 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Login - HRMS admin template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">Company Name</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.html"><img src="assets/img/logo2.png" alt="Focus Technologies"></a>
							</div>
							<form method="post">
								<div class="form-group form-focus">
									<label class="control-label">Username or Email</label>
									<input class="form-control floating" type="text" name="username">
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input class="form-control floating" type="password" name="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit" name="submit">Login</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:19 GMT -->
</html>
