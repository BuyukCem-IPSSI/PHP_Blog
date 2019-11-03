<?php
	session_start();
	if (empty($_SESSION['userid']) && empty($_SESSION['username']) && empty($_SESSION['email'])) {
		header("Location: /singin?error=loginforblog");
	}

	require_once('./application/model/article_model.php');
	$post = get_list_category();

	include('./application/view/partials/header.php');
	include('./application/view/createarticle.php');
	include('./application/view/partials/footer.php');




