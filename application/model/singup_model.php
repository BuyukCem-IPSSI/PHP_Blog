<?php
	require_once('./application/database/connexion.php');
	/**
	 * @param $email
	 *
	 * @return mixed
	 */
	function check_mail($email)
	{
		$dbh = dbConnect();
		$req = $dbh->prepare('select COUNT(*) as email  From users WHERE email=?');
		$req->execute(array($email));
		$mail = $req->fetch();
		return $mail['email'];
	}

	/**
	 * @param $name
	 * @param $mail
	 * @param $password
	 *
	 * @return bool
	 */
	function set_user($name, $mail, $password)
	{
		$dbh = dbConnect();
		$sql = 'INSERT INTO users (email,pwd,uidUser) VALUE (:mail, :pass,:username)';
		$stmt = $dbh->prepare($sql);
		$insert = $stmt->execute(
			array(
				'username' => $name,
				'pass' => $password,
				'mail' => $mail
			));
		return $insert;
	}