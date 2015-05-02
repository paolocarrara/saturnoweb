<?php
	session_start ();
	require_once ('../app/model/rating.php');

	if ( isset ($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD'] == 'POST') and isset ($_POST['submitRateForm']) ) {

		$rating = new Rating ();

		$rating->setProfessorId ($_POST['professorId']);
		$rating->setStudentId ($_SESSION['id']);
		$rating->setGeneral ($_POST['generalRangeInput']);
		$rating->setKnowledge ($_POST['knowledgeRangeInput']);
		$rating->setDidacticism ($_POST['didacticismRangeInput']);
		$rating->setClarity ($_POST['clarityRangeInput']);
		$rating->setDifficulty ($_POST['difficultyRangeInput']);
		$rating->setSpeech ($_POST['speechRangeInput']);

		Rating::insertRating ($rating);

		header ('Location: ?url=home/index');
	}
	else {
		header ('Location: ?url=home/index');
	}

?>
