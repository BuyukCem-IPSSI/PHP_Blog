<?php
	require_once('./application/model/singup_model.php');
	if (isset($_POST['singup-submit'])) {
		//require '';//database include

		$username =htmlspecialchars($_POST['uid']);
		$email = htmlspecialchars($_POST['mail']);
		$password = htmlspecialchars($_POST['pwd']);
		$passwordRepat = htmlspecialchars($_POST['pwd-repeat']);

		check_is_empty($username, $email, $password, $passwordRepat);
		checkemail($email, $username);
		$password = checkpassword($password, $passwordRepat, $username, $email);

		if (set_user($username, $email, $password)) {
			header("Location: /singin?succescreate=true");
			exit();
		}
		header("Location: /singup?error=save");
		exit();

	} else {
		include('./application/view/partials/header.php');
		include('./application/view/singup.php');
		include('./application/view/partials/footer.php');
	}
	/**
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $passwordRepat
	 */
	function check_is_empty($username, $email, $password, $passwordRepat)
	{
		if (empty($username) || empty($email) || empty($password) || empty($passwordRepat)) {
			header("Location: /singup?error=emptyfield&uid=.$username" . "&email=$email");
			exit();
		}
	}

	/**
	 * @param string $email
	 */
	function checkemail(string $email, string $username)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: /singup?error=invalidmailuid");
			exit();
		}
		if (check_mail($email)) {
			header("Location: /singup?error=emailexistedeja");
			exit();
		}
	}

	/**
	 * @param $password
	 * @param $passwordRepat
	 * @param $username
	 * @param $email
	 *
	 * @return false|string
	 */
	function checkpassword($password, $passwordRepat, $username, $email)
	{
		if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: /singup?error=invalidpasswordl&email=" . $email);
			exit();
		}
		if ($password !== $passwordRepat) {
			header("Location: /singup?error=passwordcheck&mail=" . $email);
			exit();
		}
		return password_hash($password, PASSWORD_DEFAULT);
	}


