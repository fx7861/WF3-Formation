<?php 

	session_start();

	require_once 'functions.inc.php';

	$pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	define('ROOT', 'http://localhost/projets/boutique/');

	$content = "";

?>
