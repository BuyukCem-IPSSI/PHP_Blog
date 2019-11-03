<?php
	session_start();

	if (empty($_SESSION['userid']) && empty($_SESSION['username']) && empty($_SESSION['email'])) {
		header("Location: /singin?error=loginforblog");
	}
	require_once('./application/model/article_model.php');
	$post = get_article();



	$ParPage=10;
	$totalArticle=get_row_article();
	var_dump($totalArticle);
	$pageTotal=ceil($totalArticle/$ParPage);
	if (isset($_GET['page']) AND !empty($_GET['page'])){
		$curentpage=$_GET['page'];
	}else{
		$curentpage=1;
	}
	$depart=($curentpage-1)*$ParPage;
	$TotalRes=get_article_Line($depart);


	include('./application/view/partials/header.php');
	include('./application/view/liste_article.php');
	include('./application/view/partials/footer.php');
