<?php
  require "config.php";
  session_start();

  if(!isset($_SESSION['userName'])){
    header("Location: setUserName.php");
  }

  if(isset($_SESSION['questionIDs'])){
    unset($_SESSION['questionIDs']);
  }
  $_SESSION['questionIDs']=array();
  
?>
<!doctype html>
<html>
<head>
  <link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
  <meta charset="utf-8">
  <title>Online Game</title>
  <link rel="stylesheet" type="text/css" href="main.css"/>
  <link rel="stylesheet" type="text/css" href="single.css"/>
  <link rel="stylesheet" type="text/css" href="online.css"/>
  <script type="text/javascript" src="jquery-1.5.min.js"></script>
  <script type="text/javascript" src="socket.io.js"></script>
  <script type="text/javascript" src="keyDecode.js"></script>
  <script type="text/javascript" src="online.js"></script>
  <script>
    window.nodePath = "<?= $NODE_PATH ?>";
    window.userName = "<?= $_SESSION['userName'] ?>";
  </script>
</head>

<body>
<div class="wrapper">
<div id="header">
  <div id="logo">
  <center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/></center>
    <ul id="navbar">
      <li class="current"><a href="index.php"><span>Play</span></a></li>
      <li><a href="submitQ.php"><span>Write Questions</span></a></li>
      <!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
      <li><a href="about.html"><span>About</span></a></li>
        <li><a href="rules.html"><span>Rules</span></a></li>
        <li><a href="contact.php"><span>Contact</span></a></li>
  </ul><br/><p>
  <br/><center><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></center><br/><br/>
  </div>
  </div>
  <div class="status" id="buzzer">
    <img id="imgP1" src="pics/key_q.png" alt="Q"/>
    <span id="buzzer-label"></span>
  </div>
  <div class="status" id="buzzed">
    
  </div>
    <h1 id="title">Online Game</h1>
    

</div>

<div class="content" id="lobby">

  <h3>Lobby</h3>

  <p id="lobby-status">Waiting for opponent... <img src="pics/throbber.gif"></p>

  <p><a href="index.php">Back</a></p>

</div>

<div class="content" id="gamespace"><!--new--><div id="column1">

  <div id="col_top">
        <h4 id="category" style="margin-top:4px;margin-bottom:4px;"> Category:</h4>
        <h4 id="questionDifficulty" style="margin-top:4px;margin-bottom:4px;">Difficulty: </h4>
        </div>
        <div id="col_bot">
      <h3 id="questionHeader" style="margin-top:20px;margin-bottom:4px;">Question: </h3><p id="questionText" style="color:#000;font-size:16px;font-weight;bold;"></p>
        <h3>Choices:</h3>
        
        <form id="submitAnswerForm">
          <div style="color:#000;font-size:16px;font-weight;bold;">
          <ul id="choices">
            <li id='0'> <input type='radio' name='answer' value='0'/></li><br/>
              <li id='1'> <input type='radio' name='answer' value='1'/></li><br/>
              <li id='2'> <input type='radio' name='answer' value='2' /></li><br/>
              <li id='3'> <input type='radio' name='answer' value='3'/></li>
          </ul>
          </div><br/>
          <input type="submit" id="submitAnswer" value="Submit">
          <button id="pass">Pass</button>
          <button id="buzzer">Buzz in to answer</button>
        </form>
        

</div>
<!--End Column1 --> 
</div>
<div id="column2">
  <h3 id="timer"></h3>
  <h3 id="questionTimer"></h3>
  <p/>
    <h3 class="stats">Stats</h3>
    <h4 id="playerCorrect" class="stats"></h4>
    <h4 id="playerWrong" class="stats"></h4>
    <h4 id="opponentCorrect" class="stats"></h4>
    <h4 id="opponentWrong" class="stats"></h4>
    <!--End Column2--></div>

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
    <input type="text" name="answerArrayP2" id="answerArrayP2"/>
    <input type="text" name="idArray" id="idArray"/>
    <input type="text" name="answeredCorrect" id="answeredCorrect"/>
    <input type="text" name="answeredCorrectP2" id="answeredCorrectP2"/>
    <input type="text" name="answeredWrong" id="answeredWrong" />
    <input type="text" name="answeredWrongP2" id="answeredWrongP2" />
    <input type="text" name="userAnswers" id="userAnswers" />
    <input type="text" name="userAnswersP2" id="userAnswersP2" />
    <input type="text" name="timeElapsed" id="timeElapsed" />
    <input type="text" name="aveTimePerQuestion" id="aveTimePerQuestion" />
    <input type="text" name="aveTimePerQuestionP2" id="aveTimePerQuestionP2" />
    <input type="text" name="playerCount" id="playerCount" />
    <input type="hidden" name="gameType" value="online"/>
  <input type="submit" id="submitForm"/>
</form>
</main><!--new-->
</body>
</html>
