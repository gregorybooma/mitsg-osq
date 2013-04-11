<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Summary: Ocean Sciences Quiz</title>
<link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />


<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="stylesheet" type="text/css" href="submitQ.css"/>
<link rel="stylesheet" type="text/css" href="stats.css"/>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript">
	var delimiter = "XITEMX";
	var c = "<?php echo $_SESSION['catArray'];?>".split(delimiter);
	var r = "<?php echo addslashes($_SESSION['ratArray']);?>".split(delimiter);
	var d = "<?php echo $_SESSION['diffArray'];?>".split(delimiter);
	var q = "<?php echo $_SESSION['qArray'];?>".split(delimiter);
	var w = "<?php echo $_SESSION['wArray'];?>".split(delimiter);
	var x = "<?php echo $_SESSION['xArray'];?>".split(delimiter);
	var y = "<?php echo $_SESSION['yArray'];?>".split(delimiter);
	var z = "<?php echo $_SESSION['zArray'];?>".split(delimiter);
	var answer = "<?php echo $_SESSION['answerArray'];?>".split(delimiter);
	var correct = "<?php echo $_SESSION['answeredCorrect'];?>".split(delimiter);
	var wrong = "<?php echo $_SESSION['answeredWrong'];?>".split(delimiter);
	var userAns = "<?php echo $_SESSION['userAnswers'];?>".split(delimiter);
<?php if(isset($_SESSION['playerCount'])&&($_SESSION['playerCount']=='multi')) { ?>
	var answerP2 = "<?php echo $_SESSION['answerArrayP2'];?>".split(delimiter);
	var correctP2 = "<?php echo $_SESSION['answeredCorrectP2'];?>".split(delimiter);
	var wrongP2 = "<?php echo $_SESSION['answeredWrongP2'];?>".split(delimiter);
	var userAnsP2 = "<?php echo $_SESSION['userAnswersP2'];?>".split(delimiter);
<?php } ?>	
	var timeElapsed = "<?php echo $_SESSION['timeElapsed'];?>";
	var aveResponseTime = "<?php echo $_SESSION['aveTimePerQuestion'];?>";
	var aveResponseTimeP2 = "<?php echo $_SESSION['aveTimePerQuestionP2'];?>";
	var playerCount = "<?php echo $_SESSION['playerCount'];?>";
</script>
<script type="text/javascript" src="statCode.js"></script>
</head>

<body>

<div class="wrapper">
<div id="header">
	<div id="logo">
	<center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/><br/></center>
	<ul id="navbar">
    	<li><a href="index.php"><span>Play</span></a></li>
    	<li><a href="submitQ.php"><span>Add Questions</span></a></li>
    	<!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
    	<li><a href="about.html"><span>About</span></a></li>
      	<li><a href="rules.html"><span>Rules</span></a></li>
      	<li><a href="contact.php"><span>Contact</span></a></li>
	</ul><br/><p>
	<center><br/><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></center><br/><br/>
	</div>
	
	
    <h1 id="title"><center>Game Summary</center></h1>

    </div>
<div id="gamespace">
    <p> <a href="http://www.surveymonkey.com/s/OceanSciencesQuizSurvey">Take this survey</a> to tell us what you like about the game, and let us how we can continue to improve it!
<div style="width:100%">
	<h2>Game Statistics</h2>
	<table style="width:100%">
		<tr>
			<td></td>
			<td><h4 class="alignM">Total Time</h4></td>
			<td><h4 class="alignM">Total Questions</h4></td>
			<td><h4 class="alignM">Number Correct</h4></td>
			<td><h4 class="alignM">Number Wrong</h4></td>
			<td><h4 class="alignM">Avg. Response Time</h4></td>
		</tr>
		<tr>
			<td><h4><?php if (isset($_SESSION['userName'])) { echo $_SESSION['userName']; } else { echo 'Player 1'; } ?><!--set back to no php Player 1 if screwed-up--></h4></td>
			<td style="text-align:center"><p id="elapsed" class="statTable">(time elapsed)</p></td>
			<td style="text-align:center"><p id="numQs" class="statTable">(number of questions)</p></td>
			<td style="text-align:center"><p id="numCorrect" class="statTable">(number of correct)</p></td>
			<td style="text-align:center"><p id="numWrong" class="statTable">(number of wrong)</p></td>
			<td style="text-align:center"><p id="aveRespT" class="statTable">(avg. response time)</p></td>
		</tr>
		<?php if(isset($_SESSION['playerCount'])&&($_SESSION['playerCount']=='multi')) { ?>
		<tr>
			<td><h4>Player 2</h4></td>
			<td style="text-align:center"><p id="elapsedP2" class="statTable">(time elapsed)</p></td>
			<td style="text-align:center"><p id="numQsP2" class="statTable">(number of questions)</p></td>
			<td style="text-align:center"><p id="numCorrectP2" class="statTable">(number of correct)</p></td>
			<td style="text-align:center"><p id="numWrongP2" class="statTable">(number of wrong)</p></td>
			<td style="text-align:center"><p id="aveRespTP2" class="statTable">(avg. response time)</p></td>
		</tr>
		<?php } ?>
		
<!--        <button type="button" id="newGameBut">New Game</button> -->
   </table>



</div>
<br/>
<div style="width:100%">
	<h2>Questions from This Game</h2>
    <div id="questionBox">
    	<!--dummy answers-->
    	
        <table id="questionTable">
        	<th><h6>Result</h6></th>
        	<th><h6>Area / Difficulty</h6></th>
           	<th><h6>Question</h6></th>
           	<th><h6>Answer</h6></th>
			<th><h6>Your Answer</h6></th>
			 <th><h6>Rate Question</h6></th>
        	<!-- data dynamically added-->
        </table>
    </div>
</div>
</div>

</body>
</html>
