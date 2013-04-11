<?php
	session_start();
	
	ini_set('display_errors',1);
	error_reporting(E_ALL);

require("dbConnect.php");

//connectToDB_Local();
	connectToDB_SG(); //use this 
	$allQuestions = fetch_all_questions();
	//$allQuestions = array_map("htmlentities",$allQuestions);
	$response = implode("<QUESTION>",$allQuestions);
	//$response = str_replace(array("&lt;QUESTION_ITEM&gt;","&lt;ANSWER&gt;"),array("<QUESTION_ITEM>","<ANSWER>"), $response);
	// REINSTATE THE LINE BELOW IF NULL QUESTION PROBLEM PERSISTS
	// $response = utf8_encode($response); 
	echo $response;
	mysql_close();
	
	
	/////////////////////////////////////////////////////////////////

	//use: get all questions
	function fetch_all_questions(){
		if (isset($_SESSION['categories'])){
			$cats = $_SESSION['categories'];
			$x = implode(',', $cats);
			$str ="";
			foreach($cats as $i){
				$str .= '"'.$i.'",';
			}
			$str = substr($str,0,strlen($str)-1);
			$r = mysql_query('SELECT * FROM multichoice WHERE Category IN ('.$str.') ORDER BY RAND() LIMIT 100');	
		} else{ 
			$r = mysql_query("SELECT * FROM multichoice ORDER BY RAND() LIMIT 100");
		}
		return process_all_questions($r);
	}

	//parse entire array of questions
	function process_all_questions($allQs){
		$allQuestionsArray = array();
		while($row = mysql_fetch_array($allQs)){
			$newQuestion = array(
				"category"=>$row["Category"],
				"difficulty"=>$row["Difficulty"],
			    "rationale"=>$row["reason"],
				"question"=>$row["Question"],
				"choices"=>$row["Choices"],
				"answer"=>$row["Answer"],
				"question_id" => $row["PrimaryKey"]);
			$newQuestionString = implode("<QUESTION_ITEM>",$newQuestion);
			$allQuestionsArray[] = $newQuestionString;
		}
		
		return $allQuestionsArray;
	}

	//use: get a new question
	function fetch_random_question(){
		if (isset($_SESSION['categories'])){
			$cats = $_SESSION['categories'];
			$x = implode(',', $cats);
			$str ="";
			foreach($cats as $i){
				$str .= '"'.$i.'",';
			}
			$str = substr($str,0,strlen($str)-1);
			$r = mysql_query('SELECT * FROM multichoice WHERE Category IN ('.$str.') ORDER BY RAND() LIMIT 1');
		}
		else{ 
			$r = mysql_query("SELECT * FROM multichoice ORDER BY RAND() LIMIT 1");
		}
		return question_process($r);
	}

	//read contents of a fetched question
	function question_process($r){
		$result = mysql_fetch_array($r);
		return array(
		"category"=>$result["Category"],
		"difficulty"=>$result["Difficulty"],
		"question"=>$result["Question"],
		"rationale"=>$result["reason"],
		"choices"=>$result["Choices"],
		"answer"=>$result["Answer"],
		"question_id" => $result["PrimaryKey"]);
	}	
	
?>
