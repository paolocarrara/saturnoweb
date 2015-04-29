<?php
	$hostname = 'ec2-54-163-238-169.compute-1.amazonaws.com';
	$username = getenv ('PG_USER');
	$password = getenv ('PG_PASSWORD');
	$databaseName = 'de73f59ql11316';
	$port = '5432';

	$connection = null;

	try {
		$connection = new PDO ("pgsql:host=ec2-54-163-238-169.compute-1.amazonaws.com;dbname=de73f59ql11316", $username, $password);
		$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'ERROR: '. $e->getMessage ();
	}
?>
