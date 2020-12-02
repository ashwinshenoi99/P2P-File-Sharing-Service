<?php

session_start();

include('config.php');

if(isset($_SESSION['logged_in'])) {

	if($_SESSION['logged_in'] == 1) {

		header("Location: index.php");
	
	}

} 

?>

<html lang="en">
<head>
	<title>Secure P2P File Sharing Service</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="padding: 50px 100px 35px 100px;">
				<div style="margin-left:auto; margin-right:auto;">
					<h2>Secure P2P File Sharing Service</h2>
					<div class="login100-pic js-tilt" style="margin-left:auto; margin-right:auto; padding: 30px;" data-tilt>
						<img src="images/logo.jpg" alt="IMG">
					</div>
					<div> 
						<div style="float:left">
							<a class="txt2" href="register.php">
								<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
								Register
							</a>
						</div>
						<div style="float:right">
							<a class="txt2" href="login.php">
								Login
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
