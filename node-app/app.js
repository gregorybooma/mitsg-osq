var _ = require("underscore");
var app = require('http').createServer();
var io = require('socket.io').listen(app);

app.listen(7777);

//var GAME_DURATION_MSECS = 6 * 60 * 1000;
var GAME_DURATION_MSECS = 10 * 1000;

var lobby = [];
var games = [];

// Add new players to the lobby
io.sockets.on('connection', function(socket) {
  var uid = 'uid' + Math.random();
  socket.emit('conferUid', {uid: uid});
  lobby.push({
    uid: uid,
    socket: socket
  });
});

// Game loop
setInterval(function() {

  // Create games if anyone is waiting in the lobby
  if (lobby.length > 1) {
    var p1 = lobby.pop();
    var p2 = lobby.pop();
    games.push({
      p1: p1,
      p2: p2,
      start: new Date().getTime(),
      stale: false
    });
    p1.socket.emit("beginGame", {});
    p2.socket.emit("beginGame", {});
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