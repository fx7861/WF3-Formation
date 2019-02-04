<?php require_once ('inc/header.inc.php'); ?>

<?php 
	
	if (isset($_GET['id_article'])) {
		$r = query("SELECT * FROM article WHERE id_article ='$_GET[id_article]'", true);
	} else {
		header('Location: index.php');
	}

	$content .= '<div class="mb-3">';
	$content .= '<a href="index.php">Accueil boutique</a>';
	$content .= ' > ';
	$content .= "<a href='index.php?categorie=$r[categorie]'>Categorie $r[categorie]</a>";
	$content .= "</div>";
	$content .= "<h3 class='mb-2'>$r[titre]</h3>";
	$content .= "<p class='mb-2'>$r[categorie]</p>";
	$content .= "<p class='mb-2'>$r[couleur]</p>";
	$content .= "<p class='mb-2'>$r[taille]</p>";
	$content .= "<p><img src='$r[photo]'></p>";
	$content .= "<p class='mb-2'>$r[description]</p>";
	$content .= "<p class='mb-2'>$r[prix]</p>";
	$content .= "<p class='mb-2'>$r[titre]</p>";

	if ($r['stock'] > 0) {
		$content .= "<p>Produit disponible : $r[stock]</p>";
		$content .= "<form method='post' action='panier.php'>";
			$content .= "<input type='hidden' name='id_article' value='$r[id_article]'>";
			$content .= "<label for='quantite'>Quantité</label>";
			$content .= "<select class='form-control w-25' name='quantite' id='quantite'>";
				for ($i = 1; $i <= $r['stock']; $i++) { 
					$content .= "<option value='$i'>$i</option>";
				}
			$content .= "</select>";
			$content .= "<input class='btn btn-light my-3' name='ajout_panier' type='submit' value='Ajouter au panier'>";
		$content .= "</form>";

	} else {
		$content .= "<p>Rupture de stock !</p>";
	}

?>

	


<h1 class="text-center my-4">Fiche Produit</h1>

<?= $content; ?>

<?php require_once ('inc/footer.inc.php'); ?>