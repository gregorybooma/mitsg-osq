<?php
  require "config.php";
  session_start();

  if (isset($_POST['userName'])){
    if (preg_match("/^\w+$/i", $_POST['userName'])) {
      $_SESSION['userName'] = $_POST['userName'];
    }
    else {
      echo "User name must be an undivided character string (no spaces), and can only contain letters and numbers.";
    }
    
    header("Location: online.php");
  }

  if (isset($_SESSION['userName'])){
    $userName = $_SESSION['userName'];
  }
  else {
    $userName = "";
  }
  
?>
<!doctype html>
<html>
<head>
  <link rel="shortcut icon" href="pics/favicon.ico" type="image/x-icon" />
  <meta charset="utf-8">
  <title>Login</title>
</head>

<body>

  <div>
    <form method="post" action="setUserName.php">
      <fieldset>
        <legend>Your name is needed for the public leaderboard</legend>
        <p>Enter a screen name to identify yourself on the leaderboard. Leaders are ranked by cumulative daily score. Results are shown at the end of each game.<p>
        <input name="userName" id="userName" pattern="^\w+$" value="<?= $userName ?>">
        <label for="userName">Your Name</label>
        <br>
        <input type="submit" value="Confirm Name">
      </fieldset>
    </form>

  </div>

</body>
</html>