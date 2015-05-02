<?php 
        ini_set ('display_errors', 1);
        ini_set ('display_startup_errors', 1);
        error_reporting (E_ALL);

	class Home extends Controller {

		public function index () {

			$model = $this->model ('professors');	

			$professorsList = $model->getProfessors ();
			$professorsRatings = $model->getProfessorsRatings ();

			$data = [
				'brandName' => 'SATURNOWEB',
				'signup' => '?url=home/signup',
				'signupText' => 'Registrar',
				'signin' => '?url=home/signin',
				'signinText' => 'Entrar',
				'signout' => '?url=home/signout',
				'signoutText' => 'Sair',
				'generalText' => 'Geral',
				'knowledgeText' => 'Conhecimento',
				'didacticismText' => 'Didática',
				'clarityText' => 'Clareza',
				'difficultyText' => 'Dificuldade',
				'speechText' => 'Fala',
				'professorTableHeader' => 'Professor',
				'gradesTableHeader' => 'Média das Avaliações',
				'studentEvaluationTableHeader' => 'Sua avaliação',
				'notRatedText' => 'Você ainda não avaliou esse professor.',
				'rateText' => 'Avaliar!',
				'rateLink' => '?url=home/rate',
				'professorsList' => $professorsList,
				'professorsRatings' => $professorsRatings
			];

			$this->view ('home/index', $data);
		}


		public function signup () {
			$data = [
				'pageTitle' => 'Registrar',
				'brandName' => 'SATURNOWEB',
				'signin' => '?url=home/signin',
				'signinText' => 'Entrar',
				'signupText' => 'Registrar',
				'back' => '?url=home/index',
				'action' => '?url=home/signupForm',
				'method' => 'post',
				'formName' => 'signupForm',
				'emailInputId' => 'email',
				'emailInputName' => 'email',
				'emailInputPlaceHolderText' => 'Email',
				'passwordInputId' => 'password',
				'passwordInputName' => 'password',
				'passwordInputPlaceHolderText' => 'Senha',
				'passwordConfirmationInputId' => 'passwordConfirmation',
				'passwordConfirmationInputName' => 'passwordConfirmation',
				'passwordConfirmationInputPlaceHolderText' => 'Repita a senha',
				'submit' => 'submitSignupForm',
			];

			$this->view ('home/signup', $data);
		}

		public function signin () {
			$data = [
				'brandName' => 'SATURNOWEB',
				'signup' => '?url=home/signup',
				'back' => '?url=home/index',
				'action' => '?url=home/signinForm',
				'method' => 'POST',
				'formName' => 'signinForm',
				'emailInputId' => 'email',
				'emailInputName' => 'email',
				'emailLabelText' => 'Email',
				'emailInputPlaceHolderText' => 'Email',
				'emailInputTitle' => 'Insira seu email. Este campo é obrigatório.',
				'passwordInputId' => 'password',
				'passwordInputName' => 'password',
				'passwordLabelText' => 'Senha',
				'passwordInputPlaceHolderText' => 'Senha',
				'passwordInputTitle' => 'Insira a senha para o usuário cadastrado. Este campo é obrigatório.',
				'submit' => 'submitSigninForm',
				'submitValue' => 'Entrar',
			];

			$this->view ('home/signin', $data);
		}

		public function rate ($params = []) {

			$model = $this->model ('professors');

			$professor = $model->getProfessorById ($params[0]);
			$professorRating = $model->getProfessorRatingById ($params[0]);

			$data = [
				'pageTitle' => 'Avaliar',
				'brandName' => 'SATURNOWEB',
				'signup' => '?url=home/signup',
				'signupText' => 'Registrar',
				'signin' => '?url=home/signin',
				'signinText' => 'Entrar',
				'signout' => '?url=home/signout',
				'signoutText' => 'Sair',
				'back' => '?url=home/index',
				'backText' => 'Voltar',
				'action' => '?url=home/rateForm',
				'method' => 'POST',
				'formName' => 'rateForm',
				'generalRangeInputId' => 'generalRangeInput',
				'knowledgeRangeInputId' => 'knowledgeRangeInput',
				'didacticismRangeInputId' => 'didacticismRangeInput',
				'clarityRangeInputId' => 'clarityRangeInput',
				'difficultyRangeInputId' => 'difficultyRangeInput',
				'speechRangeInputId' => 'speechRangeInput',
				'generalText' => 'Geral',
				'knowledgeText' => 'Conhecimento',
				'didacticismText' => 'Didática',
				'clarityText' => 'Clareza',
				'difficultyText' => 'Dificuldade',
				'speechText' => 'Fala',
				'submit' => 'submitRateForm',
				'professorId' => $params[0],
				'professorName' => $professor['name'],
				'professorGeneralRating' => $professorRating['general'],
				'professorKnowledgeRating' => $professorRating['knowledge'],
				'professorDidacticismRating' => $professorRating['didacticism'],
				'professorClarityRating' => $professorRating['clarity'],
				'professorDifficultyRating' => $professorRating['difficulty'],
				'professorSpeechRating' => $professorRating['speech'],
			];

			$this->view ('home/rate', $data);
		}

		public function signupForm () {
			$this->view ('home/signupForm', []);
		}

		public function signinForm () {
			$this->view ('home/signinForm', []);
		}

		public function rateForm () {
			$this->view ('home/rateForm', []);
		}

		public function signout () {
			$this->view ('home/signout', []);
		}
	}
?>
