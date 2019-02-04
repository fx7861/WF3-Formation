<?php require_once ('inc/header.inc.php'); ?>

<?php 

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	session_destroy();
}

if (userConnect()) {
	header('Location: profil.php');
	exit();
}

if ($_POST) {

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$r = query("SELECT * FROM membre WHERE pseudo = '$pseudo'", true);

	if (!empty($r)) {
		if (password_verify($_POST['password'] , $r['mdp'])) {

			$_SESSION['membre']['id_membre'] = $r['id_membre'];
			$_SESSION['membre']['pseudo'] = $r['pseudo'];
			$_SESSION['membre']['nom'] = $r['nom'];
			$_SESSION['membre']['prenom'] = $r['prenom'];
			$_SESSION['membre']['email'] = $r['email'];
			$_SESSION['membre']['sexe'] = $r['sexe'];
			$_SESSION['membre']['ville'] = $r['ville'];
			$_SESSION['membre']['cp'] = $r['cp'];
			$_SESSION['membre']['adresse'] = $r['adresse'];
			$_SESSION['membre']['statut'] = $r['statut'];

			header('Location: profil.php');

		} else {
			$content .= "<div class='alert alert-danger'>Erreur mot de passe</div>";
		}
	} else {
		$content .= "<div class='alert alert-danger'>Erreur pseudo</div>";
	}

}

?>

<h1 class="text-center my-2">Connexion</h1>

<?= $content; ?>

<form method="post">
	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" id="pseudo" class="form-control">
	<label for="password">Mot de passe</label>
	<input type="password" name="password" id="password" class="form-control">
	<input type="submit" class="btn btn-dark mt-3" value="S'inscrire">
</form>


<?php require_once ('inc/footer.inc.php'); ?>