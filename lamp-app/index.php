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
        <!-- <li><a href="contest.html"><span>Contest</span></a></li> -->
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
    <a href="#" id="closePopup">[close]</a>
    <div id="popup_content">
        <div id="sp_rules">
        <h3 style="text-decoration:underline">Rules: </h3>
			<h3>Single-Player Mode</h3>
			<p>The single-player mode allows you to quiz yourself. </p>
			<table>
			<tr>
					<td class="title">Single-Player Controls: </td>
					<td>Use your mouse to select your answer choice, or buzz in with the key that corresponds to your answer choice (W, X, Y, or Z). 
					<p>Then, click on the on-screen buttons to submit your answer and move on to the next question, or hit the the "enter" key on your keyboard to submit a response, and then hit "enter" again to move on to the next question.</td>
			 </tr>
			 </table>
			<h3>Two-Player Mode</h3>
			<p>The Two-player mode allows you to play against an opponent, on one computer.</p>
			<table>
			 <tr>
					<td class="title">Two-Player Controls: </td>
					<td><b>Player 1</b> can buzz in using the Q key on the keyboard. 
					<p><b>Player 2</b> can buzz in using the P key on the keyboard. 
					<p> The active player button will light up to indiciate which player buzzed in first. Use the mouse to select the desired answer choice, or buzz in with the key that corresponds to the answer choice (W, X, Y, or Z). 
					<p>Then, click on the on-screen buttons to submit the answer and move on to the next question, or hit the the "enter" key on the keyboard to submit a response, and then hit "enter" again to move on to the next question.</td>
			 </tr>
			  <tr>
					<td class="title">Choose Game Topics: </td>
					<td>Click on the "Choose Game Topics" text on the main "Play" page to select the subject matter for the round of play. Note that the questions in the OSQ are limited--if you select too few subjects, the round may be cut short. </td>
				</tr>
				<tr>
					<td class="title">Time limit: </td>
					<td>6 minutes per game. The timer starts counting as soon as the next page loads, and does not pause between questions. You can, however, manually pause to take a break.</td>
				</tr>
				<tr>
					<td class="title">Question format: </td>
					<td>Multiple choice.</td>
				</tr>
				<tr>
					<td class="title">Feedback: </td>
					<td><span class="green">Correct answers</span> will be <span class="green">large, green and bold</span>; <span class="red">incorrect answers</span> will be marked <span class="red">red</span>.</td>
				</tr>
				<tr>
					<td class="title">Ending the game: </td>
					<td>The match will end after 6 minutes have passed, or after you've exhausted our question database. You can also end a match at any time by hitting the "End Game" button in the bottom right.  Clicking on one of the tabs or navigating to a new window at the top of the page will also end a match, but you will not receive game statistics.</td>
				</tr>
			</table>
			<br/>
	
			<h3>Two-player Online Mode</h3>
			<p>The Two-player Online mode allows you to play against an opponent via the internet. Currently, you cannot choose your opponent. Competitors are matched on a first-come, first-served basis.</p>
			<table>
			 <tr>
					<td class="title">Two-player Online Controls: </td>
					<td>Players can buzz-in either by using the Q key on the keyboard, or clicking the "Buzz-in to answer" button. Players may also click the "Pass" button to pass.
					<p> A message will appear indicating which player buzzed-in first. That player can use the mouse to select the button corresponding to the desired answer choice, or with the key that corresponds to the answer choice (W, X, Y, or Z). 
					<p> The player must then submit their answer either by clicking "Submit" or typing the "return" (or "enter") key on the keyboard.</td>
			 </tr>
				<tr>
					<td class="title">Time limit: </td>
					<td>6 minutes per game. The timer starts counting as soon as the next page loads, and does not pause between questions. </td>
				</tr>
				<tr>
					<td class="title">Question format: </td>
					<td>Multiple choice.</td>
				</tr>
				<tr>
					<td class="title">Ending the game: </td>
					<td>The match will end after 6 minutes have passed, or after you've exhausted our question database. Clicking on one of the tabs or navigating to a new window at the top of the page will end a match, but you will not receive game statistics.</td>
				</tr>
			</table>
			<br/>
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
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="contest.html"><img src="http://seagrant.mit.edu/osm/lamp-app/pics/cutfish.png" alt="contest message"/></a>
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
