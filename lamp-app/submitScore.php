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
require("dbConnect.php"); // added this after creating a separate db connect script -- delete if not necessary
submit_score($_POST['name'], $_POST['score']);
  
?>