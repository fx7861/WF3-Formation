<?php require_once ('../inc/header.inc.php'); ?>

<?php

if (!adminConnect()) {
	header('Location: ../index.php');
	exit();
}
$content .= '<div class="mt-3 mb-4">';
$content .= '<a href="?action=affichage" class="btn btn-outline-secondary mr-4">Affichage des articles</a>';
$content .= '<a href="?action=ajouter" class="btn btn-outline-secondary">Ajouter un article</a>';
$content .= '</div>';

if (empty($_GET['action'])) {
	$_GET['action'] = 'affichage';
}

if (!empty($_POST)) {

	if (isset($_GET['action']) && $_GET['action'] == 'modification') {
		$url_photo = $_POST['photo_actuelle'];
	}

	if (!empty($_FILES['photo']['name'])) {
		if (isset($_GET['action']) && $_GET['action'] == 'modification') {
			$url_picture = str_replace('http://localhost', $_SERVER['DOCUMENT_ROOT'], $_POST['photo_actuelle']);
			if (!empty($url_picture) && file_exists($url_picture)) {
				unlink($url_picture);
			}
		}

		$photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		$url_photo = ROOT . "photos/$photo";

		$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . "/projets/boutique/photos/$photo";

		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}

	if (isset($_GET['action']) && $_GET['action'] == 'modification') {
		query("UPDATE article SET reference='$_POST[reference]',categorie='$_POST[categorie]',titre='$_POST[titre]',description='$_POST[description]',couleur='$_POST[couleur]',taille='$_POST[taille]',sexe='$_POST[sexe]',photo='$url_photo',prix='$_POST[prix]',stock='$_POST[stock]' WHERE id_article='$_GET[id_article]'");

		header('Location: gestion_boutique.php');
	} else {
		$r = query("SELECT * FROM article WHERE reference='$_POST[reference]'");

		if (!empty($r)) {
			$content .= '<div class="alert alert-danger">La référence est indisponible !</div>';
		} else {
			query("INSERT INTO article(reference,categorie,titre,description,couleur,taille,sexe,photo,prix,stock) VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]','$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[sexe]','$url_photo','$_POST[prix]','$_POST[stock]')");
			$content .= '<div class="alert alert-success">L\'article a bien été ajouté</div>';
		}
		
	}

	foreach ($_POST as $key => $value) {
		$_POST[$key] = htmlspecialchars($value);
	}

	
	$content .= '<div class="alert alert-success">Le produit a bien été ajouté !</div>';
}

if (isset($_GET['action']) && $_GET['action'] == 'affichage') {
	$r = query("SELECT * FROM article ORDER BY id_article DESC");
	$content .= '<h3 class="my-3">Liste des articles:</h3>';
	$content .= "<p class='mb-3' >Nombre d'articles dans la boutique : " . count($r) . "<p>";

	$content .= '<table border="1" cellpadding="5">';
		$content .= '<tr>';
			foreach ($r[0] as $k => $v) {
				$content .= "<th class='text-center'>$k</th>";
			}
			$content .= "<th class='text-center'>Modification</th>";
			$content .= "<th class='text-center'>Suppression</th>";
		$content .= '</tr>';

		foreach ($r as $value) {
			$content .= "<tr>";
			foreach ($value as $key => $valeur) {
				if ($key == 'photo') {
					$content .= "<td><img src='$valeur' width='80'></td>";
				} else {
					$content .= "<td>$valeur</td>";	
				}	
			}
				$content .= '<td><a class="btn btn-info" href="?action=modification&id_article=' . $value['id_article'] . '">Modifier</a></td>';
				$content .= '<td><a class="btn btn-danger" href="?action=suppression&id_article=' . $value['id_article'] . '&picture=' . $value['photo'] . '" onClick="return(confirm(\'Etes vous sur ?\'))">Supprimer</a></td>';
			$content .= "</tr>";
		}
	$content .= '</table>';
}


?>

<h1 class="text-center my-2">Gestion de la boutique</h1>


<?php if (isset($_GET['action']) && ($_GET['action'] == 'ajouter' || $_GET['action'] == 'modification')) {

	if (isset($_GET['id_article'])) {
		$r = query("SELECT * FROM article WHERE id_article = $_GET[id_article]", true);
	}

	$reference = isset($r['reference']) ? $r['reference'] : '';
	$categorie = isset($r['categorie']) ? $r['categorie'] : '';
	$titre = isset($r['titre']) ? $r['titre'] : '';
	$description = isset($r['description']) ? $r['description'] : '';
	$couleur = isset($r['couleur']) ? $r['couleur'] : '';
	$prix = isset($r['prix']) ? $r['prix'] : '';
	$stock = isset($r['stock']) ? $r['stock'] : '';
	$taille_s = (isset($r['taille']) && $r['taille'] == 'S') ? 'selected' : '';
	$taille_m = (isset($r['taille']) && $r['taille'] == 'M') ? 'selected' : '';
	$taille_l = (isset($r['taille']) && $r['taille'] == 'L') ? 'selected' : '';
	$taille_xl = (isset($r['taille']) && $r['taille'] == 'XL') ? 'selected' : '';

	$sexe_f = (isset($r['sexe']) && $r['sexe'] == 'f') ? 'selected' : '';
	$sexe_m = (isset($r['sexe']) && $r['sexe'] == 'm') ? 'selected' : '';

	if ($_GET['action'] == 'ajouter') {
		$content .= '<h3 class="my-3">Ajouter un article:</h3>';
	} else {
		$content .= '<h3 class="my-3">Modifier un article:</h3>';
	}

$content .= 
	'<form method="post" enctype="multipart/form-data">
		<label for="reference">Réference</label>
		<input type="text" name="reference" id="reference" class="form-control" value="' . $reference . '">
		<label for="categorie">Catégorie</label>
		<input type="text" name="categorie" id="categorie" class="form-control" value="' . $categorie . '">
		<label for="titre">Titre</label>
		<input type="text" name="titre" id="titre" class="form-control" value="' . $titre . '">
		<label for="description">Description</label>
		<input type="text" name="description" id="description" class="form-control" value="' . $description . '">
		<label for="couleur">Couleur</label>
		<input type="text" name="couleur" id="couleur" class="form-control" value="' . $couleur . '">
		<label for="taille">Taille</label>
		<select id="taille" name="taille" class="form-control">
			<option value="S" ' . $taille_s . '>S</option>
			<option value="M" ' . $taille_m . '>M</option>
			<option value="L" ' . $taille_l . '>L</option>
			<option value="XL" ' . $taille_xl . '>XL</option>
		</select>
		<label for="sexe">Sexe</label>
		<select id="sexe" name="sexe" class="form-control">
			<option value="m" ' . $sexe_m . '>Homme</option>
			<option value="f" ' . $sexe_f . '>Femme</option>
		</select>
		<label for="photo">Photo</label>
		<input type="file" name="photo" id="photo" class="form-control">';

if (isset($r['photo'])) {
	$content .= "<p> Vous pouvez uploader une nouvelle photo<p>";
	$content .= "<img src='" . $r['photo'] . "' width='80'>";
	$content .= "<input type='hidden' name='photo_actuelle' value='" . $r['photo'] . "'><br>";
}

$btn_value = $_GET["action"] == "ajouter" ? "Ajouter" : "Modifer";

$content .=
		'<label for="prix">Prix</label>
		<input type="text" name="prix" id="prix" class="form-control" value="' . $prix . '">
		<label for="stock">Stock</label>
		<input type="text" name="stock" id="stock" class="form-control" value="' . $stock . '">
		<input type="submit" class="btn btn-dark mt-3" value="' . $btn_value . '">
	</form>';
}

?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
	query("DELETE FROM article WHERE id_article = $_GET[id_article]");
	$url_picture = str_replace('http://localhost', $_SERVER['DOCUMENT_ROOT'], $_GET['picture']);
	if (!empty($url_picture) && file_exists($url_picture)) {
		unlink($url_picture);
	}
	
	header('Location: gestion_boutique.php');
}

?>

<?= $content; ?>

<?php require_once ('../inc/footer.inc.php'); ?>