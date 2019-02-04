<?php 
	session_start();
	require 'functions.php';
?>

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
				<form id="form-article">
					<p class="h5 mb-2">Salut <?= $_SESSION['users']['pseudo']; ?> écrit ton message</p>
					<input type="hidden" name="name" id="name" value="<?= $_SESSION['users']['id']; ?>">
					<label form="title">Titre</label>
					<input type="text" class="form-control" name="title" id="title">
					<label form="message">Message</label>
					<input type="text" class="form-control" name="message" id="message">
					<div class="btn btn-dark mt-3" id="btn-add">Envoyer</div>
				</form>
			</section>

			<section class="my-3">
				<?php 
					echo "<table class='table table-striped'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Auteur</th>";
					echo "<th>Titre</th>";
					echo "<th>Message</th>";
					echo "<tr>";
					echo "</thead>";
					echo "<tbody id='zonemessage'>";
					echo "</tbody>";
					echo "</table>";
				?>
			</section>
		</main>
		<footer>
			<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			<script type="text/javascript" src="ajax.js"></script>
			<script type="text/javascript">
				setInterval(refresh, 500);
			</script>
		</footer>
	</div>
</body>
</html>