<?php

	session_start();

	require_once 'function.inc.php';

	$pdo = new PDO('mysql:host=localhost;dbname=immobilier', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	define('ROOT', 'http://localhost/projets/immobilier_fx_massicot/');

	$content = '';


?>