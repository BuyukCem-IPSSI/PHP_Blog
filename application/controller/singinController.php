<?php
	require_once('./application/model/singin_model.php');

	if (isset($_POST['submitform'])) {
		$mail = htmlspecialchars($_POST["mail"]);
		$password = htmlspecialchars($_POST["password"]);

		check_is_empty($mail, $password);
		$userdata = check_member($mail);

		if ($isconnect = password_verify($password, $userdata['pwd'])) {
			createsession($userdata['idUsers'], $userdata['uidUser'], $userdata['email']);
		} else {
			header("Location: /singin?error=wrongpassword");
			exit();
		}
	}
	include('./application/view/partials/header.php');
	include('./application/view/singin.php');
	include('./application/view/partials/footer.php');

	function check_is_empty($mail, $password)
	{
		if (empty($mail) || empty($password)) {
			header("Location: /singin?error=emptyfields");
			exit();
		}
	}

	function createsession($userid, $username, $email)
	{
		session_start();
		$_SESSION['userid'] = $userid;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		header("Location: /home?login=success");
		exit();
	}
