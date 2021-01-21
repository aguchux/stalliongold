<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($Self->storage('user_id'))){
	$Self->redirect("/login"); 
	/*Redirect Browser*/
}



$Mysqli_m = new Apps\MysqliDb;
$Mysqli_u = new Apps\MysqliDb;

$user = $Self->storage('user_id');

$Mysqli_m->where("user_id",$user);
$row_m  = $Mysqli_m->getOne('merge');

$Mysqli_u->where("user_id",$user);
$row_u  = $Mysqli_u->getOne('members');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Putting customers' needs as a top priority and earning a spot as one of the world's best online gold platforms">
	<meta name="keywords" content="gold, Titan, resources">

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
			<a href="/database" ><img src="<?= $assets ?>images/sgr_logo.png" alt="Titan Gold Resources" /></a>
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
					<li><a href="/database/viewprofile">VIEW MY PROFILE</a></li>
					<li><a href="/database/goldassets">MY GOLD ASSETS</a></li>
					<li><a href="/database/merge" class="current">MERGE WITH PARTNER</a></li>
					<li><a href="/database/tandc">TERMS & CONDITIONS</a></li>
					<li><a href="/database/logout">LOG OUT</a></li>
				</ul>
			</nav>
		</div>
		
		<div class="database_content">
			<div id="top_content_first">
				<h4 style="color:#ff0000;">Dear Investor, please kindly fill the form below to update the information of your partner/next of kin on our secure online database. By so doing, you are legally accepting joint ownership of all your gold assets and their monetary values stored in our bullion vaults. Hence, a partner could be contacted to carry out financial transactions on behalf of the investor. Additionally, monetary value of the gold assets can also be credited into the partner's account within 24 hours of any transaction.</h4>
				<hr>
			</div>
			
			<div id="top_content_third">			
				<div class="profile_form">
					<form action="database/merge_process" method="POST" name="RegisterForm" id="RegisterForm" enctype="multipart/form-data">
						<label>USER ID:</label>
						<input name="user_id" type="text" id="user_id" value="<?php echo $row_u["user_id"]; ?>" required />
						<label>AMOUNT OF GOLD ASSETS TO MERGE:</label>
						<input name="mgGoldAmt" type="text" id="mgGoldAmt" value="<?php echo $row_m["mgGoldAmt"]; ?>" />
						<label>CURRENCY (eg. Dollars, Pounds, Euros):</label>
						<input name="mgGoldCurr" type="text" id="mgGoldCurr" value="<?php echo $row_m["mgGoldCurr"]; ?>" />
						<label>FULL NAME:</label>
						<input name="mgfullname" type="text" id="mgfullname" value="<?php echo $row_m["mgfullname"]; ?>" required />
						<label>EMAIL:</label>
						<input name="mgemail" type="text" id="mgemail" value="<?php echo $row_m["mgemail"]; ?>" required />
						<label>DATE OF BIRTH:</label>
						<input name="mgdateofbirth" type="text" id="mgdateofbirth" value="<?php echo $row_m["mgdateofbirth"]; ?>" required />
						<label>ADDRESS:</label>
						<input name="mgaddress" type="text" id="mgaddress" value="<?php echo $row_m["mgaddress"]; ?>" required />
						<label>UPLOAD YOUR PARTNER'S PHOTO</label>
						<input type="file" name="mgphoto" required />
						<br>
						<br>
						<input type="submit" name="submit" value="MERGE WITH PARTNER" />
					</form>
				</div>
				
				<div class="edit_kong">
					<a href="/database/merge"><div id="transactBar">GO BACK</div></a>
				</div>
			</div>
			
			<!-- divider section -->			
			<div class="under_gee">
				<div style="height:10px;"></div>
				<hr>
			</div>	
			
			<!-- copyright section -->
			<div class="footer_glow">
				<p>Copyright &copy 2021 Titan Gold & Resources</p>
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