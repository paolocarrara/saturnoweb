<?php 
        ini_set ('display_errors', 1);
        ini_set ('display_startup_errors', 1);
        error_reporting (E_ALL);


	class Home extends Controller {

		public $comida = 'foot';

		public function index () {

			$model = $this->model ('professors');	

			$professorsList = $model->getProfessors ();
			$professorsRatings = $model->getProfessorsRatings ();

			$data = [
				'register' => '?url=home/signup',
				'signout' => '?url=home/signout',
				'professorTableHeader' => 'Professor',
				'gradesTableHeader' => 'Avalição',
				'professorsList' => $professorsList,
				'professorsRatings' => $professorsRatings
			];

			$this->view ('home/index', $data);
		}


		public function signup () {
			$data = [
				'back' => '?url=home/index',
				'action' => '?url=home/signupForm',
				'method' => 'post',
				'formName' => 'signupForm',
				'emailInputId' => 'email',
				'emailInputName' => 'email',
				'passwordInputId' => 'password',
				'passwordInputName' => 'password',
				'passwordConfirmationInputId' => 'passwordConfirmation',
				'passwordConfirmationInputName' => 'passwordConfirmation',
				'submit' => 'submitSignupForm',
			];

			$this->view ('home/signup', $data);
		}

		public function signupForm () {
			$this->view ('home/signupForm', []);
		}

		public function signout () {
			$this->view ('home/signout', []);
		}

	}
?>
