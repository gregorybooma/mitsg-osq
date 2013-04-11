<?php 
	//Connect to DB
require("dbConnect.php");

connectToDB_SG();
$q="select * from multichoice where Question='" . $_POST["Question"] . "'";
$r = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($r);
if($_POST['op']=="voteup") {
	$q1 = "update multichoice set upCount=upCount+1 where PrimaryKey = '" . $row['PrimaryKey'] . "'";
} else if($_POST['op']=="votedown") {
	$q1 = "update multichoice set downCount=downCount+1 where PrimaryKey = '" . $row['PrimaryKey'] . "'";
}
$r1 = mysql_query($q1) or die(mysql_error());
?>