<?php require_once ('inc/header.inc.php'); ?>

<?php

if (!userConnect()) {
	header('Location: connexion.php');
	exit();
}

if (adminConnect()) {
	$content .= "<h2 class='text-center mt-2 mb-5'>Compte Administrateur</h2>";
}

if ($_POST) {
	$erreur = "";

	foreach ($_POST as $key => $value) {
		$_POST[$key] = htmlspecialchars($value);
	}

	if (empty($erreur)) {

		$id = $_SESSION['membre']['id_membre'];
		
		query("UPDATE `membre` SET `nom`='$_POST[nom]',`prenom`='$_POST[prenom]',`email`='$_POST[email]',`sexe`='$_POST[sexe]',`ville`='$_POST[ville]',`cp`='$_POST[cp]',`adresse`='$_POST[adresse]' WHERE id_membre = $id");

		$r = query("SELECT * FROM membre WHERE id_membre = $id", true);

		$_SESSION['membre']['nom'] = $r['nom'];
		$_SESSION['membre']['prenom'] = $r['prenom'];
		$_SESSION['membre']['email'] = $r['email'];
		$_SESSION['membre']['sexe'] = $r['sexe'];
		$_SESSION['membre']['ville'] = $r['ville'];
		$_SESSION['membre']['cp'] = $r['cp'];
		$_SESSION['membre']['adresse'] = $r['adresse'];

		$content .= '<div class="alert alert-success">Vos informations ont bien été modifiées.</div>';
	} else {
		$content .= $erreur;
	}
}

?>

<h1 class="text-center my-2">Profil : <?= ucfirst($_SESSION['membre']['prenom']); ?></h1>

<?= $content; ?>

<h5 class="mb-5">Vos information :</h5>

<form method="post">
	<p>Numéro client : <?= $_SESSION['membre']['id_membre'] ?></p>
	<p>Votre Pseudo : <?= $_SESSION['membre']['pseudo'] ?></p>
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom" class="form-control" value="<?= $_SESSION['membre']['nom'] ?>">
	<label for="prenom">Prenom</label>
	<input type="text" name="prenom" id="prenom" class="form-control" value="<?= $_SESSION['membre']['prenom'] ?>">
	<label for="email">Email</label>
	<input type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['membre']['email'] ?>">
	<label for="sexe">Civilité</label>
	<select id="sexe" name="sexe" class="form-control" selected ="<?= $_SESSION['membre']['sexe'] ?>">
		<option value="">-- Choisissez votre civilité --</option>
		<?php
			if ($_SESSION['membre']['sexe'] == 'm') {
				echo '<option value="m" selected>Homme</option>';
				echo '<option value="f">Femme</option>';
			} else {
				echo '<option value="m">Homme</option>';
				echo '<option value="f" selected>Femme</option>';
			}
		?>
	</select>
	<label for="adresse">Adresse</label>
	<input type="text" name="adresse" id="adresse" class="form-control" value="<?= $_SESSION['membre']['adresse'] ?>">
	<label for="cp">Code postal</label>
	<input type="number" name="cp" id="cp" class="form-control" value="<?= $_SESSION['membre']['cp'] ?>">
	<label for="ville">Ville</label>
	<input type="text" name="ville" id="ville" class="form-control" value="<?= $_SESSION['membre']['ville'] ?>">
	<input type="submit" class="btn btn-dark mt-3" value="Modifier">
</form>

<?php require_once ('inc/footer.inc.php'); ?>