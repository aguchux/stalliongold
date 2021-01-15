<?php

$servername = 'localhost';
$username = 'stallix_admin';
$password = 'RT^wMdsr?EF6';
$dbname = 'stallix_stallion';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>