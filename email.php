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
	$subject = "OSQ: New Question Submission";
	//define the message to be sent. Each line should be separated with \n
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$grade = $_POST['grade'];
	$schoolname = $_POST['schoolname'];
	$email = $_POST['email'];
	$region = $_POST['region'];
	$category = $_POST['category'];
	$difficulty = $_POST['difficulty'];
	$question = $_POST['question'];
	$w = $_POST['W'];
	$x = $_POST['X'];
	$y = $_POST['Y'];
	$z = $_POST['Z'];
	$answer = $_POST['answer'];
	$ref = $_POST['ref'];
	$rationale = $_POST['rationale'];
	$message = "New question submitted to Ocean Sciences Quiz. \n 
				From: " . $firstname . " " . $lastname . "\n
			    Email: " . $email . "\n\n
				 Grade Level: " . $grade . "\n\n
			    School Name: " . $schoolname . "\n\t
				Region: " . $region . "\n\n
				Question Category: " . $category . "\n\n
				Question Difficulity: " . $difficulty . "\n\n
			    Question: " . $question . "\n
			    Choices: " . "\n\t	
			    W: " . $w . "\n\t
			    X: " . $x . "\n\t
			    Y: " . $y . "\n\t
			    Z: " . $z . "\n
			    Answer: " . $answer . "\n
			    Reference: " . $ref . "\n
			    Rationale: " . $rationale . "\n";
	//send the email
	$mail_sent = mail($to, $subject, $message);
	//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
	return $mail_sent ? "Mail sent" : "Mail failed";
}


?>