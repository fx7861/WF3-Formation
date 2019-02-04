<?php 

try {
	$db = new PDO('mysql:dbname=ajax;host=localhost', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
	echo 'Message erreur:' . $e->getMessage();
}

?>