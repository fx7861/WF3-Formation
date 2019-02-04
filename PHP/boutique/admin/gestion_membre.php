<?php require_once ('../inc/header.inc.php'); ?>

<?php

if (!adminConnect()) {
	header('Location: ../index.php');
	exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
	query("DELETE FROM membre WHERE id_membre = $_GET[id_membre]");
	header('Location: gestion_membre.php');
}



if ($_POST) {
	if (isset($_GET['action']) && $_GET['action'] == 'modification') {

		query("UPDATE membre SET pseudo='$_POST[pseudo]',nom='$_POST[nom]',prenom='$_POST[prenom]',email='$_POST[email]',sexe='$_POST[sexe]',adresse='$_POST[adresse]',cp='$_POST[cp]',ville='$_POST[ville]',statut='$_POST[statut]' WHERE id_membre='$_GET[id_membre]'");

		header('Location: gestion_membre.php');
	}
}

if (isset($_GET['action']) && $_GET['action'] == 'modification') {
	$q = query("SELECT * FROM membre WHERE id_membre = $_GET[id_membre]", true);
}

$r = query("SELECT * FROM membre");

$content .= "<h4 class='mt-3 mb-4'>Affichage des " . count($r) . " membres</h4>";
$content .= "<table border='1' cellpadding='5'>"; 
	$content .= "<tr>";
		foreach ($r[0] as $c => $v) {
			if ($c != 'mdp') {
				$content .= "<th class='text-center'>$c</th>";
			}
		}
		$content .= "<th class='text-center' colspan='2'>Action</th>";
	$content .= "</tr>";

	foreach ($r as $value) {
		$content .= "<tr>";
			foreach ($value as $col => $valeur) {
				if ($col != 'mdp') {
					$content .= "<td>$valeur</td>";
				}
			}
			$content .= '<td><a class="btn btn-info" href="?action=modification&id_membre=' . $value['id_membre'] . '">Modifier</a></td>';
			$content .= '<td><a class="btn btn-danger" href="?action=suppression&id_membre=' . $value['id_membre'] . '" onClick="return(confirm(\'Etes vous sur ?\'))">Supprimer</a></td>';
		$content .= "</tr>";
	}

$content .= "</table>"; 

?>

<h1 class="text-center my-2">Gestion des membres</h1>

<?= $content; ?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'modification'): ?>

	<form method="post">
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" id="pseudo" class="form-control" value="<?= $q['pseudo']; ?>">
		<label for="nom">Nom</label>
		<input type="text" name="nom" id="nom" class="form-control" value="<?= $q['nom']; ?>">
		<label for="prenom">Prenom</label>
		<input type="text" name="prenom" id="prenom" class="form-control" value="<?= $q['prenom']; ?>">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" value="<?= $q['email']; ?>">
		<label for="sexe">Civilité</label>
		<select id="sexe" name="sexe" class="form-control">
			<option value="">-- Choisissez votre civilité --</option>
			<?php if ($q['sexe'] = "m") {
				echo "<option value='m' selected>Homme</option>";
				echo "<option value='f'>Femme</option>";
			} else {
				echo "<option value='m'>Homme</option>";
				echo "<option value='f' selected>Femme</option>";
			} ?>
		</select>
		<label for="adresse">Adresse</label>
		<input type="text" name="adresse" id="adresse" class="form-control" value="<?= $q['adresse']; ?>">
		<label for="cp">Code postal</label>
		<input type="number" name="cp" id="cp" class="form-control" value="<?= $q['cp']; ?>">
		<label for="ville">Ville</label>
		<input type="text" name="ville" id="ville" class="form-control" value="<?= $q['ville']; ?>">
		<label for="statut">Statut</label>
		<input type="text" name="statut" id="statut" class="form-control" value="<?= $q['statut']; ?>">
		<input type="submit" class="btn btn-dark mt-3" value="Modifier">
	</form>

<?php endif; ?>
<?php require_once ('../inc/footer.inc.php'); ?>