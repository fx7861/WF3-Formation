<?php require 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title></title>
	
</head>
<body>
	<div class="container">
		<header class="my-3 text-center"><h1 class="h2">Ajouter et récupérer des info en ajax</h1></header>
		<main class="my-5">
			<section class="mt-2">
				<form id="form-login">
					<label form="pseudo">Pseudo</label>
					<input type="text" class="form-control" name="pseudo" id="pseudo">
					<label form="password">Mot de passe</label>
					<input type="password" class="form-control" name="password" id="password">
					<div class="btn btn-dark mt-3" id="btn-users">Envoyer</div>
				</form>
			</section>
			<div id="test"></div>
		</main>
		<footer>
			
			<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			<script type="text/javascript" src="ajax.js"></script>
		</footer>
	</div>
</body>
</html>