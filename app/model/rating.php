<?php
	class Rating {

		private $p_id;
		private $s_id;
		private $general;
		private $knowledge;
		private $didacticism;
		private $clarity;
		private $difficulty;
		private $speech;

		public function setProfessorId ($p_id) {
			$this->p_id = $p_id;
		}
		public function setStudentId ($s_id) {
			$this->s_id = $s_id;
		}
		public function setGeneral ($general) {
			$this->general = $general;
		}
		public function setKnowledge ($knowledge) {
			$this->knowledge = $knowledge;
		}
		public function setDidacticism ($didacticism) {
			$this->didacticism = $didacticism;
		}
		public function setClarity ($clarity) {
			$this->clarity = $clarity;
		}
		public function setDifficulty ($difficulty) {
			$this->difficulty = $difficulty;
		}
		public function setSpeech ($speech) {
			$this->speech = $speech;
		}

		public function getProfessorId () {
			return $this->p_id;
		}
		public function getStudentId () {
			return $this->s_id;
		}
		public function getGeneral () {
			return $this->general;
		}
		public function getKnowledge () {
			return $this->knowledge;
		}
		public function getDidacticism () {
			return $this->didacticism;
		}
		public function getClarity () {
			return $this->clarity;
		}
		public function getDifficulty () {
			return $this->difficulty;
		}
		public function getSpeech () {
			return $this->speech;
		}


		public static function insertRating ($rating) {
			require '../app/database.php';

			$professorId = $rating->getProfessorId ();
			$studentId = $rating->getStudentId ();
			$general = $rating->getGeneral ();
			$knowledge = $rating->getKnowledge ();
			$didacticism = $rating->getDidacticism ();
			$clarity = $rating->getClarity ();
			$difficulty = $rating->getDifficulty ();
			$speech = $rating->getSpeech ();

			$statement = $connection->prepare ("INSERT INTO ratings (p_id, s_id, general, knowledge, didacticism, clarity, difficulty, speech) VALUES (:professorId, :studentId, :general, :knowledge, :didacticism, :clarity, :difficulty, :speech)");
			$statement->execute ( array (
				'professorId'=>"$professorId",
				'studentId'=>"$studentId",
				'general'=>"$general",
				'knowledge'=>"$knowledge",
				'didacticism'=>"$didacticism",
				'clarity'=>"$clarity",
				'difficulty'=>"$difficulty",
				'speech'=>"$speech") );
		}
	}
?>
