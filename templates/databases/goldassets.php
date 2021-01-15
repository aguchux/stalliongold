<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($Self->storage('user_id'))){
	$Self->redirect("/login"); 
	/*Redirect Browser*/
}


$Mysqli = new Apps\MysqliDb;
$user = $Self->storage('user_id');
$Mysqli->where("user_id",$user);
$row  = $Mysqli->getOne('members');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<?= domain ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, stallion, resources">

    <title><?= $title ?></title>

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
			<a href="database.php" ><img src="images/sgr_logo.png" alt="Stallion Gold Resources" /></a>
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
				<li><a href="/database">MY PERSONAL ACCOUNT</a></li>
					<li><a href="/database/viewprofile" >VIEW MY PROFILE</a></li>
					<li><a href="/database/goldassets" class="current">MY GOLD ASSETS</a></li>
					<li><a href="/database/merge">MERGE WITH PARTNER</a></li>
					<li><a href="/database/tandc">TERMS & CONDITIONS</a></li>
					<li><a href="/database/logout">LOG OUT</a></li>
				</ul>
			</nav>
		</div>
		
		<div class="database_content">
			<div id="top_content_first">
				<h3>Welcome To Your Personal Database: My Gold Assets</h3>
				<hr>
			</div>
			
			
			<div id="top_content_second">				
				<div>
					<table>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>USERNAME</strong></td><td><?php echo $row["username"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>FULL NAME</strong></td><td><?php echo $row["fullname"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>EMAIL</strong></td><td><?php echo $row["email"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>PASSWORD</strong></td><td><?php echo $row["password"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>DATE OF BIRTH</strong></td><td><?php echo $row["dateofbirth"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>COUNTRY</strong></td><td><?php echo $row["country"]; ?></td></tr>
						<tr><td style="color:#fff; background-color:#c29226;"><strong>PHOTO</strong></td><td><?php echo "<img src='uploads/".$row["photo"]."' width=150 height=150 >"; ?></td></tr>
					</table>
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