<?php

	require 'functions.php';
	$db = pdo();

	$req = $db->query('SELECT * FROM commentaire ORDER BY id DESC');
	$res = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		*{box-sizing: border-box;}
		h2 {color: gray;font-size: 1.2em;text-align: center;}
		form{margin: 20px auto;}
		.fw-b{font-weight: bold;}
		.commentaire{padding: 5px 10px; margin-bottom: 20px;}
		.commentaire h5 {text-decoration: underline;}
		.commentaire p {margin-left: 10px;}
	</style>
</head>
<body>
	<h2 class="my-4">PHP</h2>
	<div class="container">
		<h4>Ecrire un commentaire :</h4>

		<form method="post" action="insert.php">
			<label for="pseudo">Pseudo :</label>
			<input type="text" id="peuso" name="pseudo" class="form-control">
			<label for="message">Message :</label>
			<textarea name="message" id="message" rows="10" cols="30" class="form-control"></textarea>
			<button type="submit" class="btn btn-outline-info mt-3">Soumettre</button>
		</form>

		<div>
			<p><?= count($res) > 1 ? count($res) . ' commentaires' : count($res) . ' commentaire'; ?></p>
			
			<?php foreach ($res as $r): ?>
				<div class="commentaire"> 
					<h5><?= $r['pseudo']; ?></h5>
					<p><?= $r['message']; ?></p>
					<hr>
				</div>
			<?php endforeach?>

		</div>


		
	</div>
</body>
</html>