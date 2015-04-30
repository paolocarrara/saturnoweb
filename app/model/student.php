<?php
	class Student {

		private $name;
		private $password;

		public function setEmail ($name) {
			$this->name = $name;
		}

		public function setPassword ($password) {
			$this->password = $password;
		}

		public function getEmail () {
			return $this->name;
		}

		public function getPassword () {
			return $this->password;
		}

		public static function validateStudentSignin ($email, $password) {
			if ( Student::validateStudentSigninEmail ($email) ) {
				if ( Student::validateStudentSigninPassword ($email, $password) ) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
			else {
				return FALSE;
			}
		}

		private static function validateStudentSigninEmail ($email) {

			require '../app/database.php';

			$statement = $connection->prepare ('SELECT COUNT(email) FROM students WHERE email = :email');
			$statement->execute (array('email' => "$email"));
			if ($statement->fetchColumn ()) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		private static function validateStudentSigninPassword ($email, $password) {

			require '../app/database.php';

			$statement = $connection->prepare ('SELECT password FROM students WHERE email = :email');
			$statement->execute (array('email' => "$email"));
			$row = $statement->fetch (PDO::FETCH_ASSOC);

			return password_verify ($password, $row['password']);
		}

		public static function validateStudentSignup ($email, $password, $passwordConfirmation) {

			if ( Student::validateStudentSignupEmail ($email) ) {
				if ( Student::validateStudentSignupPassword ($password, $passwordConfirmation) ) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
			else {
				return FALSE;
			}
		}

		private static function validateStudentSignupEmail ($email) {

			if ( !filter_var ($email, FILTER_VALIDATE_EMAIL) ) {
				return false;
			}
			if ( strlen ($email) > 30 ) {
				return false;
			}
			else {
				require '../app/database.php';

				$sql = 'SELECT COUNT(id) FROM students WHERE email = :email';
				$statement = $connection->prepare ($sql);
				$statement->execute (array('email' => "$email"));

				if ($statement->fetchColumn ()) {
					return false;
				}
				else {
					return true;
				}
			}
		}

		private static function validateStudentSignupPassword ($password, $passwordConfirmation) {

			if ( empty ($password) ) {
				return false;
				/*Quando eu coloco apenas zero ele fala que está vazio?!?!*/
			}
			else {
				if ( $password == $passwordConfirmation ) {
					return true;
				}
				else {
					return false;
				}
			}
		}

		public static function insertStudent ($student) {
			require '../app/database.php';

			$hash = password_hash ($student->getPassword (), PASSWORD_BCRYPT);
			$email = $student->getEmail ();

			$statement = $connection->prepare ('INSERT INTO students values (NULL, :email, :hash)');
			$statement->execute (array('email' => "$email", 'hash' => "$hash"));
		}
	}
?>
