<?php
session_start();
$_SESSION['message'] = '';

//Confirm form is submitted
if(isset($_POST['submit'])) {
	
	//Connect to database
	require 'connections/connections.php';
	
	//Insert the values into the database table
	$username = $_POST['username']; 
	$password = $_POST['password'];
	
	$sqli = "SELECT * FROM members WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sqli);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	//If username and password match, then populate database
	if($count==1) {
		$sqli = "INSERT INTO login (username) VALUES ('$username')";
		$result = mysqli_query($conn, $sqli);
		
		//Start some sessions necessary in My Account Profile
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['photo'] = $row['photo'];
		header("Location:admin_database.php");		
	}
	else
	{
		$_SESSION['message'] = "Wrong username/password. Please try again!";
	}		
}
?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, stallion, resources">

    <title>Stallion Gold Resources | Welcome</title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/login_style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/database.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="login-bg">
		<!-- title -->
		<h1>Welcome: Log Into Admin Account</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style">
					<a href="index.html"><img src="images/sgr_user.png" alt="Stallion Gold"></a>
				</div>
				<form action="admin_login.php" method="post">
					<p class="legend">Admin Login Here<span class="fa fa-hand-o-down"></span></p>
					<div style="text-align:center; color:#ff0000; font-size:15px; font-weight:400;"><?= $_SESSION['message'] ?></div>
					<div class="input">
						<input type="text" placeholder="Username" name="username" required />
						<span class="fa fa-user"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Password" name="password" id="myInput" required />
						<span class="fa fa-unlock"></span>
					</div>
					<div class="cats">
						<input type="checkbox" onclick="myFunction()" />
						<a>Show Password</a>
					</div>
					<button type="submit" name="submit" class="btn submit">
						<span class="fa fa-sign-in"></span>
					</button>
				</form>
				<a href="index.html" class="cats">Go Back To Home Page</a>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		<div class="copyright">
			<h2>Copyright 2019 All rights reserved.</h2>
		</div>
		<!-- //copyright -->
	</div>
	
	<!-- jQuery JS -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Animate JS -->
    <script src="vendors/animate/wow.min.js"></script>
    <!-- Camera Slider -->
    <script src="vendors/camera-slider/jquery.easing.1.3.js"></script>
    <script src="vendors/camera-slider/camera.min.js"></script>
    <!-- Isotope JS -->
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope.pkgd.min.js"></script>
    <!-- Progress JS -->
    <script src="vendors/Counter-Up/jquery.counterup.min.js"></script>
    <script src="vendors/Counter-Up/waypoints.min.js"></script>
    <!-- Owlcarousel JS -->
    <script src="vendors/owl_carousel/owl.carousel.min.js"></script>
    <!-- Stellar JS -->
    <script src="vendors/stellar/jquery.stellar.js"></script>
    <!-- Theme JS -->
    <script src="js/theme.js"></script>
	<!-- Password toggle -->
    <script src="js/jquery.menu.js"></script>
	
</body>

</html>