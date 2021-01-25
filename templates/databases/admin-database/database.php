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
					<li><a href="admin_database.php" class="current">HOME</a></li>
					<li><a href="admin_view_members.php">VIEW MEMBERS</a></li>
					<li><a href="admin_view_partners.php">VIEW PARTNERS</a></li>
					<li><a href="admin_view_account_summary.php">VIEW ACCOUNT SUMMARY</a></li>
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
			<div id="top_content_second">
				<div id="image_dash">
					<p><?php echo "<img src='uploads/".$_SESSION["photo"]."' width=200 height=200 >"; ?></p>
				</div>
				<div id="text_dash">
					<table>
						<tr>
							<td style="background-color:#b3d2f7;"><strong>Full Name</strong></td>
							<td><?php echo $_SESSION['fullname']; ?></td>
							<td style="background-color:#b3d2f7;"><strong>Account Status</strong></td>
							<td>Active</td>
						</tr>
						<tr>
							<?php $dt = new DateTime();?>
							<td style="background-color:#b3d2f7;"><strong>Date</strong></td>
							<td><?php echo $dt->format('d-M-Y');?></td>
							<td style="background-color:#b3d2f7;"><strong>Login Time</strong></td>
							<td><?php echo $dt->format('H:i:s');?></td>
						</tr>
					</table>
				</div>	
			</div>
			<div id="top_content_third">
				<div class="boxOne">
					<p>Message Board</p>
				</div>
				<div class="boxTwo">
					<p style="color:#ff0000;"><?php if (isset($_SESSION["username"])) {
						echo 'Your username is: ' . $_SESSION['username'];
						} else {
							echo "You are not logged in!";
						}
						?>
					</p>
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