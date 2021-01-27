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
					<li><a href="/admin_database/database" class="current">HOME</a></li>
					<li><a href="/admin_database/view_members">VIEW MEMBERS</a></li>
					<li><a href="/admin_database/view_partners">VIEW PARTNERS</a></li>
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
			<div id="top_content_second">
				<div id="image_dash">
					<p><?php echo "<img src='_store/uploads/".$row["photo"]."' width=200 height=200 >"; ?></p>
				</div>
				<div id="text_dash">
					<table>
						<tr>
							<td style="background-color:#b3d2f7;"><strong>Full Name</strong></td>
							<td><?php echo $row['fullname']; ?></td>
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
					<p style="color:#ff0000;"><?php if (isset($row["username"])) {
						echo 'Your username is: ' . $row['username'];
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