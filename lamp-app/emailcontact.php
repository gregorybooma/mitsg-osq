<?php

session_start();

//Captcha code
  require_once('recaptcha-php-1.11/recaptchalib.php');
  $privatekey = "6LcRRcMSAAAAAMmnnE0By9c3-IjMMedbOlqJ1roO";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    $response = sendMail();
	echo $response;
  }


function sendMail(){
	$to = 'seagrant-ed@mit.edu, NOSB@oceanleadership.org';
	$subject = "OSQ: OSQ Comment";
	//define the message to be sent. Each line should be separated with \n
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$question = $_POST['question'];
	$message = "New user comment submitted to Ocean Sciences Quiz. \n 
				From: " . $firstname . " " . $lastname . "\n
			    Email: " . $email . "\n\n
			    Question: " . $question . "\n";
	//send the email
	$mail_sent = mail($to, $subject, $message);
	//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
	return $mail_sent ? "Mail sent" : "Mail failed";
}


?>