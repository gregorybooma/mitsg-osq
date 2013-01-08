var _ = require("underscore");
var request = require('request');
var app = require('http').createServer();
var io = require('socket.io').listen(app);

// Configuration (todo move to json file)
var lampPath = "http://localhost:8888";
var port = 7777;

app.listen(port);

var GAME_DURATION_MSECS = 6 * 60 * 1000;
// var GAME_DURATION_MSECS = 10 * 1000;

var questions;
var lobby = [];
var games = [];
var gamesBySocketId = {};

// Load all questions
var questionsPath = lampPath + "/questionsJson.php";
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

  socket.on("buzzer", function(data) {
    var game = gamesBySocketId[this.id];
    if (game.state === "waitingForBuzzer") {
      game.state = "buzzed";
      game.buzzedPlayerId = this.id;
      game.p1.socket.emit("buzzed", {you: this.id === game.p1.socket.id});
      game.p2.socket.emit("buzzed", {you: this.id === game.p2.socket.id});
    }
  });

  socket.on("answer", function(data) {
    var game = gamesBySocketId[this.id];
    if (game.state === "buzzed" && game.buzzedPlayerId === this.id) {
      if (game.question.answer === data.answer) {
        game.p1.socket.emit("correct", {you: this.id === game.p1.socket.id});
        game.p2.socket.emit("correct", {you: this.id === game.p2.socket.id});
        if (game.p1.socket.id === this.id) game.p1.correct++;
        if (game.p2.socket.id === this.id) game.p2.correct++;
        game.state = "needsQuestion";
      }
      else {
        game.p1.socket.emit("wrong", {you: this.id === game.p1.socket.id});
        game.p2.socket.emit("wrong", {you: this.id === game.p2.socket.id});
        if (game.p1.socket.id === this.id) game.p1.wrong++;
        if (game.p2.socket.id === this.id) game.p2.wrong++;
        game.state = "waitingForBuzzer";
      }
    }
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
      state: "needsQuestion"
    };
    p1.correct = 0;
    p2.correct = 0;
    p1.wrong = 0;
    p2.wrong = 0;
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

    // Data sent to clients
    var pulseData = {};

    // Check if this game is stale
    if (game.p1.socket.disconnected || game.p2.socket.disconnected) {
      pulseData.stale = true;
      game.stale = true;
    }

    // Calculate new time remaining string
    var msecsRemaining = GAME_DURATION_MSECS - (new Date().getTime() - game.start);
    if (msecsRemaining < 0) msecsRemaining = 0;
    var minsRemaining = (msecsRemaining - (msecsRemaining % 60000)) / 60000;
    var secsRemaining = new String(Math.floor((msecsRemaining % 60000) / 1000));
    if (secsRemaining.length < 2) secsRemaining = "0" + secsRemaining;
    pulseData.timeRemaining = minsRemaining + ":" + secsRemaining;

    // Give players a question
    if (game.state === "needsQuestion" && questions) {
      game.question = questions[Math.round(Math.random() * questions.length)];
      pulseData.question = game.question;
      game.state = "waitingForBuzzer";
    }

    // Game over
    if (msecsRemaining < 1) {
      pulseData.gameOver = true;
    }

    // Send out updates for this pulse
    game.p1.socket.emit("pulse", pulseData);
    game.p2.socket.emit("pulse", pulseData);

  });

  // Prune games list
  games = _.where(games, {stale:false});

}, 1000);