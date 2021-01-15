
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, stallion, resources">

    <title><?= title?></title>
	
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
	<link rel="stylesheet" href="<?= $assets ?>css/login_style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="<?= $assets ?>css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="register-bg">
		<!-- title -->
		<h1>Open An Account</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style">
					<a href="/"><img src="<?= $assets ?>images/sgr_user.png" alt="Titan Gold"></a>
				</div>
				<form action="/forms/register" method="post" enctype="multipart/form-data">
					<p class="legend">Register Here<span class="fa fa-hand-o-down"></span></p>
					<!-- <div style="text-align:center; color:#ff0000; font-size:15px; font-weight:400;"><?= $_SESSION['message'] ?></div> -->
					<div class="input">
						<input type="text" placeholder="Username" name="username" required />
						<span class="fa fa-user"></span>
					</div>
					<div class="input">
						<input type="text" placeholder="Full Name(s)" name="fullname" required />
						<span class="fa fa-users"></span>
					</div>
					<div class="input">
						<input type="email" placeholder="Email" name="email" required />
						<span class="fa fa-envelope"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Password" name="password" required />
						<span class="fa fa-unlock"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Confirm Password" name="confirmpassword" required />
						<span class="fa fa-unlock"></span>
					</div>
					<div class="input">
						<input type="text" placeholder="MM/DD/YY" name="dateofbirth" required />
						<span class="fa fa-bullseye"></span>
					</div>
					<div class="input">
						<input type="text" placeholder="Country of Origin" name="country" required />
						<span class="fa fa-globe"></span>
					</div>
					<div class="input">
						<label class="frogs">Upload your photo</label>
						<input type="file" name="photo" required />
					</div>
					<button type="submit" name="submit" class="btn submit">
						<span class="fa fa-sign-in"></span>
					</button>
				</form>
				<a href="/" class="cats">Go Back To Home Page</a>
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
    <script src="<?= $assets ?>js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?= $assets ?>js/bootstrap.min.js"></script>
    <!-- Animate JS -->
    <script src="<?= $assets ?>vendors/animate/wow.min.js"></script>
    <!-- Camera Slider -->
    <script src="<?= $assets ?>vendors/camera-slider/jquery.easing.1.3.js"></script>
    <script src="<?= $assets ?>vendors/camera-slider/camera.min.js"></script>
    <!-- Isotope JS -->
    <script src="<?= $assets ?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="<?= $assets ?>vendors/isotope/isotope.pkgd.min.js"></script>
    <!-- Progress JS -->
    <script src="<?= $assets ?>vendors/Counter-Up/jquery.counterup.min.js"></script>
    <script src="<?= $assets ?>vendors/Counter-Up/waypoints.min.js"></script>
    <!-- Owlcarousel JS -->
    <script src="<?= $assets ?>vendors/owl_carousel/owl.carousel.min.js"></script>
    <!-- Stellar JS -->
    <script src="<?= $assets ?>vendors/stellar/jquery.stellar.js"></script>
    <!-- Theme JS -->
    <script src="<?= $assets ?>js/theme.js"></script>
	
</body>

</html>