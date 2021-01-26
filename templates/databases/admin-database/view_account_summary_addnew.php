<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['user_id'])){
	header("Location: admin_login.php"); /*Redirect Browser*/
	die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, stallion, resources">

    <title>Stallion Gold Resources | Welcome</title>

	<!-- css files -->
	<link rel="stylesheet" href="css/database.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

</head>
<body data-spy="scroll" data-target=".navbar-collapse">


<!-- top header with logo only -->
<header>
	<div class="database_top">
		<div class="database_logo">
			<a href="admin_database.php" ><img src="images/sgr_logo.png" alt="Stallion Gold Resources" /></a>
		</div>
		<div class="menu">
			<a href="javascript:void(0);" onclick="toggle_visibility('myToggle');">MENU</a>
		</div>
	</div>
</header>

<!-- other sections -->
<section>
	<div class="database_container">
		<div class="database_sidebar" id="myToggle">
			<nav class="nav_database">
				<ul>
					<li><a href="admin_database.php">HOME</a></li>
					<li><a href="admin_view_members.php">VIEW MEMBERS</a></li>
					<li><a href="admin_view_partners.php">VIEW PARTNERS</a></li>
					<li><a href="admin_view_account_summary.php" class="current">VIEW ACCOUNT SUMMARY</a></li>
					<li><a href="admin_edit_password.php">EDIT PASSWORD</a></li>
					<li><a href="logout.php">LOG OUT</a></li>
				</ul>
			</nav>
		</div>
		
		<div class="database_content">
			<div id="top_content_first">
				<h3>Welcome To Your Admin Database</h3>
				<hr>
			</div>

			<div id="top_others_content_second">
				<div class="boxOne">
					<p>ADD NEW ACCOUNT SUMMARY OF CLIENTS</p>
				</div>
				
				<div class="boxTwo">
					<p><?php if (isset($_SESSION["user_id"])) {
						echo 'Welcome User ' . $_SESSION['user_id'];
						} else {
							echo "You are not logged in!";
						}
						?>
					</p>
					<p><?php echo 'Username: ' . $_SESSION['username']; ?></p>
				</div>
				
				<div class="profile_form">
					<form action="admin_view_account_summary_addnew_done.php" method="post" name="RegisterForm" id="RegisterForm" enctype="multipart/form-data">
						<label>USER ID:</label>
						<input name="user_id" type="text" id="user_id" placeholder="user_id" required />
						<label>CURRENT GOLD VALUE:</label>
						<input name="currentGoldValue" type="text" id="currentGoldValue" placeholder="currentGoldValue" required />
						<label>CURRENCY:</label>
						<input name="currency" type="text" id="currency" placeholder="currency" required />
						<label>LAST TRANSACTION AMOUNT:</label>
						<input name="lastTransAmt" type="text" id="lastTransAmt" placeholder="lastTransAmt" required />
						<label>LAST TRANSACTION DATE:</label>
						<input name="lastTransDate" type="text" id="lastTransDate" placeholder="lastTransDate" required />
						<br>
						<br>
						<input type="submit" name="submit" value="ADD" />
					</form>
				</div>
				
				<div class="edit_kong">
					<a href="admin_view_account_summary.php"><div style="text-align:center;" id="transactBar">GO BACK</div></a>
				</div>
			</div>
			
			<!-- divider section -->			
			<div class="under_gee">
				<div style="height:10px;"></div>
				<hr>
			</div>	
			
			<!-- copyright section -->
			<div class="footer_glow">
				<p>Copyright &copy 2019 Stallion Gold Resources</p>
			</div>
		</div>
	</div>
</section>


<!-- javascript js -->	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.menu.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>