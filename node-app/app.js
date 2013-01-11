var _ = require("underscore");
var request = require('request');
var app = require('http').createServer();
var io = require('socket.io').listen(app);
var config = require("./config.js");
var moment = require("moment");

app.listen(config.port);

 var GAME_DURATION_MSECS = 6 * 60 * 1000;
// var GAME_DURATION_MSECS = 20 * 1000;
var QUESTION_DURATION_MSECS = 30 * 1000;

var questions;
var lobby = [];
var games = [];
var gamesBySocketId = {};

// Load all questions
var questionsPath = config.lampPath + "/questionsJson.php";
request(questionsPath, function(err, res, body) {
  if (err || res.statusCode !== 200) {
    console.error("Could not load questions from " + questionsPath);
    console.error("Error " + (err || res.statusCode));
    process.exit(1);
  }
  questions = JSON.parse(body);
  console.log("Loaded " + questions.length + " questions");
});

// Add new players to the lobby
io.sockets.on('connection', function(socket) {
  lobby.push({
    socket: socket
  });

  // One of the players buzzed in
  socket.on("buzzer", function(data) {
    var game = gamesBySocketId[this.id];
    if (game.state === "waitingForBuzzer" && !game.answered[this.id]) {
      game.state = "buzzed";
      game.buzzedPlayerId = this.id;
      game.p1.socket.emit("buzzed", {you: this.id === game.p1.socket.id});
      game.p2.socket.emit("buzzed", {you: this.id === game.p2.socket.id});
    }
  });

  // One of the players submitted an answer
  socket.on("answer", function(data) {
    var game = gamesBySocketId[this.id];
    var time = (new Date().getTime() - game.questionStartTime) / 1000;
    if (game.state === "buzzed" && game.buzzedPlayerId === this.id) {

      game.answered[this.id] = true;
      if (this.id == game.p1.socket.id) {
        game.p1.answers[game.question.question_id] = data.answer;
      }
      else {
        game.p2.answers[game.question.question_id] = data.answer;
      }

      // Answer is correct
      if (game.answer === data.answer) {
        game.p1.socket.emit("correct", {
          you: this.id === game.p1.socket.id,
          time: time
        });
        game.p2.socket.emit("correct", {
          you: this.id === game.p2.socket.id,
          time: time
        });
        if (game.p1.socket.id === this.id) game.p1.correct++;
        if (game.p2.socket.id === this.id) game.p2.correct++;
        game.state = "needsQuestion";
      }

      // Answer is incorrect
      else {
        if (_.size(game.answered) > 1) {
          game.state = "needsQuestion";
        }
        else {
          game.state = "waitingForBuzzer";
        }
        game.p1.socket.emit("wrong",
          {you: this.id === game.p1.socket.id, state: game.state});
        game.p2.socket.emit("wrong",
          {you: this.id === game.p2.socket.id, state: game.state});
        if (game.p1.socket.id === this.id) game.p1.wrong++;
        if (game.p2.socket.id === this.id) game.p2.wrong++;
      }
    }

    // Update scores for both players
    game.p1.socket.emit("updateScore", {
      playerCorrect: game.p1.correct,
      playerWrong: game.p1.wrong,
      opponentCorrect: game.p2.correct,
      opponentWrong: game.p2.wrong
    });
    game.p2.socket.emit("updateScore", {
      playerCorrect: game.p2.correct,
      playerWrong: game.p2.wrong,
      opponentCorrect: game.p1.correct,
      opponentWrong: game.p1.wrong
    });
  });

  // Clean up games on disconnection
  socket.on('disconnect', function () {
    delete gamesBySocketId[this.id];
  });
});

// Game loop
setInterval(function() {

  // Create games if anyone is waiting in the lobby
  if (lobby.length > 1) {
    var p1 = lobby.pop();
    var p2 = lobby.pop();
    var game = {
      p1: p1,
      p2: p2,
      start: new Date().getTime(),
      stale: false,
      state: "needsQuestion",
      questions: _.shuffle(_.clone(questions))
    };
    p1.correct = 0;
    p2.correct = 0;
    p1.wrong = 0;
    p2.wrong = 0;
    p1.answers = {};
    p2.answers = {};
    games.push(game);
    gamesBySocketId[p1.socket.id] = game;
    gamesBySocketId[p2.socket.id] = game;
    p1.socket.emit("beginGame", {});
    p2.socket.emit("beginGame", {});
    var score = {
      playerCorrect: 0,
      playerWrong: 0,
      opponentCorrect: 0,
      opponentWrong: 0
    };
    p1.socket.emit("updateScore", score);
    p2.socket.emit("updateScore", score);
  }

  // Update all ongoing games
  games.forEach(function(game) {

    var i;

    // Data sent to clients
    var pulseData = {};

    // Check if this game is stale
    if (game.p1.socket.disconnected || game.p2.socket.disconnected) {
      pulseData.stale = true;
      game.stale = true;
    }

    // New time remaining strings
    var msecsRemaining = GAME_DURATION_MSECS - (new Date().getTime() - game.start);
    pulseData.timeRemaining = moment(msecsRemaining).format("m:ss");

    if (game.questionStartTime !== undefined) {
      var questionMsecs = QUESTION_DURATION_MSECS - (new Date().getTime() - game.questionStartTime);
      pulseData.questionTimeRemaining = moment(questionMsecs).format("ss");
    }

    // New question if time's up for this question
    if (questionMsecs < 1) {
      var wasBuzzed = game.state === "buzzed";
      game.state = "outOfTime";

      // If you run out of time while buzzed in, it counts as a wrong answer
      if (wasBuzzed) {
        game.p1.socket.emit("wrong",
          {you: game.buzzedPlayerId === game.p1.socket.id, state: game.state});
        game.p2.socket.emit("wrong",
          {you: game.buzzedPlayerId === game.p2.socket.id, state: game.state});
        if (game.p1.socket.id === game.buzzedPlayerId) game.p1.wrong++;
        if (game.p2.socket.id === game.buzzedPlayerId) game.p2.wrong++;
      }

      game.state = "needsQuestion";
    }

    // Give players a question, without the answer
    var outOfQuestions = false;
    if (game.state === "needsQuestion" && game.questions.length > 0) {
      game.question = _.clone(game.questions.pop());
      game.answer = game.question.answer;
      delete game.question.answer;
      delete game.question.rationale;
      pulseData.question = game.question;
      game.state = "waitingForBuzzer";
      game.questionStartTime = new Date().getTime();
      game.answered = {};
    }
    else if (game.state === "needsQuestion") {
      outOfQuestions = true;
    }

    var pulseDataP1 = _.clone(pulseData);
    var pulseDataP2 = _.clone(pulseData);

    // Game over
    if (msecsRemaining <= 0 || outOfQuestions) {
      pulseDataP1.gameOver = true;
      pulseDataP2.gameOver = true;
      game.p1.answers;
      game.p2.answers;
      pulseDataP1.yourAnswers = game.p1.answers;
      pulseDataP2.yourAnswers = game.p2.answers;
      pulseDataP1.theirAnswers = game.p2.answers;
      pulseDataP2.theirAnswers = game.p1.answers;
      var gameTime = moment(new Date().getTime() - game.start).format("m:ss");
      pulseDataP1.gameTime = gameTime;
      pulseDataP2.gameTime = gameTime;
    }

    // Send out updates for this pulse
    game.p1.socket.emit("pulse", pulseDataP1);
    game.p2.socket.emit("pulse", pulseDataP2);

  });

  // Prune games list
  games = _.where(games, {stale:false});

}, 1000);