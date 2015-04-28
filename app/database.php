<?php
	$username = 'pcarrara';
	$password = '010502537';

	$connection = null;

	try {
		$connection = new PDO ('mysql:host=localhost;dbname=saturnoweb', $username, $password);
		$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'ERROR: '. $e->getMessage ();
	}
?>
