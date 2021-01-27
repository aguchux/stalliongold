<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($Self->storage('user_id'))){
	$Self->redirect("/admin_database/login"); 
	/*Redirect Browser*/
}
?>
<?php

// Connect to database
$Mysqli = new Apps\MysqliDb;
$Template = new Apps\Template;

/*INSERT THE VALUES INTO THE DATABASE TABLE*/
$user_id = $_POST['user_id'];
$currentGoldValue = $_POST['currentGoldValue'];
$currency = $_POST['currency'];
$lastTransAmt = $_POST['lastTransAmt'];
$lastTransDate = $_POST['lastTransDate'];
$row = $Self->storage('user_id');

// Insert Data
$result = $Mysqli->insert("account_summary", array(
	"user_id" => $user_id,
	"currentGoldValue" => $currentGoldValue,
	"currency" => $currency,
	"lastTransAmt" => $lastTransAmt,
	"lastTransDate" => $lastTransDate,
));

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
			<a href="/admin_database/database" ><img src="<?= $assets ?>images/sgr_logo.png" alt="Titan Gold Resources" /></a>
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
					<li><a href="/admin_database/database">HOME</a></li>
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
					<p>CLIENT ACCOUNT SUCCESSFULLY ADDED</p>
				</div>
				
				<div class="boxTwo">
					<p><?php if (isset($row["user_id"])) {
						echo 'Welcome User ' . $row['user_id'];
						} else {
							echo "You are not logged in!";
						}
						?>
					</p>
					<p><?php echo 'Username: ' . $row['username']; ?></p>
				</div>
				
				<div>
					<p>New account summary created for client. Please view account summary to be sure it has reflected in the database. Thanks!</p>
				</div>
				
				<div class="edit_kong">
					<a href="/admin_database/database"><div style="text-align:center;" id="transactBar">GO BACK</div></a>
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