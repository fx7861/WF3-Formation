<?php include('inc/header.php'); ?>

<?php 

if ($_POST) {

	$error = '';

	if (
		empty($_POST['titre']) ||
		empty($_POST['adresse']) ||
		empty($_POST['ville']) ||
		empty($_POST['cp']) ||
		empty($_POST['surface']) ||
		empty($_POST['prix']) ||
		empty($_POST['type'])
	) {
		$error .= "<p class='alert alert-danger mt-3'>Veuillez remplir tous les champs avec <span style='color:red'>*</span></p>";
	} 

	if (strlen($_POST['cp']) != 5) {
		$error .= "<p class='alert alert-danger mt-3'>Veuillez remplir un code postal valide</p>";
	}

	if (preg_match('#[^0-9]#', $_POST['prix'])) {
		$error .= "<p class='alert alert-danger mt-3'>Veuillez remplir un prix entier sans les centimes</p>";
	}

	if (preg_match('#[^0-9]#', $_POST['surface'])) {
		$error .= "<p class='alert alert-danger mt-3'>Veuillez remplir une surface entière sans chiffre après la virgule</p>";
	}

	if(empty($error)) {

		foreach ($_POST as $key => $value) {
			$_POST[$key] = htmlspecialchars($value);
		}

		$r = $pdo->prepare("INSERT INTO `logement`(`titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES (?,?,?,?,?,?,?,?,?)");
		$r->execute(array($_POST['titre'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['surface'],$_POST['prix'],NULL,$_POST['type'],$_POST['description']));

		if ($r) {
			$id = $pdo->lastInsertId();

			if (!empty($_FILES['photo']['name'])) {
				$name_photo = explode('.', $_FILES['photo']['name']);
				$ext = end($name_photo);
				$photo = 'logement_' . $id . '.' . $ext;
				$url_photo = ROOT . "photos/$photo";

				$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . "/projets/immobilier_fx_massicot/photos/$photo";

				copy($_FILES['photo']['tmp_name'], $photo_dossier);

				$r = $pdo->query("UPDATE `logement` SET `photo`='$url_photo' WHERE `id_logement` = $id");
			} 
		}
		
	}

}

?>

<?php 

	if (!empty($error)) {
		echo $error;
	}

?>

<form class="mt-4" method="post" enctype="multipart/form-data">
	
	<label for="titre">Titre <span style="color:red">*</span></label>
	<input type="text" class="form-control" id="titre" name="titre" >
	<label for="adresse">Adresse <span style="color:red">*</span></label>
	<input type="text" class="form-control" id="adresse" name="adresse" >
	<label for="ville">Ville <span style="color:red">*</span></label>
	<input type="text" class="form-control" id="ville" name="ville" >
	<label for="cp">Code postal <span style="color:red">*</span></label>
	<input type="number" class="form-control" id="cp" name="cp" >
	<label for="surface">Surface <span style="color:red">*</span></label>
	<input type="text" class="form-control" id="surface" name="surface" >
	<label for="prix">Prix <span style="color:red">*</span></label>
	<input type="text" class="form-control" id="prix" name="prix" >
	<label for="photo">Photo</label>
	<input type="file" class="form-control" id="photo" name="photo">
	<label for="type">Type <span style="color:red">*</span></label>
	<select id="type" name="type" class="form-control">
		<option value="">-- Sélectionner le type de votre bien --</option>
		<option value="location">Location</option>
		<option value="vente">Vente</option>
	</select>
	<label for="description">description</label>
	<textarea id="description" class="form-control" name="description" rows="5" ></textarea>
	<input type="submit" class="btn btn-default mt-3">
</form>

<?php include('inc/footer.php'); ?>
		