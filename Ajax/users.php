<?php
session_start();
require 'functions.php';
if (
	isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
	isset($_POST['password']) && !empty($_POST['password'])
) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = htmlspecialchars($_POST['password']);

	$req = $db->query("SELECT id, pseudo FROM users WHERE pseudo = '$pseudo'");
	$res = $req->fetch(PDO::FETCH_OBJ);
	if ($res) {
		$_SESSION['users']['id'] = $res->id;
		$_SESSION['users']['pseudo'] = $res->pseudo;
		echo "true";
	} else {
		$req = $db->prepare("INSERT INTO `users`(`pseudo`, `password`) VALUES (?,?)");
		$req->execute(array($pseudo,$password));
		if ($req) {
			$id = $db->lastInsertId();
			$req = $db->query("SELECT id, pseudo FROM users WHERE id = $id");
			$res = $req->fetch(PDO::FETCH_OBJ);
			
			if ($res) {
				$_SESSION['users']['id'] = $res->id;
				$_SESSION['users']['pseudo'] = $res->pseudo;
				echo "true"; 
			} else {
				echo "false";
			}
			
		}	
	}
}

?>