<?php 

require 'functions.php';
$db = pdo();

if (
	isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
	isset($_POST['message']) && !empty($_POST['message'])
) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);

	$req = $db->prepare("INSERT INTO commentaire(pseudo, message, date_enregistrement) VALUES (?, ?, CURDATE())");

	$res = $req->execute(array($pseudo, $message));

	if ($res) {
		header('Location: index.php');
	} else {
		echo 'Erreur requête';
	}

} else {
	header('Location: index.php');
}

?>