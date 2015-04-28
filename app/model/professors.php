<?php
	class Professors {
		private $name;
		
		public function setName ($name) {
			$this->name = $name;
		}

		public function getName () {
			return $this->name;
		}

		public static function getProfessors () {
			require '../app/database.php';
			
			$statement = $connection->prepare ('SELECT * FROM professors');
			$statement->execute ();
			$result = $statement->fetchAll ();

			return $result;
		}

		public static function getProfessorsRatings () {

			$allCalculatedProfessorsRatings = [];

			require '../app/database.php';
			
			$statement = $connection->prepare ('SELECT * FROM professors');
			$statement->execute ();
			$professors = $statement->fetchAll ();

			$statement = $connection->prepare('SELECT * FROM ratings WHERE p_id = :p_id');
			foreach ($professors as $professor) {

				$calculatedProfessorRating = [
					'general' => (float)0.0,
					'knowledge' => 0.0,
					'didacticism' => 0.0,
					'clarity' => 0.0,
					'difficulty' => 0.0,
					'speech' => 0.0
				];

				$statement->execute (array('p_id'=> "$professor[id]"));
				$ratings = $statement->fetchAll ();
				$totalRatings = count ($ratings);

				/* Soma todas as notas em cada uma das áreas de avaliação */
				foreach ($ratings as $rating) {
					$calculatedProfessorRating['general'] += $rating['general'];
					$calculatedProfessorRating['knowledge'] += $rating['knowledge'];
					$calculatedProfessorRating['didacticism'] += $rating['didacticism'];
					$calculatedProfessorRating['clarity'] += $rating['clarity'];
					$calculatedProfessorRating['difficulty'] += $rating['difficulty'];
					$calculatedProfessorRating['speech'] += $rating['speech'];
				}

				if ($totalRatings > 0) {
					/* Divide a soma de todas as notas pelo total de votos */
					$calculatedProfessorRating['general'] /= $totalRatings;
					$calculatedProfessorRating['knowledge'] /= $totalRatings;
					$calculatedProfessorRating['didacticism'] /= $totalRatings;
					$calculatedProfessorRating['clarity'] /= $totalRatings;
					$calculatedProfessorRating['difficulty'] /= $totalRatings;
					$calculatedProfessorRating['speech'] /= $totalRatings;

					/* Arredonda os cálculos para duas casas depois da virgula */
					$calculatedProfessorRating['general'] = round ($calculatedProfessorRating['general'], 2);
					$calculatedProfessorRating['knowledge'] = round ($calculatedProfessorRating['knowledge'], 2);
					$calculatedProfessorRating['didacticism'] = round ($calculatedProfessorRating['didacticism'], 2);
					$calculatedProfessorRating['clarity'] = round ($calculatedProfessorRating['clarity'], 2);
					$calculatedProfessorRating['difficulty'] = round ($calculatedProfessorRating['difficulty'], 2);
					$calculatedProfessorRating['speech'] = round ($calculatedProfessorRating['speech'], 2);
				}
				
				/* NÃO É A MELHOR PRÁTICA */
				$allCalculatedProfessorsRatings[$professor['id']] = $calculatedProfessorRating;

			}
			return $allCalculatedProfessorsRatings;
		}
	}

?>
