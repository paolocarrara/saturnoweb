<?php
	session_start ();
	require_once ('../app/model/student.php');

	if ( isset ($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD'] == 'POST') and isset ($_POST['submitSigninForm']) ) {

		if ( Student::validateStudentSignin ($_POST['email'], $_POST['password'])) {

                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['loggedin'] = true;

			header ('Location: ?url=home/index');
                }
                else {
			header ('Location: ?url=home/signin');
                }
	}
?>
