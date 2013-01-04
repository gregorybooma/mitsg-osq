<?php
session_start();
ini_set('display_errors',1); //delete in real version?
error_reporting(E_ALL);
$array = array();

//move selected categories to session variable
$cats = $_POST['category'];
$numCats = count($cats);
if($numCats>0){
	for($i=0; $i < $numCats; $i++){
      $array[$i] = (string)($cats[$i]);
    }
} else { //by default, use all categories
	$numCats = 8;
	$allCats = array("Biology","Chemistry","Geography","Geology","Marine Policy","Physical Oceanography","Social Sciences","Technology");
	for($i=0; $i < $numCats; $i++){
      $array[$i] = $allCats[$i];
    }
}
$_SESSION['categories'] = $array;

//select game mode
if($_POST['playerNum'] == "single"){ 
    header("Location: singleplayer.php"); 
} 
else if ($_POST['playerNum'] == "multi"){ 
    header("Location: multiplayer.php"); 
} 
?>