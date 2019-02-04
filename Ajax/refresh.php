<?php
session_start(); 
require 'functions.php';

if ($_POST['id'] == 0) {
	$req = $db->query("SELECT a.title, a.message, u.pseudo FROM articles a LEFT JOIN users u ON a.author = u.id ORDER BY a.id DESC");
	$res = $req->fetchAll(PDO::FETCH_OBJ);
	$tab = [];
	foreach ($res as $r) {
		$tab['html'][] = '<tr><td>' . $r->pseudo . '</td><td>' . $r->title . '</td><td>' . $r->message . '</td></tr>';
	}
	$r = $db->query("SELECT MAX(id) AS id FROM articles");
	$r = $r->fetch(PDO::FETCH_OBJ);
	$tab['idarticle'][] = $r->id;
	echo json_encode($tab);
} else {
	$id = $_POST['id'];
	$req = $db->query("SELECT a.title, a.message, u.pseudo FROM articles a LEFT JOIN users u ON a.author = u.id WHERE a.id > $id ORDER BY a.id DESC");
	$res = $req->fetchAll(PDO::FETCH_OBJ);
	$tab = [];
	foreach ($res as $r) {
		$tab['html'][] = '<tr><td>' . $r->pseudo . '</td><td>' . $r->title . '</td><td>' . $r->message . '</td></tr>';
	}
	$r = $db->query("SELECT MAX(id) AS id FROM articles");
	$r = $r->fetch(PDO::FETCH_OBJ);
	$tab['idarticle'][] = $r->id;
	echo json_encode($tab);
	header('location:index.php');
}

?>