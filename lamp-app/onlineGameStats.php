<?php
  session_start();
?>
<!doctype html >
<html>
<head>
<meta charset="utf-8" />
<title>Online Game Summary: Ocean Sciences Quiz</title>
<link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="stylesheet" type="text/css" href="submitQ.css"/>
<link rel="stylesheet" type="text/css" href="stats.css"/>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
</head>

<body>

<div class="wrapper">
<div id="header">
  <div id="logo">
  <center><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/><br/></center>
  <ul id="navbar">
      <li><a href="index.php"><span>Play</span></a></li>
      <li><a href="submitQ.php"><span>Write Questions</span></a></li>
      <li><a href="contest.html"><span>Contest</span></a></li>
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
      <td><h4>Player</h4></td>
      <td style="text-align:center"><p id="elapsed" class="statTable"><?= htmlspecialchars($_GET["playerTime"]) ?></p></td>
      <td style="text-align:center"><p id="numQs" class="statTable"><?= htmlspecialchars($_GET["playerQuestions"]) ?></p></td>
      <td style="text-align:center"><p id="numCorrect" class="statTable"><?= htmlspecialchars($_GET["playerCorrect"]) ?></p></td>
      <td style="text-align:center"><p id="numWrong" class="statTable"><?= htmlspecialchars($_GET["playerWrong"]) ?></p></td>
      <td style="text-align:center"><p id="aveRespT" class="statTable"><?= htmlspecialchars($_GET["playerAve"]) ?></p></td>
    </tr>
    <tr>
      <td><h4>Opponent</h4></td>
      <td style="text-align:center"><p id="elapsedP2" class="statTable"><?= htmlspecialchars($_GET["opponentTime"]) ?></p></td>
      <td style="text-align:center"><p id="numQsP2" class="statTable"><?= htmlspecialchars($_GET["opponentQuestions"]) ?></p></td>
      <td style="text-align:center"><p id="numCorrectP2" class="statTable"><?= htmlspecialchars($_GET["opponentCorrect"]) ?></p></td>
      <td style="text-align:center"><p id="numWrongP2" class="statTable"><?= htmlspecialchars($_GET["opponentWrong"]) ?></p></td>
      <td style="text-align:center"><p id="aveRespTP2" class="statTable"><?= htmlspecialchars($_GET["opponentAve"]) ?></p></td>
    </tr>
    
<!--        <button type="button" id="newGameBut">New Game</button> -->
   </table>



</div>
<br/>
<div style="width:100%">
  <?php
    // TODO don't have this require always echo out stuff, the
    // comment is a short-term hack
    echo "<!--";
    require("questionsJson.php");
    echo "-->";
    $questionIDsStr = htmlspecialchars($_GET["questionIDs"]);
    $questionIDs = explode(",", $questionIDsStr);
    $questions = get_questions($questionIDs);
  ?>
  <h2>All <?= count($questionIDs) ?> Questions from This Game</h2>
    <div id="questionBox">
      <!--dummy answers-->
      
        <table id="questionTable">
          <th><h6>Result</h6></th>
          <th><h6>Area / Difficulty</h6></th>
            <th><h6>Question</h6></th>
            <th><h6>Answer</h6></th>
      <th><h6>Your Answer</h6></th>
       <th><h6>Rate Question</h6></th>
          <?php
            foreach ($questions as $question) {
              $choices = $question["choices"];
              echo "<tr>";
              echo "<td></td>";
              echo "<td>" . $question["category"] . "</td>";
              echo "<td>" . $question["question"] . "</td>";
              echo "<td>" . $choices[$question["answer"]] . "</td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>
</div>
</div>

</body>
</html>
