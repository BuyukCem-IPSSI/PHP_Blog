<?php
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	switch ($request_uri[0]) {
		case '/home':
		case '/':
			require_once(__DIR__ . '/application/controller/homeController.php');
			break;
		case '/blog':
			require_once(__DIR__ . '/application/controller/liste_articleContoller.php');
			break;
		case '/singup':
			require_once(__DIR__ . '/application/controller/singupController.php');
			break;
		case '/singin':
			require_once(__DIR__ . '/application/controller/singinController.php');
			break;
		case '/logout':
			require_once(__DIR__ . '/application/service/logout.php');
			break;
		case '/addarticle':
			require_once(__DIR__ . '/application/controller/addarticleController.php');
			break;
		case '/readarticle':
			require_once(__DIR__ . '/application/controller/readarticleController.php');
			break;
		default:
			require '/application/view/404.php';
			break;
	}
