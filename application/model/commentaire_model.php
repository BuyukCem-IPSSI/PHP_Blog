<?php

	/**
	 * @param $content
	 * @param $idarticle
	 * @param $id
	 *
	 * @return array
	 */
	function insert_commentaire($content, $idarticle, $id)
	{

		$db = dbConnect();
		$post = $db->prepare('INSERT INTO comment_article (content,id_article, id_user) VALUES(?, ?, ?)');
		$post->execute(array($content, $idarticle, $id));

		$stmt = $db->prepare('SELECT * FROM `comment_article` where id_user=? AND id_article=?');
		$stmt->execute(array($id, $idarticle));

		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	/**
	 * @param $id
	 *
	 * @return bool|PDOStatement
	 */
	function get_commentaire($id)
	{
		$db = dbConnect();

		$stmt = $db->prepare('SELECT id ,id_user , id_article ,content, uidUser  FROM `comment_article` LEFT JOIN users ON comment_article.id_user= users.idUsers where id_article=? ');
		$stmt->execute(array($id));

		return $stmt;
	}