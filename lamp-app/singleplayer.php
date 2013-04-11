<?php
	session_start();
	if(isset($_SESSION['questionIDs'])){
    	unset($_SESSION['questionIDs']);
	}
	$_SESSION['questionIDs']=array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Single-player Game</title>
<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="stylesheet" type="text/css" href="single.css"/>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript" src="singleCode.js"></script>



</head>

<body>
<div class="wrapper">
<div id="header">
	<div id="logo">
	<center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/></center>
		<ul id="navbar">
    	<li class="current"><a href="index.php"><span>Play</span></a></li>
    	<li><a href="submitQ.php"><span>Add Questions</span></a></li>
    	<!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
    	<li><a href="about.html"><span>About</span></a></li>
      	<li><a href="rules.html"><span>Rules</span></a></li>
      	<li><a href="contact.php"><span>Contact</span></a></li>
	</ul><br/><p>
	<br/><center><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></center><br/><br/>
	</div>
	</div>
	
    <h1 id="title">Single Player Game</h1>
    

</div>
<div id="gamespace"><!--new--><div id="column1">

 	<div id="col_top">
        <h4 id="category" style="margin-top:4px;margin-bottom:4px;"> Category:</h4>
        <h4 id="questionDifficulty" style="margin-top:4px;margin-bottom:4px;">Difficulty: </h4>
        </div>
        <div id="col_bot">
     	<h3 id="questionHeader" style="margin-top:20px;margin-bottom:4px;">Question: </h3><p id="questionText" style="color:#000;font-size:16px;font-weight;bold;"></p>
        <h3>Choices:</h3>
        <div style="color:#000;font-size:16px;font-weight;bold;">
        <ul id="choices">
       	  <li id='0'> <input type='radio' name='answer' value='0'/></li><br/>
            <li id='1'> <input type='radio' name='answer' value='1'/></li><br/>
            <li id='2'> <input type='radio' name='answer' value='2' /></li><br/>
            <li id='3'> <input type='radio' name='answer' value='3'/></li>
        </ul></div><br/>
        <button type="button" id="submitAnswer" class="submitBut" value="Submit">Enter/Return</button>
        <button type="button" id="nextQuestion" class="submitBut" value="Next Question">Next Question</button>
</div>
<!--End Column1 --> 
</div>
<div id="column2">
	<h3 id="timer">Time 6:00</h3>
    <button type="button" id="pause" class="gameControls">Pause</button>
    <button type="button" id="continue" class="gameControls">Continue</button>
	<p/><button type="button" id="endGame" class="gameControls">End Game</button>
    <br/>
    <h3 class="stats" style="color:black">Stats</h3>
    <h4 id="correct" style="color:black" class="stats">Correct: </h4>
    <h4 id="wrong" style="color:black" class="stats">Wrong: </h4>
    <h4 id="pauseMessage">Game Paused</h4><!--End Column2--></div>

<!--<div id="footer">
	 <button type="button" id="endGame" class="gameControls">End Game</button>
</div>-->

<form action="endGame.php" method="post" name="vars" id="hiddenForm">
    <input type="text" name="catArray" id="catArray" />
    <input type="text" name="ratArray" id="ratArray" />
    <input type="text" name="diffArray" id="diffArray" />
	<input type="text" name="qArray" id="qArray" />
    <input type="text" name="wArray" id="wArray" />
    <input type="text" name="xArray" id="xArray"/>
    <input type="text" name="yArray" id="yArray"/>
    <input type="text" name="zArray" id="zArray"/>
    <input type="text" name="answerArray" id="answerArray"/>
    <input type="text" name="idArray" id="idArray"/>
    <input type="text" name="answeredCorrect" id="answeredCorrect"/>
    <input type="text" name="answeredWrong" id="answeredWrong" />
    <input type="text" name="userAnswers" id="userAnswers" />
    <input type="text" name="timeElapsed" id="timeElapsed" />
    <input type="text" name="aveTimePerQuestion" id="aveTimePerQuestion" />
	<input type="submit" id="submitForm"/>
</form>
</main><!--new-->
</body>
</html>
