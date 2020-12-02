<?php

session_start();

include('config.php');

if(isset($_SESSION['logged_in'])) {

    if($_SESSION['logged_in'] != 1) {

        header("Location: home.php");

    }

} else if (!isset($_SESSION['logged_in'])) {

    header("Location: home.php");

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

<style>

.send-hover:hover {
	color: #4158d0;
}

.receive-hover:hover {
	color: #c850c0;
}

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="display:block; padding: 30px 50px 35px 50px;">
					<div style="text-align:center">
						<a href="index.php">
							<h2 style="color:#212529">Secure P2P File Sharing Service</h2>
						</a>
					</div>
				<hr style="color:black;background-color:black;height:2px;">
				<div style="padding: 0 0 10px 0;">
					<div style="float:left">
                        <a class="txt1" href="profile.php" style="color:black;">
							<h6><?php echo "Welcome: <b>${_SESSION['username']}</b> [${_SESSION['userid']}]"; ?></h6>
                        </a>
					</div>
					<div style="float:right">
                        <a class="txt1" href="logout.php">
                            <h6>Logout
							<i class="fa fa-sign-out m-l-5" aria-hidden="true"></i>
							</h6>
                        </a>
					</div>
				</div>
				<hr style="color:black;background-color:black;height:2px;">
				<div>
					<div style="margin-left:auto; margin-right:auto;">
						<a href="send.php" class="send-hover">
							<div style="float:left; padding-left:100px; padding-top:20px; text-align:center;">
								<i class="fa fa-upload" style="font-size:12em; border: 3px dotted black; padding: 7px;" aria-hidden="true"></i>
								<br><br><h5>SHARE</h5>
							</div>
						</a>
						<a href="receive.php" class="receive-hover">
							<div style="float:right; padding-right:100px; padding-top:20px; text-align:center;">
								<i class="fa fa-download m-l-5" style="font-size: 12em; border: 3px dotted black; padding: 7px;" aria-hidden="true"></i>
								<br><br><h5>RECEIVE</h5>
							</div>
						</a>
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
