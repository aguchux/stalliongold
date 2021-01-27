<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['user_id'])){
	header("Location: admin_login.php"); /*Redirect Browser*/
	die;
}
?>

<?php

require 'connections/connections.php';

$as_id = $_POST['as_id'];

$sqli = "SELECT * FROM account_summary WHERE as_id='$as_id'";
$result = mysqli_query($conn, $sqli);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$_SESSION["as_id"] = $row['as_id'];
	$_SESSION["user_id"] = $row['user_id'];
	$_SESSION["currentGoldValue"] = $row['currentGoldValue'];
	$_SESSION["currency"] = $row['currency'];
	$_SESSION["lastTransAmt"] = $row['lastTransAmt'];
	$_SESSION["lastTransDate"] = $row['lastTransDate'];
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, Titan, resources">

    <title>Titan Gold Resources | Welcome</title>

	<!-- css files -->
	<link rel="stylesheet" href="<?= $assets ?>css/database.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="<?= $assets ?>css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

</head>
<body data-spy="scroll" data-target=".navbar-collapse">


<!-- top header with logo only -->
<header>
	<div class="database_top">
		<div class="database_logo">
			<a href="admin_/admin_database/database" ><img src="<?= $assets ?>images/sgr_logo.png" alt="Titan Gold Resources" /></a>
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
					<li><a href="admin_/admin_database/database">HOME</a></li>
					<li><a href="/admin_database/view_members">VIEW MEMBERS</a></li>
					<li><a href="/admin_database/view_partners">VIEW PARTNERS</a></li>
					<li><a href="/admin_database/view_account_summary" class="current">VIEW ACCOUNT SUMMARY</a></li>
					<li><a href="/admin_database/edit_password">EDIT PASSWORD</a></li>
					<li><a href="/database/logout">LOG OUT</a></li>
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
					<p>EDIT ACCOUNT SUMMARY OF CLIENTS</p>
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
					<form action="admin_view_account_summary_edit_done.php" method="POST" name="RegisterForm" id="RegisterForm" enctype="multipart/form-data">
						<label>USER ID:</label>
						<input name="user_id" type="text" id="user_id" value="<?php echo $_SESSION["user_id"]; ?>" />
						<label>CURRENT GOLD VALUE:</label>
						<input name="currentGoldValue" type="text" id="currentGoldValue" value="<?php echo $_SESSION["currentGoldValue"]; ?>" />
						<label>CURRENCY:</label>
						<input name="currency" type="text" id="currency" value="<?php echo $_SESSION["currency"]; ?>" />
						<label>LAST TRANSACTION AMOUNT:</label>
						<input name="lastTransAmt" type="text" id="lastTransAmt" value="<?php echo $_SESSION["lastTransAmt"]; ?>" />
						<label>LAST TRANSACTION DATE:</label>
						<input name="lastTransDate" type="text" id="lastTransDate" value="<?php echo $_SESSION["lastTransDate"]; ?>" />
						<br>
						<br>
						<input type="submit" name="submit" class="buttonsneh" value="UPDATE" />
					</form>
				</div>
				
				<div class="edit_kong">
					<a href="admin_view_account_summary_edit.php"><div style="text-align:center;" id="transactBar">GO BACK</div></a>
				</div>
			</div>
			
			<!-- divider section -->			
			<div class="under_gee">
				<div style="height:10px;"></div>
				<hr>
			</div>	
			
			<!-- copyright section -->
			<div class="footer_glow">
				<p>Copyright &copy 2021 Titan Gold Resources</p>
			</div>
		</div>
	</div>
</section>


<!-- javascript js -->	
<script src="<?= $assets ?>js/jquery.js"></script>
<script src="<?= $assets ?>js/bootstrap.min.js"></script>	
<script src="<?= $assets ?>js/nivo-lightbox.min.js"></script>
<script src="<?= $assets ?>js/smoothscroll.js"></script>
<script src="<?= $assets ?>js/jquery.menu.js"></script>
<script src="<?= $assets ?>js/jquery.nav.js"></script>
<script src="<?= $assets ?>js/isotope.js"></script>
<script src="<?= $assets ?>js/imagesloaded.min.js"></script>
<script src="<?= $assets ?>js/custom.js"></script>

</body>
</html>