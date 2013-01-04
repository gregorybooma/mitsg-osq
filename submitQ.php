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
<div class="wrapper">
<div id="header">
	<div id="logo">
	<center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/><br/></center>
	<ul id="navbar">
    	<li><a href="index.php"><span>Play</span></a></li>
    	<li class="current"><a href="submitQ.php"><span>Write Questions</span></a></li>
    	<li><a href="contest.html"><span>Contest</span></a></li>
    	<li><a href="about.html"><span>About</span></a></li>
      	<li><a href="rules.html"><span>Rules</span></a></li>
      	<li><a href="contact.php"><span>Contact</span></a></li>
	</ul><br/><p>
	<center><br/><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></center><br/><br/>
	</div>
	
	
    <h1 id="title"><center>Submit Questions</center></h1>
    

</div>

<div id="main">
	<h3>Contribute to the Question Bank</h3>
	<p>One of the best ways to prepare for your regional and national NOSB Competitions is to write your own questions. Writing questions helps you build a complete mastery of a subject area.</p> 
	<p>Now, you can share your questions with a national audience through Ocean Sciences Quiz!</p>
	<p>To add your question, just fill the form below and hit submit. We'll vet your question, and if it passes muster, we'll add it to the game. Be sure to include your email address, and NOSB region in this form so that we can give credit where it's due. We'll never share your email address or add you to a list, but we may contact you about your question.<p> Check out the guidelines on <a href="http://www.nosb.org/wp-content/uploads/2010/07/Guidelines-to-Writing-Buzzer-Questions-for-the-NOSB.pdf">how to write good questions</a> from the National Ocean Sciences Bowl website.</p>
    
    <div id="newQuestionContainer">
    <form id="newQuestion" action="email.php" method="post">
    	<h4>Your information</h4>
        <table>
			<tr>
            	<td class="text">First name:</td> 
            	<td class="border"><input type="text" name="firstname" id="firstname" size="50" /></td>
            </tr>
			<tr>
            	<td class="text">Last name: </td>
                <td class="border"><input type="text" name="lastname" id="lastname" size="50" /> </td>
            </tr>
            <tr>
            	<td class="text">Email:</td> 
                <td class="border"><input type="text" name="email" id="email" size="50" /></td>
            </tr>
              <tr>
            	<td class="text">Your Grade Level:</td> 
                <td>
                    <select name="grade" id="grade">
                    	<option value="none"></option>
                    	<option value="K-5">K-5</option>
                    	<option value="6-8">6-8</option>
                      	<option value="9-12">9-12</option>
                      	<option value="College">College</option>
                      	<option value="Professional">Professional</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td class="text">School Name:</td>
                <td class="border"><input type="text" name="schoolname" id="schoolname" size="50" /></td>
            </tr>
            <tr>
            	<td class="text">NOSB region:</td> 
                <td>
                    <select name="region" id="region">
                    	<option value="none"></option>
                    	<option value="other">other</option>
                    	<option value="Alaska">Alaska</option>
                      	<option value="California">California</option>
                      	<option value="Colorado">Colorado</option>
                      	<option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="Texas">Texas</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Washington">Washington</option>
                        <option value="Washington, DC">Washington, DC</option>
                        <option value="Wisconsin">Wisconsin</option> 
                    </select>
                </td>
            </tr>
            <tr>
            	<td class="text">Question Category:</td> 
                <td>
                    <select name="category" id="category">
                    	<option value="none"></option>
                    	<option value="Biology">Biology</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Geology">Geology</option>
                        <option value="MarinePolicy">Marine Policy</option>
                        <option value="PhysicalOceanography">Physical Oceanography</option>
                        <option value="SocialSciences">Social Sciences</option>
                        <option value="Technology">Technology</option> 
                    </select>
                </td>
            </tr>
                     <tr>
            	<td class="text">Question Difficulty:</td> 
                <td>
                    <select name="difficulty" id="difficulty">
                    	<option value="none"></option>
                    	<option value="easy">easy</option>
                        <option value="moderate">moderate</option>
                        <option value="difficult">difficult</option>
                    </select>
                </td>
            </tr>
        </table>
        <h4>Proposed question</h4>
        <table>
        	<tr>
            	<td class="text">Question:</td>
                <td class="border"><textarea name="question" id="question" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
            	<td>Choices:</td>
                <td></td>
            </tr>
            <tr>
            	<td class="text">W:</td>
                <td class="border"><input type="text" name="W" id="W" size="52" /></td>
            </tr>
            <tr>
            	<td class="text">X:</td> 
                <td class="border"><input type="text" name="X" id="X" size="52" /></td>
            </tr>
            <tr>
            	<td class="text">Y:</td>
                <td class="border"><input type="text" name="Y" id="Y" size="52" /></td>
            </tr>
            <tr>
            	<td class="text">Z:</td> 
                <td class="border"><input type="text" name="Z" id="Z" size="52" /></td>
            </tr>
            <tr></tr>
        	<tr>
            	<td>Answer: </td> 
                <td>
                	<select id="answer" name="answer">
						<option value="none"></option>
                    	<option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                    </select>
                </td>
             <tr>
            	<br/><td class="text">Question Reference:</td> 
                <td class="border"><input type="text" name="ref" id="Z" size="52" /></td>
            </tr>
             <tr>
            	<br/><td class="text">Explaination of Correct Answer:</td> 
                <td class="border"><input type="text" name="rationale" id="Z" size="52" /></td>
            </tr>
            </tr>
        </table>
        <br/>
        <?php
          require_once('recaptcha-php-1.11/recaptchalib.php');
          $publickey = "6LcRRcMSAAAAAGxaabdU6HJkWm9LUhAm8Ta-eRey"; // got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" id="submit" value="Submit" class="button"/>
    </form>
    </div>


<!--	<div id="footer"></div>
</div>-->
</body>
</html>
