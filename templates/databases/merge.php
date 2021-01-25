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
					<li><a href="/database/viewprofile" >VIEW MY PROFILE</a></li>
					<li><a href="/database/goldassets" >MY GOLD ASSETS</a></li>
					<li><a href="/database/merge" class="current">MERGE WITH PARTNER</a></li>
					<li><a href="/database/tandc">TERMS & CONDITIONS</a></li>
					<li><a href="/database/logout">LOG OUT</a></li>
				</ul>
			</nav>
		</div>
		
		<div class="database_content">
			<div id="top_content_first">
				<h3>Welcome To Your Personal Database: Merge With Partner</h3>
				<hr>
			</div>
			
			<div class="gold_assets">				
				<div>

					<?php if( isset($row['merge_id'])): ?>
					<table>
						<tr>
							<td><a><?php echo "<img src='_store/uploads/".$row_u["photo"]."' width=200 height=200 >"; ?></a></td>
							<td><a><?php if (isset($row_m["mgphoto"])) {
										echo "<img src='_store/uploads/".$row_m["mgphoto"]."' width=200 height=200 >";
										} else {
											echo "<img src='images/admin_img.jpg' width=200 height=200 >";
										}
									?>
							</td>
						</tr>
						<tr>
							<td><strong>INVESTOR</strong></td>
							<td><strong>PARTNER (NEXT OF KIN)</strong></td>
						</tr>
					</table>
					<?php endif; ?>
										
					<p style="text-align:center; color:#ff0000; font-size: 28px; font-weight:600; line-height:1.6;">
						<?php if (isset($row_m["mgfullname"])) { 
							echo 'Congratulations ' . $row_u['fullname'] . ', you have successfully been merged with your partner ' . $row_m['mgfullname'] . '. The total
									value of the Gold merged is ' . $row_m['mgGoldAmt'] . ' and the currency is in ' . $row_m['mgGoldCurr'] . '. You and your partner will receive
									a large profit margin as Return on Investment (ROI) because the value of Gold is always on the rise in Western World Trading Market.
									With this profit, which could be as high as 85% ROI on the value of the index capitalization on initial Gold investment, you and your partner
									are on the way to a lifetime of accumulated wealth and prosperity forever.<div style="height:25px;"></div>								<div class="edit_kong">
									<a href="/database/viewprofile"><div id="transactBar">CLICK TO GO BACK TO PROFILE </div></a>
								</div>';
							} else {
								echo 'You have not been merged with any partner!';
								echo '<div style="height:25px;"></div>								<div class="edit_kong">
								<a href="/database/merge_form"><div id="transactBar">CLICK TO MERGE WITH PARTNER</div></a>
							</div>';
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