<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($Self->storage('user_id'))){
	$Self->redirect("/login"); 
	/*Redirect Browser*/
}



//Fetching important data from account_summary
$Mysqli = new Apps\MysqliDb;

$user = $Self->storage('user_id');

$Mysqli->where("user_id",$user);
$row  = $Mysqli->getOne('account_summary');
	
$Self->store('currentGoldValue',$row['currentGoldValue']);
$Self->store('currency',$row['currency']);
$Self->store('lastTransAmt',$row['lastTransAmt']);
$Self->store('lastTransDate',$row['lastTransDate']);

//Fetching important data from merge table
$MysqliMerger = new Apps\MysqliDb;
$MysqliMerger->where("user_id",$user);
$row_m  = $MysqliMerger->getOne('merge');
//print_r($row)

$Self->store('mgGoldAmt',$row_m['mgGoldAmt']);
$Self->store('mgGoldCurr',$row_m['mgGoldCurr']);
$Self->store('mgfullname',$row_m['mgfullname']);
$Self->store('mgemail',$row_m['mgemail']);
$Self->store('mgdateofbirth',$row_m['mgdateofbirth']);
$Self->store('mgaddress',$row_m['mgaddress']);
$Self->store('mgphoto',$row_m['mgphoto']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<base href="<?= domain ?>" />

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
			<a href="/database" ><img src="<?= $assets ?>images/sgr_logo.png" alt="Stallion Gold Resources" /></a>
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
					<li><a href="/database" class="current">MY PERSONAL ACCOUNT</a></li>
					<li><a href="/database/viewprofile">VIEW MY PROFILE</a></li>
					<li><a href="/database/goldassets">MY GOLD ASSETS</a></li>
					<li><a href="/database/merge">MERGE WITH PARTNER</a></li>
					<li><a href="/database/tandc">TERMS & CONDITIONS</a></li>
					<li><a href="/database/logout">LOG OUT</a></li>
				</ul>
			</nav>
		</div>
		
		<div class="database_content">
			<div id="top_content_first">
				<h3>Welcome To Your Personal Database: Account Summary</h3>
				<hr>
			</div>
			<div id="top_content_second">
				<div id="image_dash">
					<p><?php echo "<img src='uploads/" . $Self->storage("photo") . "' width=200 height=200 >"; ?></p>
				</div>
				<div id="text_dash">
					<table>
						<tr>
							<td style="background-color:#b3d2f7;"><strong>Full Name</strong></td>
							<td><?php echo $Self->storage('fullname'); ?></td>
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
						<tr>
							<td style="background-color:#b3d2f7;"><strong>Total Gold Value</strong></td>
							<td><?php echo $Self->storage('currentGoldValue'); ?></td>
							<td style="background-color:#b3d2f7;"><strong>Currency</strong></td>
							<td><?php echo $Self->storage('currency'); ?></td>
						</tr>
					</table>
				</div>	
			</div>
			<div id="top_content_third">
				<div class="boxOne">
					<p>Message Board</p>
				</div>
				<div class="boxTwo">
					<p style="color:#ff0000;">

						<?php 
						$_username =  $Self->storage("username");
						if( isset( $_username )) {
						echo "Your username is: {$_username}" ;
						} else {
							echo "You are not logged in!";
						}
						?>
					</p>
					<p>Your secure online account is <strong>ACTIVE</strong>. Please, endeavor to keep your unique username and password secure.</p>
					<p>If there is any personal information you want to change, kindly click on 'View My Profile' to proceed to update your profile.</p>
					<p>You can also view 'My Gold Assets' by clicking the link on the left. This will provide you with the valuation for all your personal gold assets stored in our secure bullion vaults and how much they are worth in your unique currency.</p>
					<p>If you want to have joint ownership rights with your partner (and by so doing, make him/her your next of kin) so that all your gold assets and monetary value of your gold resources become co-owned by you and your partner, please kindly click on 'Merge With Partner'.</p>
					<p>Please, endeavor to read the 'Terms and Conditions', as well as the instructions on different segments of your secure online account, before proceeding with any transactions you wish to do.</p>
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