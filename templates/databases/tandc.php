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
			<div class="tandc">
				<div>
					<a><img src="<?= $assets ?>images/tandc_img.jpg"></a>
				</div>
				<div class="boxTwo">
					<p>The personal secure online account enables each client to have easy access to all their gold assets and view the individual and collective valuations in the stipulated currency of the client's choice. These valuations are subject to terms and conditions of Stallion Gold Resources, and all transactions on the gold assets and resources are contractually binding on either the client or the client's next of kin.</p>
					<p>Therefore, every registered investor on this online gold investment and trading platform should provide up-to-date information on his/her next of kin. In case of any unfortunate event in which the registered investor cannot be reached for a period of thirty (30) working days, the monetary value of his/her gold assets will be deposited into the bank account of the next of kin provided. Alternatively, this procedure would be carried out too, on the request of the registered investor mandating the company to do so.</p>
					<p>The annual management cost of the major gold assets on Stallion Gold Resources online platform is 0.08%, which is over 5 times lower than the storage rate for gold on other Gold Bullion Vaults across the globe. Allocated storage at a bank would usually cost around 10 times our allocated storage rate.</p>
					<p>Stallion Gold Resources Gold Investment Plan allows you to build gold savings with minimum effort. Set up a monthly payment or standing order with your bank to make regular deposits into your secure online account and we’ll use the available funds to buy more gold assets at the Dubai Price, the global benchmark used in the professional wholesale markets and published daily on the Asian Bullion Market website.</p>
					<p>Your bullion accumulates in a professional, high-security vault in Dubai, United Arab Emirates. You can stop making deposits or sell your bullion and withdraw funds at any time, without notice and without penalty. Alternatively, withdraw your gold as a 100g gold bar.</p>
					<p>Please Note: This analysis is published to provide fundamental financial information, not to lead you to making financial decisions. Previous price trends are no guarantee of future performance. Before investing in any asset, you should seek financial advice if unsure about its suitability to your personal circumstances: You pay prices that are closer to the wholesale market price; No VAT or Sales Tax; No delivery costs; Professional vaults mean you pay the lowest storage & insurance costs; Buy & sell 24/7 and instantly have funds back in your account ready to be withdrawn.</p>
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