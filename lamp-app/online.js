// JavaScript Document

$(document).ready(function() {
	$('#hiddenForm').hide();

	var gameOver = false;
	var t;
	var timeElapsed = -1;
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

	var socket = io.connect('http://localhost:7777');
	
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
		var key = keyDecode(e);
		if (key === "q") { // Player has buzzed in
			socket.emit("buzzer", {});
		} else if(key === "w") {
			if($('input[value="0"]').attr('disabled')==false) {
				$('input[value="0"]').attr('checked','checked');
			}
		} else if(key === "x") {
			if($('input[value="1"]').attr('disabled')==false) {
				$('input[value="1"]').attr('checked','checked');
			}
		} else if(key === "y") {
			if($('input[value="2"]').attr('disabled')==false) {
				$('input[value="2"]').attr('checked','checked');
			}
		} else if(key === "z") {
			if($('input[value="3"]').attr('disabled')==false) {
				$('input[value="3"]').attr('checked','checked');
			}
		}
		$("submitAnswerForm").focus();
	});

	$("#submitAnswerForm").submit(function(e) {
		e.preventDefault();
		socket.emit("answer", {answer:$("#submitAnswerForm").find("input:checked").val()});
	});

	// Socket IO code

  socket.on('beginGame', function(data) {
    $("#lobby").hide();
    $("#gamespace").show();
    $("#buzzer").show();
    $("#buzzer-label").text("Press Q to buzz in and answer!");
  });

  socket.on('buzzed', function(data) {
    if (data.you) {
    	$("#buzzed").text("You buzzed in! Now submit your answer...");
  		$('#submitAnswer').removeAttr("disabled");
			$('#choices :input').attr('disabled', false);
    }
    else {
    	$("#buzzed").text("Your opponent buzzed in! Waiting for their answer...");
    }
    $("#buzzer").hide();
  	$("#buzzed").show();
  });

  socket.on('wrong', function(data) {
    if (data.you) {
    	$("#buzzed").text("You were wrong! Let's see if your opponent gets it...");
  		$('#submitAnswer').attr("disabled", "disabled");
			$('#choices :input').attr('disabled', true);
    }
    else {
    	$("#buzzer-label").text("They were wrong! Press Q to buzz in!");
    	$("#buzzer").show();
	  	$("#buzzed").hide();
    }
  });

  socket.on('correct', function(data) {
    if (data.you) {
  		$("#buzzer-label").text("You got it! Next question:");
    }
    else {
    	$("#buzzer-label").text("They got it! Next question:");
    }
    $('#submitAnswer').attr("disabled", "disabled");
		$('#choices :input').attr('disabled', true);
    $("#buzzer").show();
  	$("#buzzed").hide();
  });

  socket.on('updateScore', function(data) {
    $("#playerCorrect").text("Player Correct: " + data.playerCorrect);
    $("#playerWrong").text("Player Wrong: " + data.playerWrong);
    $("#opponentCorrect").text("Opponent Correct: " + data.opponentCorrect);
    $("#opponentWrong").text("Opponent Wrong: " + data.opponentWrong);
  });

  socket.on("pulse", function(data) {
    
    // Game over
  	if (data.gameOver) {
      endGame();
      return;
    }

    // Deal with disconnected opponent
    if (data.stale) {
      $("#lobby-status").text("Opponent disconnected. Refresh to play again.");
      $("#lobby").show();
      $("#gamespace").hide();
      $("#buzzer").hide();
      return;
    }

    // Display new question
    if (data.question && data.question.question_id !== questionID) {
    	var question = data.question;
    	questionID = data.question.question_id;
    	questionCount++;
			$("#category").html("Category: " + question.category);
			$('#questionHeader').html("Question "+questionCount+":");
			$('#questionDifficulty').html("Difficulty: " + question.difficulty);
			$('#questionText').html(question.question);
			for (var i=0; i<question.choices.length;i++){
				$(ids[i]).html("<input type='radio' name='answer' value='"+i+"'/> " +letters[i]+": "+question.choices[i]);
			}
    }

    $("#timer").html("Time: " + data.timeRemaining);
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
