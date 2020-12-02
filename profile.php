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

if(isset($_POST['oldpassword']) and isset($_POST['newpassword'])) {
	
	$userid = $_SESSION['userid'];
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];

	$query = "select * from users where userid='${userid}' and password=md5('${oldpassword}')";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) > 0) {

		$updatequery = "update users set password=md5('${newpassword}') where userid='${userid}' and password=md5('${oldpassword}')";
		$updateresult = mysqli_query($conn, $updatequery);

		if($updateresult) {

			$success = "Password has been updated!";
		
		} else {

			$error = "Password Change failed!";

		}

	} else {

		$error = "Wrong old password!";

	}

}

$userid = $_SESSION['userid'];
$query = "select * from files where receiverid='${userid}' or senderid='${userid}'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {

	$count = mysqli_num_rows($result);

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
	color: #c850c0;
}

.receive-hover:hover {
	color: #4158d0;
}

.form-button-color {
	background: #9053c7;
}

.form-button-color:hover {
	background: #5b57cd;
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
					<div style="float:left; padding-right:10px;">
                        <a class="txt1" href="index.php">
							<i class="fa fa-angle-double-left m-l-5" style="font-size:17px;"aria-hidden="true"></i>
                        </a>
					</div>
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

						<div style="float:left">
							<div style="padding-left:20px; padding-top:20px; text-align:center; width:150%;">

<?php

if(isset($error)) {

    echo  "
                    <div class=\"text-center p-t-136\" style='padding:0 0 20px 0;'>
                        <span class=\"txt1\" style=\"color:red;\">
                            ${error}
                        </span>
                    </div>
            ";

} else if(isset($success)) {

    echo  "
                    <div class=\"text-center p-t-136\" style='padding:0 0 20px 0;'>
                        <span class=\"txt1\" style=\"color:green;\">
                            ${success}
                        </span>
                    </div>
            ";

}

?>

								<div class="text-center p-t-136" style="padding:20px">
									<span class="txt1" style="color:black;">
										<h5>TRANSFER HISTORY</h5><br>
									</span>
								</div>

								<div>
									<ul class="list-group">
<?php

for($i = 0; $i < $count; $i++) {

	$row = mysqli_fetch_assoc($result);
	$filepath = $row['filepath'];
	$filename = $row['filename'];
	$senderid = $row['senderid'];
	$receiverid = $row['receiverid'];
	if($receiverid == $userid) {

		$html = "<li class=\"list-group-item list-group-item-action\">";
		$html .= "${filename} sent by ${senderid}</li>"; 

	} else {

		$html = "<li class=\"list-group-item list-group-item-action\">";
		$html .= "${filename} sent to ${senderid}</li>"; 
	
	}

	echo $html;

}

?>
									</ul>
								</div>
							</div>
						</div>

						<div style="float:right">
							<div style="padding-top:20px; padding-right:25px; text-align:center;">
								<i class="fa fa-user" style="font-size:12em; border: 3px dotted black; padding: 7px;" aria-hidden="true"></i><br><br>
								<form action="profile.php" method="post" enctype="multipart/form-data">
									<div class="wrap-input100 validate-input" data-validate = "Old Password is mandatory">
										<input class="input100" type="password" name="oldpassword" placeholder="Old Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-user" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-validate = "New Password is mandatory">
										<input class="input100" type="password" name="newpassword" placeholder="New Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-user" aria-hidden="true"></i>
										</span>
									</div>
									<div class="container-login100-form-btn">
										<button class="login100-form-btn form-button-color">
											Change Password	
										</button>
									</div>
								</form>
							</div>
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
