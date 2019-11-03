<?php
	session_start();
	if (empty($_SESSION['userid']) && empty($_SESSION['username']) && empty($_SESSION['email'])) {
		header("Location: /singin?error=loginforblog");
	}


	require_once('./application/model/article_model.php');
	require_once('./application/model/commentaire_model.php');
	$idarticle = $_GET['id'];
	$data = get_article_whithid($idarticle);
	$comm = get_commentaire($_GET['id']);

	include('./application/view/partials/header.php');
	include('./application/view/readarticle.php');

	if (isset($_POST["submiCom"])) {
		check_is_empty($_POST["commentaire"], $data);
		$commentaire = htmlspecialchars($_POST["commentaire"]);
		$result = insert_commentaire($commentaire, (int)$idarticle, (int)$_SESSION['userid']);
		if ($result) {
			header("Location: /readarticle?success=commentaire&id=" . $idarticle);
			exit();
		}
	}

	if (isset($_POST['delate'])) { //je ne comprend pas pouquoi le bouton delate ne reagit pas à cette condititon
		$data = delete_article($idarticle);
		if ($data) {
			header("Location: /singin?error=delate");
		} else {
			header("Location: /blog?success=delate");
		}
	}
	function check_is_empty($data, $id)
	{
		if (empty($data)) {
			header("Location: /readarticle?id=" . $id);
			exit();
		}
	}
