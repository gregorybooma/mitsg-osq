// JavaScript Document

$(document).ready(function() {
	$('#hiddenForm').hide();

	var gameOver = false;
	var t;
	var timeElapsed = -1;
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
	var allQuestionIDs = [];
	var letters = ["W","X","Y","Z"];
	var ids = ["#0","#1","#2","#3"];
	$('#submitAnswer').attr("disabled","disabled");
	
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
	
	var answeredCorrect = 0;
	var answeredWrong = 0;
	var userAnswers = [];
	
	var answeredCorrectP2 = 0;
	var answeredWrongP2 = 0;
	var userAnswersP2 = [];
	
	var questionTimes = [];
	var questionTimesP2 = [];
	var questionStart;questionTimes

	var socket = io.connect(window.nodePath);
	
	function avg(arr) {
		var sum = 0;
		for (var i = 0; i < arr.length; i++) {
			sum += arr[i];
		}
		if (sum === 0) {
			return "n/a";
		}
		return (Math.round((sum / arr.length) * 1000) / 1000) + " seconds";
	}

	function endGame(gameTime, yourAnswers, theirAnswers){
    var yourAnswersArr = [];
    var theirAnswersArr = [];
    var id;
    allQuestionIDs.sort(function(a, b) {
      return a - b;
    });
    for (var i = 0; i < allQuestionIDs.length; i++) {
      id = allQuestionIDs[i];
      yourAnswersArr.push(yourAnswers[id] || -1);
      theirAnswersArr.push(theirAnswers[id] || -1);
    }
		window.location = "onlineGameStats.php" +
											"?playerTime=" + gameTime +
											"&playerQuestions=" + (answeredCorrect + answeredWrong) +
		                  "&playerCorrect=" + answeredCorrect +
		                  "&playerWrong=" + answeredWrong +
                      "&playerScore=" + (answeredCorrect - answeredWrong) +
		                  "&playerAve=" + avg(questionTimes) +
		                  "&opponentTime=" + gameTime +
		                  "&opponentQuestions=" + (answeredCorrectP2 + answeredWrongP2) +
		                  "&opponentCorrect=" + answeredCorrectP2 +
		                  "&opponentWrong=" + answeredWrongP2 +
                      "&opponentScore=" + (answeredCorrectP2 - answeredWrongP2) +
		                  "&opponentAve=" + avg(questionTimesP2) +
		                  "&questionIDs=" + allQuestionIDs.join(",") +
                      "&yourAnswers=" + yourAnswersArr.join(",") +
                      "&theirAnswers=" + theirAnswersArr.join(",");
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
		$("#submitAnswer").focus();
	});

  $("#buzzer").live("click", function(e) {
    e.preventDefault();
    socket.emit("buzzer", {});
  });

  $("#pass").live("click", function(e) {
    e.preventDefault();
    socket.emit("pass", {});
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
    socket.emit("registerName", {name: window.userName});
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
    if (data.state === "needsQuestion" || data.state === "outOfTime") {
      if (data.state === "needsQuestion") {
        $("#buzzer-label").text("You were both wrong! Next question:");
      }
      if (data.state === "outOfTime") {
        $("#buzzer-label").text("Out of time! Next question:");
      }
      $("#buzzer").show();
      $("#buzzed").hide();
      if (data.you) {
        answeredWrong++;
      }
      else {
        answeredWrongP2++;
      }
    }
    else {
      if (data.you) {
      	$("#buzzed").text("You were wrong! Let's see if your opponent gets it...");
    		$('#submitAnswer').attr("disabled", "disabled");
  			$('#choices :input').attr('disabled', true);
  			answeredWrong++;
      }
      else {
      	$("#buzzer-label").text("They were wrong! Press Q to buzz in!");
      	$("#buzzer").show();
  	  	$("#buzzed").hide();
  	  	answeredWrongP2++;
      }
    }
  });

  socket.on('correct', function(data) {
    if (data.you) {
  		$("#buzzer-label").text("You got it! Next question:");
  		questionTimes.push(data.time);
  		answeredCorrect++;
    }
    else {
    	$("#buzzer-label").text("They got it! Next question:");
    	questionTimesP2.push(data.time);
    	answeredCorrectP2++;
    }
    $('#submitAnswer').attr("disabled", "disabled");
		$('#choices :input').attr('disabled', true);
    $("#buzzer").show();
  	$("#buzzed").hide();
  });

  socket.on('pass', function(data) {
    if (data.you && data.state === "needsQuestion") {
      $("#buzzer-label").text("You pass! Next question...");
    }
    else if (data.you && data.state !== "needsQuestion") {
      $("#buzzer-label").text("You pass! Let's see if your opponent gets it...");
    }
    else if (!data.you && data.state === "needsQuestion") {
      $("#buzzer-label").text("They pass! Next question...");
    }
    else {
      $("#buzzer-label").text("They pass! Press Q to buzz in!");
    }
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
      endGame(data.gameTime, data.yourAnswers, data.theirAnswers);
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
    	question = data.question;
    	questionID = data.question.question_id;
    	allQuestionIDs.push(Number(questionID));
			$("#category").html("Category: " + question.category);
			$('#questionHeader').html("Question " + allQuestionIDs.length + ":");
			$('#questionDifficulty').html("Difficulty: " + question.difficulty);
			$('#questionText').html(question.question);
			for (var i=0; i<question.choices.length;i++){
				$(ids[i]).html("<input type='radio' name='answer' value='"+i+"'/> " +letters[i]+": "+question.choices[i]);
			}
      $('#choices :input').attr('disabled', true);
    }

    $("#timer").html("Time: " + data.timeRemaining);
    if (data.questionTimeRemaining) {
      $("#questionTimer").html("Next question in " + data.questionTimeRemaining);
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
