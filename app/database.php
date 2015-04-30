<?php
	$dbDriver = getenv ('DBDRIVER');
	$hostname = getenv ('HOSTNAME');
	$username = getenv ('PG_USER');
	$userPassword = getenv ('PG_PASSWORD');
	$databaseName = 'de73f59ql11316';
	$port = '5432';

	try {
		$connection = new PDO ("$dbDriver:host=$hostname;dbname=$databaseName", $username, $userPassword);
		$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo 'ERROR: '. $e->getMessage ();
	}
?>
