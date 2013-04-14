<?php
  require "config.php";
  session_start();

  if (isset($_POST['userName'])){
    if (preg_match("/^\w+$/i", $_POST['userName'])) {
      $_SESSION['userName'] = $_POST['userName'];
    }
    else {
      echo "User name must be an undivided character string (no spaces), and can only contain letters and numbers. Mixed-case names are permitted.";
    }
    
    header("Location: online.php");
  }

  if (isset($_SESSION['userName'])){
    $userName = $_SESSION['userName'];
  }
  else {
    $userName = "";
  }
  
?>
<!doctype html>
<html>
<head>
  <link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="main.css"/>
  <link rel="stylesheet" type="text/css" href="submitQ.css"/>
</head>

<body>
<div class="wrapper">
<div id="header">
    <div id="logo">
    <center><a href="http://nosb.org" target="blank"><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/></a><br/></center>
        <ul id="navbar">
        <li class="current"><a href="index.php"><span>Play</span></a></li>
        <li><a href="submitQ.php"><span>Add Questions</span></a></li>
        <!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
        <li><a href="about.html"><span>About</span></a></li>
        <li><a href="rules.html"><span>Rules</span></a></li>
        <li><a href="contact.php"><span>Contact</span></a></li>
        </ul><br/><p>
    <center><br/><a href="http://seagrant.mit.edu/" target="blank"><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></a></center><br/>
    <!--<br/><center><img src="pics/stock3.jpg" alt="cuttlefish"/></center>-->
    </div>
    <h1 id="title"><center>Enter a name for the public leaderboard</center></h1>
</div>
<div id="main">
    <p>Enter a screen name to identify yourself on the public leaderboard. Your screen name is analagous to a social media handle, or username portion of an email address. Choose a nickname for yourself or, in the case of team play, one for your school. Names must be an undivided character string (no spaces) of letters and numbers only. Mixed-case names are permitted.<p>
    <p>Once you have submitted your screen name, you will be taken to a players "lobby". If there is at least one other player waiting there, you will be paired with an opponent automatically, and the game will start. If there are no other players in lobby, a "Waiting for opponent..." messsage is displayed until an opponent arrives and the game begins.<p>
    <p>The leader board is displayed with the post-game summary that follows the timed quiz. It lists the screen names of players having the most correct answers in one day.<p>
    <div id="newQuestionContainer">
    <form method="post" action="setUserName.php">
        <input name="userName" id="userName" pattern="^\w+$" value="<?= $userName ?>">
        <label for="userName">Your Screen Name</label>
        <br>
        <input type="submit" value="Confirm Name">
    </form>
	</div>
</div>
</div>
</body>
</html>