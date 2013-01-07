// JavaScript Document

$(document).ready(function() {
	$('#hiddenForm').hide();

	//Game Timer
	var secs = 1;
	var mins = 6;
	var timeElapsed = -1;
	var timerOn = true;
	var gameOver = false;
	var t;
	var questionCount = 0;
	var questionCountP2 = 0;
	//Stats
	var correct = 0;
	var wrong = 0;
	var correctP2 = 0;
	var wrongP2 = 0;
	var rightIndicator = "CORRECT";
	//Question
	var category = "";
	var question = "";
	var difficulty = "";
	var choices = [];
	var answer;
	var questionID;
	var pastQuestions = [];
	var letters = ["W","X","Y","Z"];
	var ids = ["#0","#1","#2","#3"];
	$('#submitAnswer').attr("disabled","disabled");
	$('#nextQuestion').attr("disabled","disabled"); //start with nextQ button off
	$("#continue").attr("disabled","disabled"); //start with Continue button off
	
	var playerResponding = "";
	
	var catArray = [];
	var qArray = [];
	var ratArray = [];
	var diffArray = [];
	var wArray = []
	var xArray = [];
	var yArray = [];
	var zArray = [];
	var answerArray = [];
	var answerArrayP2 = [];
	var idArray = [];
	
	var answeredCorrect = [];
	var answeredWrong = [];
	var userAnswers = [];
	
	var answeredCorrectP2 = [];
	var answeredWrongP2 = [];
	var userAnswersP2 = [];
	
	var questionTimes = [];
	var questionTimesP2 = [];
	var questionStart;
	
	readAllQuestions();
	writeTimer();
	
	//TIMER
	function writeTimer(){
		//stop if no time on clock
		if (secs==0 && mins==0) {
			//End_Game();
			$("#timer").html("Game Over");
			timerOn = false;
			gameOver = true;
			alert("Round Over: Time up. \nLoading the Game Summary."); 
			endGame();
		}
		else {
			timeElapsed ++;
			if (secs == 0) {
				mins -= 1;
				secs = 59;
			}
			else {
				secs -=1;
			}
			secsToWrite = secs;
			if (secs < 10) {
				secsToWrite = "0"+secs;
			}
			$("#timer").html("Time:  "+mins+":"+secsToWrite);
			t = setTimeout(writeTimer, 1000);
		}
	}
	
	$('#pauseMessage').css('visibility','hidden'); //start with pauseMessage hidden
	
	$("#pause").click(function(){
		$("#pause").attr("disabled","disabled");
		$('#pauseMessage').css('visibility','visible');
		$("#submitAnswer").attr("disabled","disabled");
		$("#choices input[name^=answer]:radio").attr('disabled',true);
		$("#continue").removeAttr("disabled");
		pauseTimer();
	});
	
	$("#continue").click(function(){
		$("#continue").attr("disabled","disabled");
		$('#pauseMessage').css('visibility','hidden');
		$("#pause").removeAttr("disabled");
		$("#submitAnswer").removeAttr("disabled");
		$("#choices input[name^=answer]:radio").attr('disabled',false);
		resumeTimer();
	});
	
	function pauseTimer(){
		if (timerOn){
			clearTimeout(t);
			timerOn = false;
		}
	}
	function resumeTimer(){
		if (!timerOn){
			t = setTimeout(writeTimer, 1000);
			timerOn = true;
		}
	}
	
	function startQuestion(){
		questionStart = timeElapsed;	
	}
	
	function endQuestion(){
		questionEnd = timeElapsed;
		var timeForThisQuestion = questionEnd - questionStart;
		if(playerResponding=="P1") {
			questionTimes.push(timeForThisQuestion);
			//questionTimesP2.push('---');
		} else if(playerResponding=="P2") {
			//questionTimes.push('---');
			questionTimesP2.push(timeForThisQuestion);
		}
	}
	
	function computeAveTime(player){
		//compute average response time
		var averageTime = 0;
		if(player=="P1") {
			for (var i=0; i<questionTimes.length; i++){
				averageTime += questionTimes[i];
			}
			return Math.round(10.0*averageTime/questionTimes.length)/10;
		} else if(player=="P2") {
			for (var i=0; i<questionTimesP2.length; i++){
				averageTime += questionTimesP2[i];
			}
			return Math.round(10.0*averageTime/questionTimesP2.length)/10;
		}
	}
	
	//gets all the matching questions from the DB (up to 100 questions, see php file)
	function readAllQuestions(){
		$.ajax({
			type:"POST",
			url:"sp.php",
			//dataType:"json",
			data:"allQuestions",
			success: function(msg) {
				var allQs = msg.split("<QUESTION>"); //split by question
				for (var i=0; i<allQs.length; i++){  //split by question item
					var oneQuestion = allQs[i].split("<QUESTION_ITEM>");
					catArray[i] = oneQuestion[0];
					diffArray[i] = oneQuestion[1];
					ratArray[i] = oneQuestion[2];
					qArray[i] = oneQuestion[3];
					var choicesSplit = oneQuestion[4].split("<ANSWER>");
					wArray[i] = choicesSplit[0];
					xArray[i] = choicesSplit[1];
					yArray[i] = choicesSplit[2];
					zArray[i] = choicesSplit[3];
					answerArray[i] = oneQuestion[5];
					answerArrayP2[i] = oneQuestion[5];
					idArray = oneQuestion[6];
				}
				newQuestion(); // show the first question				
			}
		});
	}
	
	//gets new Question+choices+answer
	function newQuestion(){
		if(questionCount>=qArray.length){
			alert("Round Over: There are no more questions available for your categories. \nLoading the Game Summary.");
			endGame();
		}
		category = catArray[questionCount];
		rationale = ratArray[questionCount];
		difficulty = diffArray[questionCount];
		question = qArray[questionCount];
		choices[0]=wArray[questionCount];
		choices[1]=xArray[questionCount];
		choices[2]=yArray[questionCount];
		choices[3]=zArray[questionCount];
		answer = answerArray[questionCount];
		questionID = idArray[questionCount];
		
		questionCount++;	
		displayQuestion();	
	}
	
	function displayQuestion(){
		//display category
		document.getElementById("category").innerHTML = "Category: "+category;
		
		//display question
		$('#questionHeader').html("Question "+questionCount+":");
		$('#questionDifficulty').html("Difficulty: " + difficulty);
		$('#questionText').html(question);
		
		//display choices
		var listChoices = "";
		for (var i=0; i<choices.length;i++){
			$(ids[i]).html("<input type='radio' disabled='disabled' name='answer' value='"+i+"'/> " +letters[i]+": "+choices[i]);
		}
		//start question timer
		startQuestion();
	}
	
	//upon submit, reads player's response + checks if correct
	$('#submitAnswer').click(function(){
		submitAnswer(playerResponding);
	});
	
	function submitAnswer(pR){
		//stop question timer
		endQuestion();
		//check that an answer if selected
		var answered = $("input[name=answer]:checked").length;
		if(answered==1){
			answered = $("input[name=answer]:checked");
			answerNum = answered.val().toString();
			if(playerResponding=="P1") {
				userAnswers.push(choices[answerNum]);
				userAnswersP2.push('9');
			} else if(playerResponding=="P2") {
				userAnswers.push('9');
				userAnswersP2.push(choices[answerNum]);
			}
			//check if answer is right; do scoring
			switch (answer){
				case '0':
					if (answered.val()=="0"){
						answerCorrect(playerResponding, '0');
					} else {
						answerWrong(playerResponding, answered.val(),'0');
					}
					break;
				case '1':
					if (answered.val()=="1"){
						answerCorrect(playerResponding, '1');
					} else {
						answerWrong(playerResponding, answered.val(),'1');
					}
					break;
				case '2':
					if (answered.val()=="2"){
						answerCorrect(playerResponding, '2');
					} else {
						answerWrong(playerResponding, answered.val(),'2');
					}
					break;
				case '3':
					if (answered.val()=="3"){
						answerCorrect(playerResponding, '3');
					} else {
						answerWrong(playerResponding, answered.val(),'3');
					}
					break;
				case '9':
					break;
				default:
					answerWrong(playerResponding, answered.val(),'');
			}	
			
		} else{
			return false;
		}
	}
	
	//STATS
	function answerCorrect(player,userAns){
		if(player=="P1") {
			correct += 1;
			$("#correct" + player).html(player + " Correct: "+correct);
		} else if(player == "P2") {
			correctP2 += 1;
			$("#correct" + player).html(player + " Correct: "+correctP2);
		}
		
		displayAnswer(userAns, rightIndicator);
		if(player=="P1") {
			answeredCorrect.push(questionCount-1); /*record correctly answered Q*/
		} else if(player=="P2") {
			answeredCorrectP2.push(questionCount-1); /*record correctly answered Q*/
		}
		
	}
	
	function answerWrong(player, userAns, correctAns){
		if(player=="P1") {
			wrong += 1;
			$("#wrong" + player).html(player + " Wrong: "+wrong);
		} else if(player=="P2") {
			wrongP2 += 1;
			$("#wrong" + player).html(player + " Wrong: "+wrongP2);
		}
		displayAnswer(userAns, correctAns);
		if(playerResponding=="P1") {
			answeredWrong.push(questionCount-1); /*record incorrectly answered Q*/
		} else if(playerResponding=="P2") {
			answeredWrongP2.push(questionCount-1); /*record incorrectly answered Q*/
		}
	}
	
	function displayAnswer(userAns, correctAns){
		//change display
		if (correctAns==rightIndicator){//answer was right
			$('#'+userAns).addClass("correct");
		} 
		else { //answer was wrong
			$('#'+userAns).addClass("incorrect");
			$('#'+correctAns).addClass("correct");
		}
		
		//disable submit, enable next Question
		$('#submitAnswer').attr("disabled","disabled");
		$('#nextQuestion').removeAttr("disabled"); 
		
	}
	
	$('#nextQuestion').click(function(){
		resumeTimer();
		showNextQuestion();
	});
	
	function showNextQuestion(){
		newQuestion();
		$('#nextQuestion').attr("disabled","disabled"); //disable self
		
		//$('#submitAnswer').removeAttr("disabled"); //enable submit button, remove color
		for (id in ids){
			$(ids[id]).removeClass("correct");
			$(ids[id]).removeClass("incorrect");
		}
		$('#imgP1').attr('src', 'pics/key_q.png');
		$('#P1').removeClass('hilite1');
		$('#imgP2').attr('src', 'pics/key_p.png');
		$('#P2').removeClass('hilite2');
		playerResponding="";
	}
	
	
	$("#endGame").click(function() {
		endGame();
	});
	

	function endGame(){
		//convert arrays to comma-delimited strings
		var c = catArray.join('XITEMX');
		var r = ratArray.join('XITEMX');
		var d = diffArray.join('XITEMX');
		var q = qArray.join('XITEMX');
		var w = wArray.join('XITEMX');
		var x = xArray.join('XITEMX');
		var y = yArray.join('XITEMX');
		var z = zArray.join('XITEMX');
		
		var answer = answerArray.join('XITEMX');
		var correct = answeredCorrect.join('XITEMX');
		var wrong = answeredWrong.join('XITEMX');
		var userAns = userAnswers.join('XITEMX');
		
		var answerP2 = answerArrayP2.join('XITEMX');
		var correctP2 = answeredCorrectP2.join('XITEMX');
		var wrongP2 = answeredWrongP2.join('XITEMX');
		var userAnsP2 = userAnswersP2.join('XITEMX');
		
		var averageTime = computeAveTime('P1');
		var averageTimeP2 = computeAveTime('P2');
		
		//put array data into form
		$('#catArray').val(c);
		$('#ratArray').val(r);
		$('#diffArray').val(d);
		$('#qArray').val(q);
		$('#wArray').val(w);
		$('#xArray').val(x);
		$('#yArray').val(y);
		$('#zArray').val(z);
		
		$('#answerArray').val(answer);
		$('#answeredCorrect').val(correct);
		$('#answeredWrong').val(wrong);
		$('#userAnswers').val(userAns);
		
		$('#answerArrayP2').val(answerP2);
		$('#answeredCorrectP2').val(correctP2);
		$('#answeredWrongP2').val(wrongP2);
		$('#userAnswersP2').val(userAnsP2);
		
		$('#timeElapsed').val(timeElapsed);
		$('#aveTimePerQuestion').val(averageTime);
		if(averageTimeP2=="NaN secs") {
			$('#aveTimePerQuestionP2').val('N/A');
		} else {
			$('#aveTimePerQuestionP2').val(averageTimeP2);
		}
		$('#playerCount').val('multi');
		//submit form
		$('#submitForm').click();
		
	}
	
	//allows using enter button to submit and move on
	$(document).keyup(function(e){
		if (e.keyCode == 13){
			if ($('#nextQuestion').attr("disabled")==true){
				submitAnswer();
			}
			else {
				showNextQuestion();
			}
		} else if(e.keyCode==80) {//Player 2 has buzzed in
			if(playerResponding=="") {
				playerResponding = "P2";
				$('#submitAnswer').removeAttr("disabled");
				$('#choices :input').attr('disabled', false);
				$('#imgP2').attr('src', 'pics/key_pActive.png');
				$('#P2').addClass('hilite2');
			}
		} else if(e.keyCode==81) { // Player 1 has buzzed in
			if(playerResponding=="") {
				playerResponding = "P1";
				$('#submitAnswer').removeAttr("disabled");
				$('#choices :input').attr('disabled', false);
				$('#imgP1').attr('src', 'pics/key_qActive.png');
				$('#P1').addClass('hilite1');
			}
		} else if(e.keyCode==87) {
			if($('input[value="0"]').attr('disabled')==false) {
				$('input[value="0"]').attr('checked','checked');
			}
		} else if(e.keyCode==88) {
			if($('input[value="1"]').attr('disabled')==false) {
				$('input[value="1"]').attr('checked','checked');
			}
		} else if(e.keyCode==89) {
			if($('input[value="2"]').attr('disabled')==false) {
				$('input[value="2"]').attr('checked','checked');
			}
		} else if(e.keyCode==90) {
			if($('input[value="3"]').attr('disabled')==false) {
				$('input[value="3"]').attr('checked','checked');
			}
		}
	});
	
});

//Google Analytics
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22864126-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
