<?php
	$dbDriver = getenv ('DBDRIVER');
	$hostname = getenv ('HOSTNAME');
	$username = getenv ('PG_USER');
	$password = getenv ('PG_PASSWORD');
	$databaseName = 'de73f59ql11316';
	$port = '5432';
	$connection = null;

	try {
		$connection = new PDO ("$dbDriver:host=$hostname;dbname=$databaseName", $username, $password);
		$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'ERROR: '. $e->getMessage ();
	}
?>
