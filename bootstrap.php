<?php

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

//Initialize the Config File
if (file_exists(DOT . '/config.php')) {
	include(__DIR__ . '/config.php');
	require __DIR__ . '/vendor/autoload.php';

	date_default_timezone_set(default_timezone);

	$Route = new Apps\Route;
	$Session = new Apps\Session;
	$Core = new Apps\Core;
	$Template = new Apps\Template;

	//Update live/online status of users//
	if ($Template->auth) {

	}
	//Update live/online status of users//

} else {
	die('config.php not found!');
}
