
/*Codes for processing client registration on Stallion Gold Resources*/


***process registration*** [NEW ONE --------------------------------]

<?php
session_start();
$_SESSION['message'] = '';

// Connect to database
require 'connections/connections.php';

// Confirm form is submitted
if(isset($_POST['submit'])) {
	
	//the path to store the uploaded image
	$target = "uploads/".basename($_FILES['photo']['name']);
	$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

	//Insert the values into the database table
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$dateofbirth = $_POST['dateofbirth'];
	$country = $_POST['country'];
	$photo = $_FILES['photo']['name'];

	//check whether username already exists
	$sqli = "SELECT username FROM members WHERE username='$username'";
	$result = mysqli_query($conn, $sqli);
	$count = mysqli_num_rows($result);

	if($count==0) {
			
		//The two passwords are equal to each other
		if ($_POST['password'] == $_POST['confirmpassword']) {
				
			//make sure file type is image
			if (preg_match("!image!", $_FILES['photo']['type'])) {
		
				//uploading image into uploads/ folder and redirect to register_success.php page
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
					
					$sqli = "INSERT INTO members (username, fullname, email, password, confirmpassword, dateofbirth, country, photo) 
							VALUES ('$username', '$fullname', '$email', '$password', '$confirmpassword', '$dateofbirth', '$country', '$photo')";
					$result = mysqli_query($conn, $sqli);
					header("location:register_success.php");
				}
				else {
					$_SESSION['message'] = "File upload and registration failed!";
				}
			}
			else {
				$_SESSION['message'] = "Please, only upload JPG, PNG or GIF images!";
			}
		}
		else {
			$_SESSION['message'] = "The two passwords do not match!";
		}		
	}
	else {
		$_SESSION['message'] = "The username already exists. Please select another username!";
	}
}

?>




***login*** [NEW ONE --------------------------------]

<?php
session_start();
$_SESSION['message'] = '';

//Confirm form is submitted
if(isset($_POST['submit'])) {
	
	//Connect to database
	require 'connections/connections.php';
	
	//Insert the values into the database table
	$username = $_POST['username']; 
	$password = $_POST['password'];
	
	$sqli = "SELECT * FROM members WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sqli);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	//If username and password match, then populate database
	if($count==1) {
		$sqli = "INSERT INTO login (username) VALUES ('$username')";
		$result = mysqli_query($conn, $sqli);
		
		//Start some sessions necessary in My Account Profile
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['photo'] = $row['photo'];
		header("Location:database.php");		
	}
	else
	{
		$_SESSION['message'] = "Wrong username/password. Please try again!";
	}
}
?>


***database*** [NEW ONE --------------------------------]

<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['user_id'])){
	header("Location: login.php"); /*Redirect Browser*/
	die;
}

//Connect to database
require 'connections/connections.php';

//Fetching important data from account_summary
$user = $_SESSION['user_id'];
	
$query = "SELECT * FROM account_summary WHERE user_id='$user'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);
//print_r($row)
	
$_SESSION['currentGoldValue'] = $row['currentGoldValue'];
$_SESSION['currency'] = $row['currency'];
$_SESSION['lastTransAmt'] = $row['lastTransAmt'];
$_SESSION['lastTransDate'] = $row['lastTransDate'];
?>






/****** OLD ONEZZZZZZZZZZZZZZZZZZZZZZZ ******/

***process registration***

<?php

// Connect to database
require 'connections/connections.php';

/*INSERT THE VALUES INTO THE DATABASE TABLE*/
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$dateofbirth = $_POST['dateofbirth'];
$country = $_POST['country'];
$passport = $_FILES['passport']['name'];



/*CHECK WHETHER EMAIL IS THE RIGHT FORMAT*/

if(!$email == "" && (!strstr($email,"@") || !strstr($email,"."))) 
{
echo "<h2>Please, kindly enter valid e-mail</h2>\n"; 
$badinput = "<h2>FORM was NOT submitted. Try again.</h2>\n";
echo $badinput;
die ("Go back! ! ");
}
else
{
	if($password <> $confirmpassword)
	{
	echo "<h2>Password didnot match the confirm password. Try again. Thank You.</h2>\n";
	die ("Use back! ! "); 
	}
	else
	{
		if(empty($username) || empty($password) || empty($confirmpassword) || empty($email) || empty($firstname) || empty($lastname) || empty($spousename) || empty($gender) || empty($maritalstatus) || empty($dateofbirth) || empty($contacttelephone)) 
		{
		echo "<h2>Incomplete form. Please fill in all fields. Thank You.</h2>\n";
		die ("Use back! ! "); 
		}
	}
}

/*CHECK WHETHER EMAIL ALREADY EXISTS*/

$sqli = "SELECT email FROM members WHERE email='$email'";
$result = mysqli_query($conn, $sqli);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
if(mysqli_num_rows($result) == 1)
{
 echo "Sorry...This email already exist...Please, kindly select another email. Thank You.";
}


/*CHECK WHETHER USERNAME ALREADY EXISTS*/

$sqli = "SELECT username FROM members WHERE username='$username'";
$result = mysqli_query($conn, $sqli);
$count = mysqli_num_rows($result);

	if($count==1)
	{
	echo "<h2>Use Back - USERNAME already used by another person. Select another USERNAME. Thank You.</h2>\n";
	die ("Use back! ! "); 
	}
	else //If data is okay
		{
		$sqli = "INSERT INTO members (username, password, confirmpassword, email, firstname, lastname, spousename, gender, maritalstatus, dateofbirth, country, homeaddress, mailingaddress, contacttelephone, passport, ssnImage, identityImage) 
				VALUES ('$username', '$password', '$confirmpassword', '$email', '$firstname', '$lastname', '$spousename', '$gender', '$maritalstatus', '$dateofbirth', '$country', '$homeaddress', '$mailingaddress', '$contacttelephone', '$passport', '$ssnImage', '$identityImage')";
		$result = mysqli_query($conn, $sqli);
		}

/*UPLOADING PASSPORT SNEH*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["passport"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["passport"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["passport"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["passport"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


/*UPLOADING SSN IMAGE SNEH*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["ssnImage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ssnImage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["ssnImage"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["ssnImage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["ssnImage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


/*UPLOADING PROOF OF IDENTITY IMAGE SNEH*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["identityImage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["identityImage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["identityImage"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["identityImage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["identityImage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>


***process log into account***

<?php

session_start();

if(isset($_POST['submit']))
{
	require 'connections/connections.php';

	$username = $_POST['username']; 
	$password = $_POST['password'];
	
	$sqli = "SELECT * FROM members WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sqli);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($count==1)
	{
		$sqli = "INSERT INTO login (username) VALUES ('$username')";
		$result = mysqli_query($conn, $sqli);
		
		$_SESSION["user_id"] = $row['user_id'];
		$_SESSION["firstname"] = $row['firstname'];
		$_SESSION["lastname"] = $row['lastname'];
		$_SESSION["passport"] = $row['passport'];
		header("Location:dashboard.php");
	}
	else
	{
		echo "<h2>Wrong USERNAME or PASSWORD. Please try again. Thank You.</h2>\n";
		die ("Use back! ! ");
	}

	// fetching data from account_summary
	$user = $_SESSION['user_id'];
	
	$query = "SELECT * FROM account_summary WHERE user_id='$user'";
	$result = mysqli_query($conn, $query);
	
	$row = mysqli_fetch_array($result);
	// print_r($row)
		
	$_SESSION["startingDailyBalance"] = $row['startingDailyBalance'];
	$_SESSION["lastTransAmt"] = $row['lastTransAmt'];
	$_SESSION["lastTransDate"] = $row['lastTransDate'];
	$_SESSION["pendingTransferAmount"] = $row['pendingTransferAmount'];
	$_SESSION["currency"] = $row['currency'];
	
}
?>



***logout + destroy session***

<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
?>