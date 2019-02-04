<?php require_once ('inc/header.inc.php'); ?>

<?php 

if (isset($_POST['ajout_panier'])) {
	$r = query("SELECT * FROM article WHERE id_article = $_POST[id_article]", true);

	ajout_panier($r['titre'],$r['id_article'],$_POST['quantite'],$r['prix']);

}

if (isset($_GET['action']) && $_GET['action'] == 'retirer') {
	retirer_article_panier($_GET['id_article']);	
}

if (isset($_GET['action']) && $_GET['action'] == 'vider') {
	unset($_SESSION['panier']);
	header('Location: panier.php');
}

if (isset($_GET['action']) && $_GET['action'] == 'commande_valider') {
	$content .= "<p class='alert alert-success'>Merci pour votre commande !<p>";
}

if (isset($_GET['action']) && $_GET['action'] == 'commande_erreur') {
	$content .= "<p class='alert alert-danger'>La commande a échouée vous pouvez réessayer.<p>";
}


if (isset($_POST['payer'])) {
	$r = query("INSERT INTO commande(id_membre,montant,date) VALUES(" . $_SESSION['membre']['id_membre'] . ", " . montant_total() . ", NOW())");

	$id_commande = lastInsertId();
	
	for ($i=0; $i < count($_SESSION['panier']['id_article']); $i++) { 
		query("INSERT INTO details_commande(id_commande, id_article, quantite, prix) VALUES($id_commande, " . $_SESSION['panier']['id_article'][$i] . ", " . $_SESSION['panier']['quantite'][$i] . ", " . $_SESSION['panier']['prix'][$i] . ")");
	}

	if ($r) {
		unset($_SESSION['panier']);
		header('Location: panier.php?action=commande_valider');
	} else {
		header('Location: panier.php?action=commande_erreur');
	}
}

$content .= "<table class='table'>";
	$content .= "<tr><th class='text-center'>id_article</th><th>Titre</th><th class='text-center'>Qantité</th><th class='text-center'>Prix</th><th class='text-right'>Total</th><th class='text-right'>Actions</th></tr>";
	if (empty($_SESSION['panier']['id_article'])) {
		$content .= "<tr><td colspan='6'>Votre panier est vide</td></tr>";
	} else {
		for ($i=0; $i < count($_SESSION['panier']['id_article']); $i++) { 
			$content .= "<tr>";
				$content .= "<td class='text-center'>" . $_SESSION['panier']['id_article'][$i] . "</td>";
				$content .= "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
				$content .= "<td class='text-center'>" . $_SESSION['panier']['quantite'][$i] . "</td>";
				$content .= "<td class='text-center'>" . $_SESSION['panier']['prix'][$i] . " €</td>";
				$content .= "<td class='text-right'>" . $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i] . " €</td>";
				$content .= "<td class='text-right'><a class='btn btn-danger' href='?action=retirer&id_article=" . $_SESSION['panier']['id_article'][$i] . "'><i class='fas fa-trash-alt'></i></a></td>";
			$content .= "</tr>";
		}
		$content .= "<th class='text-right' colspan='3'>Montant total</th><th class='text-right' colspan='2'>" . montant_total() . " €</th><th></th>";

		if (userConnect()) {
			$content .= "<form method='post'>";
				$content .= "<tr>";
					$content .= "<td class='text-right' colspan='6'><input type='submit' class='btn btn-info' name='payer' value='Payer'></td>";
				$content .= "</tr>";
			$content .= "</form>";
			
		} else {
			$content .= "<tr>";
				$content .= "<td colspan='6'>Veuillez vous <a href='connexion.php'>connecter</a> ou vous <a href='inscription.php'>inscrire</a></td>";
			$content .= "</tr>";
		}
		$content .= "<tr>";
			$content .= "<td colspan='6'><a class='btn btn-light' href='?action=vider'>Vider mon panier</a></td>";
		$content .= "</tr>";
	}
$content .= "</table>";




?>

<h1 class="text-center my-2">Votre panier</h1>

<?= $content; ?>
<?php require_once ('inc/footer.inc.php'); ?>











