<?php
	session_start ();
	require_once ('../app/model/student.php');

	if ( isset ($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD'] == 'POST') and isset ($_POST['submitSignupForm']) ) {

		if ( Student::validateStudentSignup ($_POST['email'], $_POST['password'], $_POST['passwordConfirmation']) ) {

			/* Creates and add the student */
			$student = new Student ();
			$student->setEmail ($_POST['email']);
			$student->setPassword ($_POST['password']);
			Student::insertStudent ($student);

			/* Starts the session variables */
			$_SESSION['email'] = $student->getEmail ();
			$_SESSION['loggedin'] = true;

			/* Unset the variables associated to the form */
			unset ($_POST['email']);
			unset ($_POST['password']);
			unset ($_POST['passwordConfirmation']);

			/* Redirect to the home page*/
			header ('Location: ?url=home/index');
		}
		else {
			header ('Location: ?url=home/signup');
		}
	}
	else {
		header ('Location: ?url=home/signup');
	}

?>
