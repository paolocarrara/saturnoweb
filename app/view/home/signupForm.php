<?php
	session_start ();

	if ( isset ($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD'] == 'POST') and isset ($_POST['submitSignupForm']) ) {
		$_SESSION['loggedin'] = true;
	}

	header ('Location: ?url=home/index');
?>
