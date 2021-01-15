/*** INCLUDE IN process_register.php ***/

<?php

// Sending email to user after registration

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

/* Recipient */
$to = $_POST['email'];

/* Subject */
$subject = 'Welcome to your secure online account at Global Capital Investment Union';

/* Message */
$message = "<html>
		<body>
			<div style='width:550px; background-color:#CC6600; padding:15px; font-weight:bold;'>
				Secure Online Account
			</div>
			<div style='font-family: Arial;'>
				This is a confirmation mail sent to your email id.<br/>
				You can now proceed to log into your unique and secure online account to view the contents of your dashboard.<br>
				<a href='http://www.global-capital-inv-union.com/login.php'>Please, click here to log into your secure online account.<br></a>
				Please, endeavor to keep your username and password safe, secure and known to you alone.<br><br>
			</div>
			<div>
				<p>
					Your username is: <b>$username</b>, and your password is: <b>$password</b>
                		</p>
			</div>
			<div>
                		<p>
					Thanks,<br>
                   			Warm regards.
                		</p>
				<p style='color:#4E7B28;'>Global Capital Investment Union.</p>
			</div>
                </body>
            </html>";

/* Headers */
$headers = 'MIME-Version: 1.0' . PHP_EOL;
$headers .= 'Content-type: text/html; charset=UTF-8' . PHP_EOL;

// More headers
$headers .= 'From: admin@global-capital-inv-union.com' . PHP_EOL;
$headers .= 'Reply-To: globalcapitalinvestmentunion@consultant.com' . PHP_EOL;
$headers .= 'X-Mailer: PHP/' . phpversion();

/* Send email */
mail($to, $subject, $message, $headers);
echo 'Mail Sent. Thank you: ' . $_POST['email'] . ', we will contact you shortly.';

?>



/*** INCLUDE IN process_forgot_password.php ***/

<?php
// Sending email to admin after user fills forgot password form

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];

/* Recipient */
$to = "admin@global-capital-inv-union.com";

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
$headers .= 'Reply-To: globalcapitalinvestmentunion@consultant.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

/* Send email */
mail($to, $subject, $message, $headers);
echo 'Mail Sent. Thank you: ' . $_POST['firstname'] . ', we will contact you shortly.';

?>