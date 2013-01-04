<?php 
	//Connect to DB
	function connectToDB_Local(){
	
		if (!$con = @mysql_connect("localhost","root","")){
			die('Could not connect: ' . mysql_error());
		}
		if (!@mysql_select_db('jesslin+ocean')){
			die('Could not connect: ' . mysql_error());
		}
	}
	
	function connectToDB_Scripts(){
		//Connect to DB
		if (!$con = @mysql_connect("sql.mit.edu","jesslin","vob36cab")){
			die('Could not connect: ' . mysql_error());
		}
		if (!@mysql_select_db('jesslin+ocean')){
			die('Could not connect: ' . mysql_error());
		}
	}
	
	function connectToDB_SG(){
		if (!$con = @mysql_connect("localhost","osm_manager","utoa8let")){
			die('Could not connect: ' . mysql_error());
		}
		if (!@mysql_select_db('osm_multichoice')){
			die('Could not connect: ' . mysql_error());
		}
	}
	
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