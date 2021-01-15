<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['user_id'])){
	header("Location: login.php"); /*Redirect Browser*/
	die;
}
?>