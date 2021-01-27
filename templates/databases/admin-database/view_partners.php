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
	
// Getting user information
$query = "SELECT * FROM merge";
$result = mysqli_query($conn, $query);

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
					<li><a href="/admin_database/view_partners" class="current">VIEW PARTNERS</a></li>
					<li><a href="/admin_database/view_account_summary">VIEW ACCOUNT SUMMARY</a></li>
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
					<p>LIST OF MERGED PARTNERS</p>
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
				
				<div class="canaries">
					<?php
						echo "<table border='1' cellpadding='1'>
							<tr>
							<th>merge_id</th>
							<th>user_id</th>
							<th>mgfullname</th>
							<th>mgemail</th>
							<th>mgdateofbirth</th>
							<th>mgaddress</th>
							</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['merge_id'] . "</td>";
							echo "<td>" . $row['user_id'] . "</td>";
							echo "<td>" . $row['mgfullname'] . "</td>";
							echo "<td>" . $row['mgemail'] . "</td>";
							echo "<td>" . $row['mgdateofbirth'] . "</td>";
							echo "<td>" . $row['mgaddress'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					?>
				</div>
				
				<div class="kong">
					<a href="admin_/admin_database/database"><div style="float:left;" id="transactBar">GO BACK</div></a>
					<a href="admin_view_partners_delete.php"><div style="float:right;" id="transactBar">DELETE</div></a>
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