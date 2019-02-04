<?php
	require 'functions.php';
	
	if (
		isset($_POST['name']) && !empty($_POST['name']) &&
		isset($_POST['title']) && !empty($_POST['title']) &&
		isset($_POST['message']) && !empty($_POST['message'])
	) {
		$title = htmlspecialchars($_POST['title']);
		$message = htmlspecialchars($_POST['message']);
		$author = htmlspecialchars($_POST['name']);

		$req = $db->prepare("INSERT INTO `articles`(`title`, `message`, `author`) VALUES (?,?,?)");
		$req->execute(array($title,$message,$author));

		if ($req) {
			echo 'true';
			// $id = $db->lastInsertId();
			// $req = $db->query("SELECT a.title, a.message, u.pseudo FROM articles a LEFT JOIN users u ON a.author = u.id WHERE a.id = $id");
			// $res = $req->fetch(PDO::FETCH_OBJ);
			// echo '<tr><td>' . $res->pseudo . '</td><td>' . $res->title . '</td><td>' . $res->message . '</td></tr>';
		}
	}
?>