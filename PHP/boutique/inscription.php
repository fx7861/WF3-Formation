<?php require_once ('inc/header.inc.php'); ?>

<?php
	
	if (userConnect()) {
		header('Location: profil.php');
		exit();
	}

	if ($_POST) {
		$erreur = "";

		if (strlen($_POST['pseudo']) <=3 || strlen($_POST['pseudo']) > 20) {
			$erreur .= '<div class="alert alert-danger">Erreur entrer un pseudo entre 3 et 20 caractères</div>';
		}

		$pseudo = htmlspecialchars($_POST['pseudo']);
		$r = query("SELECT * FROM membre WHERE pseudo = '$pseudo'");


		if ($r !== false) {
			$erreur .= '<div class="alert alert-danger">Pseudo déjà utilisé par un autre membre</div>';
		}

		foreach ($_POST as $key => $value) {
			$_POST[$key] = htmlspecialchars($value);
		}

		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

		if (empty($erreur)) {
			query("INSERT INTO membre(pseudo,mdp,nom,prenom,email,sexe,ville,cp,adresse) VALUES('$_POST[pseudo]','$_POST[password]','$_POST[nom]','$_POST[prenom]','$_POST[email]','$_POST[sexe]','$_POST[ville]','$_POST[cp]','$_POST[adresse]')");

			$content .= '<div class="alert alert-success">Inscription validée ! <a href="' . ROOT . 'connexion.php">Cliquez ici pour vous connecter</a></div>';
		} else {
			$content .= $erreur;
		}
	}

?>

<h1 class="text-center my-2">Inscription</h1>

<?= $content; ?>

<form method="post">
	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" id="pseudo" class="form-control">
	<label for="password">Mot de passe</label>
	<input type="password" name="password" id="password" class="form-control">
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom" class="form-control">
	<label for="prenom">Prenom</label>
	<input type="text" name="prenom" id="prenom" class="form-control">
	<label for="email">Email</label>
	<input type="email" name="email" id="email" class="form-control">
	<label for="sexe">Civilité</label>
	<select id="sexe" name="sexe" class="form-control">
		<option value="">-- Choisissez votre civilité --</option>
		<option value="m">Homme</option>
		<option value="f">Femme</option>
	</select>
	<label for="adresse">Adresse</label>
	<input type="text" name="adresse" id="adresse" class="form-control">
	<label for="cp">Code postal</label>
	<input type="number" name="cp" id="cp" class="form-control">
	<label for="ville">Ville</label>
	<input type="text" name="ville" id="ville" class="form-control">
	<input type="submit" class="btn btn-dark mt-3" value="S'inscrire">
</form>



<?php require_once ('inc/footer.inc.php'); ?>