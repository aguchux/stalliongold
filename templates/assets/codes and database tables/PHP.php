---PHP CODES

/*GENERAL SNEH*/


$_SESSION['auth'] = $row['user_id'];


session_start();



header("Location: index.html");


<?php
$adminpassword = $_SESSION["password"];
	
	// Inserting data into login table
	if($username==("admin") & $password==$adminpassword)
	{
		$sqli = "INSERT INTO login (username) VALUES ('$username')";
		$result = mysqli_query($conn, $sqli);
		
		header("Location:the_importance.php");
	}
	else
	{
		echo "<h2>Wrong PASSWORD. Please try again. Thank You.</h2>\n";
		die ("Use back! ! ");
	}
?>

/*FOR LOGOUT*/

<?php
session_start();
session_unset();
session_destroy();
?>


/*FOR DESTROYING SESSIONS AND COOKIES*/


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




/*DIFFERENT CODES FOR CHECKING SESSION IDs*/

<?php
	if (isset($_SESSION['user_id'])) {
		echo "Welcome User $_SESSION['user_id'].";
	} else {
		echo "You are not logged in!";
	}
?>


<?php
echo 'Welcome ' . $_SESSION['user_id'];
?>


<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['user_id'])){
	header("Location: login.php"); /*Redirect Browser*/
}
?>




<?php
//put this at the first line
session_start();
//if  authentication successful 
$_SESSION['user_id'] = true;

	if(!$_SESSION['user_id']){
		header("location:login.php"); /*Redirect Browser*/
		die;
	}
?>


<?php
if(!isset($_SESSION['user_id']))
	{
		header("location:login.php"); /*Redirect Browser*/
		die;
	}
?>

<?php

$_SESSION['user']=mysqli_fetch_assoc($result);
    $row = $_SESSION['user'];
    $role = $row['role'];

?>

<?php
session_destroy(); // Is Used To Destroy All Sessions
//Or
if(isset($_SESSION["id"]))
unset($_SESSION['id']);  //Is Used To Destroy Specified Session
?>



/*FOR SENDING EMAIL SNEH*/

/*FOR SENDING EMAIL SNEH*/

/*FOR SENDING EMAIL SNEH*/

/*FOR SENDING EMAIL SNEH*/




A] MAIN NIGGA

<?php
// Sending email to admin after user fills forgot password form

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];

/* Recipient */
$to = "fnbc.service@fnbc-plc.com";

/* Sender */
$from = $_POST['email'];

/* Subject */
$subject = "I forgot my password";

/* Message */
$message = "<html>
		<body>
                    <p>
                       Dear Admin, please kindly help me retrieve my forgotten password. I am <b>$firstname $lastname</b>
                    </p>
                    <p>
                       My username is: <b>$username</b>
                    </p>
                    <p>
                    Thanks,<br>
                    Warm regards.
                    </p>
                </body>
            </html>";

/* Headers */
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: ' .$from."\r\n";
$headers .= 'Reply-To: fnbc.service@fnbc-plc.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

/* Send email */
mail($to, $subject, $message, $headers);
echo 'Mail Sent. Thank you: ' . $_POST['firstname'] . ', we will contact you shortly.';

?>




B] SIMPLE SNEH

<?php
$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?> 




1] FIRST EXAMPLE SNEH

<?php
    $to = "$email";
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    $from = "someonelse@example.com";
    $headers = "From: $from";
    mail($to,$subject,$message,$headers);
    echo "Mail Sent.";
?>



2] SECOND ONE SNEH SNEH

<?php

    $to = 'maryjane@email.com';

    $subject = 'Marriage Proposal';

    $message = 'Hi Jane, will you marry me?'; 

    $from = 'peterparker@email.com';

     

    // Sending email

    if(mail($to, $subject, $message)){

        echo 'Your mail has been sent successfully.';

    } else{

        echo 'Unable to send email. Please try again.';

    }

?>



    <?php

    $to = 'maryjane@email.com';

    $subject = 'Marriage Proposal';

    $from = 'peterparker@email.com';

     

    // To send HTML mail, the Content-type header must be set

    $headers  = 'MIME-Version: 1.0' . "\r\n";

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     

    // Create email headers

    $headers = 'From: '.$from."\r\n".

        'Reply-To: '.$from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

     

    // Compose a simple HTML email message

    $message = '<html><body>';

    $message = '<h1 style="color:#f40;">Hi Jane!</h1>';

    $message = '<p style="color:#080;font-size:18px;">Will you marry me?</p>';

    $message = '</body></html>';

     

    // Sending email

    if(mail($to, $subject, $message, $headers)){

        echo 'Your mail has been sent successfully.';

    } else{

        echo 'Unable to send email. Please try again.';

    }

    ?>





3] ANOTHER EMAIL EXAMPLE SNEH (from User to Admin)

<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
?>

<?php
    $email_from = 'yourname@yourwebsite.com';
 
    $email_subject = "New Form submission";
 
    $email_body = "You have received a new message from the user $name.\n".
                            "Here is the message:\n $message".
?>

If a visitor ‘Anthony’ submits the form, the email message will look like this:

"You have received a new message from the user Anthony.
Here is the message:
Hi,
Thanks for your great site. I love your site. Thanks and Bye.
Anthony."

// Sending the email

<?php
 
  $to = "yourname@yourwebsite.com";
 
  $headers = "From: $email_from \r\n";
 
  $headers .= "Reply-To: $visitor_email \r\n";
 
  mail($to,$email_subject,$email_body,$headers);
 
 ?>
 
 
 
 4] SAMPLE CODE SNEH
 
 <?php
$to = "name1@website-name.com, name2@website-name.com,name3@website-name.com";
 
$headers = "From: $email_from \r\n";
 
$headers .= "Reply-To: $visitor_email \r\n";
 
$headers .= "Cc: someone@domain.com \r\n";
 
$headers .= "Bcc: someoneelse@domain.com \r\n";
 
mail($to,$email_subject,$email_body,$headers);
?>
 


5] ANOTHER EXAMPLE DOBALE
 
 <?php 
$ToEmail = 'youremail@site.com'; 
$EmailSubject = 'Site contact form'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["name"].""; 
$MESSAGE_BODY .= "Email: ".$_POST["email"].""; 
$MESSAGE_BODY .= "Comment: ".nl2br($_POST["comment"]).""; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?>

<?php 
if ($_POST["email"]<>'') { 
    $ToEmail = 'youremail@site.com'; 
    $EmailSubject = 'Site contact form'; 
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "Name: ".$_POST["name"].""; 
    $MESSAGE_BODY .= "Email: ".$_POST["email"].""; 
    $MESSAGE_BODY .= "Comment: ".nl2br($_POST["comment"]).""; 
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?> 
 

 
6] SHOOK ONES

<?php
// Sending email to user after registration

/* Recipient */
$to = '$email';

/* Subject */
$subject = '';

/* Message */
$message = '';

/* Headers */
$headers = "From: The Sender Name <sender@johnmorrison.com>\r\n";
$headers = "Reply-to: replyto@johnmorrison.com\r\n";
$headers = "Content-type: text/html\r\n";

/* Send email */
mail($to, $subject, $message, $headers);

?>
 
 


7] NIGGAISM

<?php

$subject = "Email Verification mail";
$headers = "From: email@domain.com \r\n";
$headers = "Reply-To: email@domain.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message = '<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
$message = 'Email Verification mail';
$message = '</div>';
$message = '<div style="font-family: Arial;">Confiramtion mail have been sent to your email id<br/>';
$message = 'click on the below link in your verification mail id to verify your account ';
$message = "<a href='http://yourdomain.com/user-confirmation.php?id=$id&email=$email&confirmation_code=$rand'>click</a>";
$message = '</div>';
$message = '</body></html>';

$message = '<html>
                <body>
                    <p>Hi '.$firstname.' '.$lastname.'</p>
                    <p>
                        We recieved below details from you. Please use given Request/Ticket ID for future follow up:
                    </p>
                    <p>
                        Your Request/Ticket ID: <b>'.$ticketID.'</b>
                    </p>
                    <p>
                    Thanks,<br>
                    '.$team.' Team.
                    </p>
                </body>
            </html>';

mail($email,$subject,$message,$headers);

?>



 
/* FOR SELECTING DATA FROM A TABLE */

 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>




/* Select Data From a Database Table using php mysqli */

*** BEST ONE SNEH ***

<?php
$con=mysqli_connect("example.com","peter","abc123","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM Persons");

while($row = mysqli_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
  }

mysqli_close($con);
?>




/* Display the Result in an HTML Table */

 <?php
$con=mysqli_connect("example.com","peter","abc123","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM Persons");

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>




<?php

$query = "SELECT * FROM account_summary";
$result = mysqli_query($conn, $query);

echo "<table border='1px'>";
while($row = mysqli_fetch_array($result))
(
	// print_r($row)
	$id = $row[0];
	$username = $row[1];
	$email = $row[2];
	$age = $row[3];
	
	echo "<tr>";
	
	echo "<td> {$id} </td>";
	echo "<td> {$username} </td>";
	echo "<td> {$email} </td>";
	echo "<td> {$age} </td>";
	
	echo "</tr>";
)
echo "</table>";

?>
