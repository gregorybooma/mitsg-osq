<?php
	session_start();
	
	$_SESSION['catArray']=$_POST['catArray'];
	$_SESSION['ratArray']=$_POST['ratArray'];
	$_SESSION['diffArray']=$_POST['diffArray'];
	$_SESSION['qArray']=htmlspecialchars($_POST['qArray']);
	$_SESSION['wArray']=$_POST['wArray'];
	$_SESSION['xArray']=$_POST['xArray'];
	$_SESSION['yArray']=$_POST['yArray'];
	$_SESSION['zArray']=$_POST['zArray'];
	$_SESSION['answerArray']=$_POST['answerArray'];
	$_SESSION['answerArrayP2']=$_POST['answerArray'];
	//PLAYER-SPECIFIC DATA: PLAYER 1
	$_SESSION['answeredCorrect']=$_POST['answeredCorrect'];
	$_SESSION['answeredWrong']=$_POST['answeredWrong'];
	$_SESSION['userAnswers']=$_POST['userAnswers'];
	$_SESSION['timeElapsed']=$_POST['timeElapsed'];
	$_SESSION['aveTimePerQuestion']=$_POST['aveTimePerQuestion'];
	
	//PLAYER-SPECIFIC DATA: PLAYER 2
	if(isset($_POST['answeredCorrectP2'])&&($_POST['answeredCorrectP2']!="")) {
		$_SESSION['answeredCorrectP2']=$_POST['answeredCorrectP2'];
	}
	if(isset($_POST['answeredWrongP2'])&&($_POST['answeredWrongP2']!="")) {
		$_SESSION['answeredWrongP2']=$_POST['answeredWrongP2'];
	}
	if(isset($_POST['userAnswersP2'])&&($_POST['userAnswersP2']!="")) {
		$_SESSION['userAnswersP2']=$_POST['userAnswersP2'];
	}
	if(isset($_POST['aveTimePerQuestionP2'])&&($_POST['aveTimePerQuestionP2']!="")) {
		$_SESSION['aveTimePerQuestionP2']=$_POST['aveTimePerQuestionP2'];
	}
	$_SESSION['playerCount']=$_POST['playerCount'];
	$_SESSION['gameType']=$_POST['gameType'];
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	header("Location: gameStats.php");
?>