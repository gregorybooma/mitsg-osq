<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit Questions to Ocean Sciences Quiz</title>
<link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="stylesheet" type="text/css" href="submitQ.css"/>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript" src="validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit').click(function(){ //do form validation
		var pass = true;
		pass = pass && checkQuestionFormsFilled();
		pass = pass && checkEmailValidity($('#email').val());
		if (!pass){
			return false;
		}
	});
});
</script>

<?php
	session_start();
?>
</head>

<body>
<div class="wrapper">
<div id="header">
	<div id="logo">
	<center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/><br/></center>
	<ul id="navbar">
    	<li><a href="index.php"><span>Play</span></a></li>
    	<li><a href="submitQ.php"><span>Write Questions</span></a></li>
    	<!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
    	<li><a href="about.html"><span>About</span></a></li>
      	<li><a href="rules.html"><span>Rules</span></a></li>
      	<li class="current"><a href="contact.php"><span>Contact</span></a></li>
	</ul><br/><p>
	<center><br/><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></center><br/><br/>
	</div>
	
	
    <h1 id="title"><center> Contact Us </center></h1>
    

</div>
<div id="main">
	<p>Have Questions, Comments, or Suggestions? We welcome your input, and will respond to your concerns whenever possible.</p>
    
    <div id="newQuestionContainer">
    <form id="newQuestion" action="emailcontact.php" method="post">
        <table>
			<tr>
            	<td class="text">First name:</td> 
            	<td class="border"><input type="text" name="firstname" id="firstname" size="52" /></td>
            </tr>
			<tr>
            	<td class="text">Last name: </td>
                <td class="border"><input type="text" name="lastname" id="lastname" size="52" /> </td>
            </tr>
            <tr>
            	<td class="text">Email:</td> 
                <td class="border"><input type="text" name="email" id="email" size="52" /></td>
            </tr>
            <tr>
            	<td class="text">Question:</td>
                <td class="border"><textarea name="question" id="question" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
        </table>
        <br/>
       <padding-left:50px> <?php
          require_once('recaptcha-php-1.11/recaptchalib.php');
          $publickey = "6LcRRcMSAAAAAGxaabdU6HJkWm9LUhAm8Ta-eRey"; // got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" id="submit" value="Submit" class="button"/>

    </form>
    </div>


<!---	<div id="footer"></div>
</div>-->
</body>
</html>
