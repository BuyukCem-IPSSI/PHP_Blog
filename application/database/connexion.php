<?php
	require_once('./application/config/bddconfig.php');

	function dbConnect()
	{
		try {
			return new PDO(
				sprintf('mysql:host=%s;dbname=%s', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),
				DATABASE_CONFIG['user'],
				DATABASE_CONFIG['password']
			);

		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	}