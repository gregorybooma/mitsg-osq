<?php
  require "config.php";
  session_start();

  if (isset($_POST['userName'])){
    $_SESSION['userName'] = $_POST['userName'];
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
        <legend>Your name is needed for public leaderboards</legend>
        <input name="userName" id="userName" value="<?= $userName ?>">
        <label for="userName">Your Name</label>
        <br>
        <input type="submit" value="Confirm Name">
      </fieldset>
    </form>
  </div>

</body>
</html>