<?php
	session_start();
	if (empty($_SESSION['userid']) && empty($_SESSION['username']) && empty($_SESSION['email'])) {
		header("Location: /singin?error=loginforblog");
	}
	require_once('./application/model/article_model.php');
	if (isset($_POST['submitform'])) {
		$title = htmlspecialchars($_POST['title']);
		$content = htmlspecialchars($_POST['article']);
		$category = htmlspecialchars($_POST['category']);
		$fileName = $_FILES['file']['name'];

		check_is_empty($content, $title, $fileName);
		$imgdatabase = insert_img($fileName);

		$post = insert_article((int)$category, $title, $content, $imgdatabase);
		if ($post) {
			header("Location: /addarticle?error=success");
			exit();
		}
		header("Location: /addarticle?error=insertfalse");
		exit();

	}
	$post = get_list_category();

	include('./application/view/partials/header.php');
	include('./application/view/addarticle.php');
	include('./application/view/partials/footer.php');


	function insert_img($fileName)
	{
		$file = $_FILES['file'];
		$filetmpname = $_FILES['file']['tmp_name'];
		$filesize = $_FILES['file']['size'];
		$fileerror = $_FILES['file']['error'];
		$filetype = $_FILES['file']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($fileActualExt, $allowed)) {
			if ($fileerror === 0) {
				if ($filesize < 5000000) {
					$filenamenew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = ('./application/public/img/uploadimg/' . $filenamenew);
					//$fileDestination='__DIR__ ./application/public/uploadimg/'.$filenamenew;
					move_uploaded_file($filetmpname, $fileDestination);
					return $filenamenew;
				} else {
					echo 'your file is too very big!!!';
				}
			} else {
				echo 'i was an error uploding file';
			}
		} else {
			echo 'You can not upload file';
		}
	}

	function check_is_empty($article, $title, $file)
	{
		if (empty($article) || empty($title) || empty($file)) {
			header("Location: /addarticle?error=formempty");
			exit();
		}
	}
