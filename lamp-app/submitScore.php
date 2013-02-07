<?php

require "config.php";
session_start();

if ($_POST["secret"] != "L5oDNb1WbSxaFx5PAIJX") {
  die("Error 1");
}

if (!isset($_POST['name']) || !isset($_POST['score'])) {
  die("Error 2");
}

require("questionsJson.php");

submit_score($_POST['name'], $_POST['score']);
  
?>