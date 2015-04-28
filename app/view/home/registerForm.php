<?php
	session_start ();
	$_SESSION['loggedin'] = true;
	header ('Location: home/index');
?>
