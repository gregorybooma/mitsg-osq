<?php 
    session_start();
    //session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocean Sciences Quiz Home</title>
<link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="main.css"/>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript" src="mainCode.js"></script>

</head>

<body>

<div class="wrapper">
<div id="header">
    <div id="logo">
    <center><a href="http://nosb.org" target="blank"><img src="pics/NOSB_old.jpg" alt="NOSB logo background"/></a><br/></center>
        <ul id="navbar">
        <li class="current"><a href="index.php"><span>Play</span></a></li>
        <li><a href="submitQ.php"><span>Write Questions</span></a></li>
        <li><a href="contest.html"><span>Contest</span></a></li>
        <li><a href="about.html"><span>About</span></a></li>
        <li><a href="rules.html"><span>Rules</span></a></li>
        <li><a href="contact.php"><span>Contact</span></a></li>
    </ul><br/><p>
    <center><br/><a href="http://seagrant.mit.edu/" target="blank"><img src="pics/sp.png" alt="MIT Sea Grant Logo"/></a></center><br/>
    <!--<br/><center><img src="pics/stock3.jpg" alt="cuttlefish"/></center>-->
    </div>
    
    
    <h1 id="title"><center>Ocean Sciences Quiz</center></h1>
    

</div>

<!--popup for Rules-->
<div id="window">
    <div id="popup_content">
        <div id="sp_rules">
        <h3 style="text-decoration:underline">Rules: Single-Player Mode</h3>
        <h4>Single-Player Controls:</h4>
        Use your mouse to select your answer choice, or buzz in with the key that corresponds to your answer choice (W, X, Y, or Z). 
        <p>Then, click on the on-screen buttons to submit your answer and move on to the next question, or hit the the "enter" key on your keyboard to submit a response, and then hit "enter" again to move on to the next question.
        <h4>Two-Player Controls:</h4>
        <b>Player 1</b> can buzz in using the Q key on the keyboard. 
        <p><b>Player 2</b> can buzz in using the P key on the keyboard. 
        <p> The active player button will light up to indiciate which player buzzed in first. Use the mouse to select the desired answer choice, or buzz in with the key that corresponds to the answer choice (W, X, Y, or Z). 
        <p>Then, click on the on-screen buttons to submit the answer and move on to the next question, or hit the the "enter" key on the keyboard to submit a response, and then hit "enter" again to move on to the next question.
        <h4>Time limit: </h4>6 minutes per game. The timer starts counting as soon as the next page loads, and does not pause between questions. You can, however, manually pause to take a break.</p>
        <h4>Question format:</h4>
        Multiple choice.<p>
        <h5>See the <a href="rules.html" style="text-decoration:underline" target="_blank">Rules</a> for more details.</h5>
        </div>
        <div id="mp_rules">
        </div>
    </div>
</div>

<!--main div-->


<form id="chooseGame" action="chooseGame.php" method="post">
    <div id="gameplay">
        <h3>&nbsp;&nbsp;Select Gameplay</h3>
        <div class="choiceList">
            <input type="radio" name="playerNum" value="single" checked="checked"/> Single-player
            <input type="radio" name="playerNum" value="multi" /> Two-player on your computer
            <input type="radio" name="playerNum" value="online" /> Two-player online
        </div>
        <p/>
        <input id="toggleOpts" class="button2" type="button2" value="Choose Game Topics" /><p/>
        <input id="displayRules" class="button2" type="button2" value="Display Rules"/>
        <p/>
        <input id="start" class="button" type="submit" value="Start Game" />
        <br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="contest.html"><img src="http://seagrant.mit.edu/osm/pics/cutfish.png" alt="contest message"/></a>
    </div>

    <div id="rightCol">
        <div class="categories">
            <h4 class="toggleVisible">Question Categories</h4>
            <div class="choiceList">
            <input class="toggleVisible" type="checkbox" name="category[]" value="Biology" checked="checked" /> <b>Biology</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Chemistry" checked="checked"/> <b>Chemistry</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Geography" checked="checked"/> <b>Geography</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Geology" checked="checked"/> <b>Geology</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Marine Policy" checked="checked"/> <b>Marine Policy</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Physical Oceanography" checked="checked"/> <b>Physical Oceanography</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Social Sciences" checked="checked"/> <b>Social Sciences</b> <br/>
            <input class="toggleVisible" type="checkbox" name="category[]" value="Technology" checked="checked"/> <b>Technology</b> <br/>
            
          </div>
          <!--<button id="chooseAll" type="button">Select All</button>
          <button id="chooseNone" type="button">Deselect All</button>-->
          <br/><B> Press "Start Game"<br/>
          when done.</b>
          <br/>
        </div>
    </div>    
</form>
   <div id="BLB" style="pointer-events: none;">
     <!--       <img src="pics/NOSB_big.jpg" alt="NOSB logo background"/>  -->
    </div>
    

<!--end Main div--></div>
<div id="popup"></div>
<!--<div id="footer">For best results, use Mozilla Firefox, Google Chrome, or Safari.</div> -->
<!--end Wrapper div--></div>
</body>
</html>
