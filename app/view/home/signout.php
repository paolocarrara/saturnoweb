<?php
	session_start ();
	unset ($_SESSION['loggedin']);

	header ('Location: ?url=home/index');
?>
