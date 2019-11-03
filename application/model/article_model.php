<?php
	include_once('./application/database/connexion.php');

	/**
	 * @return mixed
	 */
	function get_article()
	{
		$db = dbConnect();
		$stmt = $db->prepare('SELECT * FROM `article` LEFT JOIN users ON article.id_user = users.idUsers LEFT JOIN category ON article.category = category.id_cat ');
		$stmt->execute();
		return $stmt;
	}

	/**
	 * @param $id
	 *
	 * @return array
	 */
	function get_article_whithid($id)
	{
		$db = dbConnect();
		$stmt = $db->prepare('SELECT * FROM `article` LEFT JOIN users ON article.id_user = users.idUsers LEFT JOIN category ON article.category = category.id_cat  WHERE id=?  ');
		$stmt->execute(array($id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	/**
	 * @return bool|PDOStatement
	 */
	function get_list_category()
	{
		$db = dbConnect();
		$stmt = $db->prepare('SELECT category_name ,id_cat FROM `category`');
		$stmt->execute();
		return $stmt;
	}

	/**
	 * @param $article
	 * @param $title
	 * @param $imgname
	 */
	function uploadarticle($article, $title, $imgname)
	{
		$db = dbConnect();
	}

	/**
	 * @param $category
	 * @param $title
	 * @param $article
	 * @param $img
	 *
	 * @return bool|PDOStatement
	 */
	function insert_article($category, $title, $article, $img)
	{
		$db = dbConnect();


		$post = $db->prepare('INSERT INTO article(category, content, img, titre,id_user) VALUES(?, ?, ?, ?,?)');
		$post->execute(array($category, $article, $img, $title, (int)$_SESSION['userid']));

		$stmt = $db->prepare('SELECT id FROM `article` where content=? AND img=? AND titre=? AND id_user=?');
		$stmt->execute(array($article, $img, $title, $_SESSION['userid']));

		return $stmt;
	}

	/**
	 * @param $namecath
	 *
	 * @return mixed
	 */
	function get_id_cat($namecath)
	{
		$db = dbConnect();
		$stmt = $db->prepare('SELECT id FROM `category` where category_name=?');
		$stmt->execute(array($namecath));

		while ($data = $stmt->fetch()) {
			$value = $data["id"];

		}
		return $value;
	}

	/**
	 * @param $id
	 *
	 * @return array
	 */
	function delete_article($id)
	{
		$db = dbConnect();
		$post = $db->prepare("DELETE FROM article WHERE id=:id");
		$post->execute(array($id));


		$stmt = $db->prepare('SELECT * FROM `article` WHERE id=?  ');
		$stmt->execute(array($id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function get_row_article()
	{
		$db=dbConnect();
		$post=$db->prepare("SELECT count(*) FROM article");
		$post->execute();
		$data = $post->fetchColumn();
		return $data;
	}
	function get_article_Line($depart,$videoParPage=10)
	{
		$db=dbConnect();
		$post=$db->prepare("SELECT * FROM `article` LEFT JOIN users ON article.id_user = users.idUsers LEFT JOIN category ON article.category = category.id_cat  order by  id DESC LIMIT $depart,$videoParPage");
		$post->execute();
		return $post;
	}

