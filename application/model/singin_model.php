<?php
	require_once('./application/database/connexion.php');

	/**
	 * @param $mail
	 *
	 * @return mixed
	 */
	function check_member($mail)
	{

		$db = dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE email = :mail');
		$req->execute(array('mail' => $mail));
		$result = $req->fetch();
		return $result;
	}

