<?php


function pdo() {
	$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
	return $pdo;
}

?>
