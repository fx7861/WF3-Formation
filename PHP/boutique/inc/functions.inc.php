<?php

function pre($variable) {
	echo "<pre>";
		echo print_r($variable);
	echo "</pre>";
}

function userConnect() {
	if (!isset($_SESSION['membre'])) {
		return false;
	} else {
		return true;
	}
}

function adminConnect(){
	if (userConnect() && $_SESSION['membre']['statut'] == 1) {
		return true;
	} else {
		return false;
	}
}


function creation_panier(){
	if (!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = [];
		$_SESSION['panier']['titre'] = [];
		$_SESSION['panier']['id_article'] = [];
		$_SESSION['panier']['quantite'] = [];
		$_SESSION['panier']['prix'] = [];
	}
}

function ajout_panier($titre,$id_article,$quantite,$prix){
	
	creation_panier();
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']);

	if ($position_article !== false) {
		$_SESSION['panier']['quantite'][$position_article] += $quantite;
	} else {
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_article'][] = $id_article;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
	}

}

function retirer_article_panier($id) {
	$position_article = array_search($id, $_SESSION['panier']['id_article']);
	if ($position_article !== false) {
		array_splice($_SESSION['panier']['titre'], $position_article, 1);
        array_splice($_SESSION['panier']['id_article'], $position_article, 1);
        array_splice($_SESSION['panier']['quantite'], $position_article, 1);
        array_splice($_SESSION['panier']['prix'], $position_article, 1);
        header('Location: panier.php');	
	} 
}

function montant_total() {
	$total = 0;
	for ($i=0; $i < count($_SESSION['panier']['id_article']); $i++) { 
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
	}
	return round($total,2);
}


function query($statement, $one = false) {
	global $pdo;

	$req = $pdo->query($statement);

	if (
		strpos($statement, "INSERT") === 0 ||
		strpos($statement, "UPDATE") === 0 ||
		strpos($statement, "DELETE") === 0
	) {
		return $req;
	}

	if ($one) {
		$res = $req->fetch(PDO::FETCH_ASSOC);
	} else {
		$res = $req->fetchAll(PDO::FETCH_ASSOC);
	}

	if (empty($res)) {
		return false;
	}

	return $res;
}

function lastInsertId() {
	global $pdo;

	return $pdo->lastInsertId();
}

function prepare($statement, $execute = [], $one = false) {
	global $pdo;

	$req = $pdo->prepare($statement);

	if (!empty($execute)) {
		$exec = $req->execute($execute);
	} else {
		$exec = $req->execute();
	}

	if ($one) {
		$res = $exec->fetch(PDO::FETCH_ASSOC);
	} else {
		$res = $exec->fetchAll(PDO::FETCH_ASSOC);
	}

	if (empty($res)) {
		return false;
	}

	return $res;
}

?>