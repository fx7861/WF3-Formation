<?php require_once ('inc/header.inc.php'); ?>

<?php 

	$r = query("SELECT DISTINCT(categorie) FROM article");

	$content .= '<div class="row">';
		$content .= '<div class="col-3">';
			$content .= '<div class="list-goup">';
				foreach ($r as $v) {
					$content .= "<a href='?categorie=$v[categorie]' class='list-group-item'>$v[categorie]</a>";
				}
			$content .= '</div>';
		$content .= '</div>';

		$content .= '<div class="col-8 offset-1">';
			$content .= '<div class="row">';
				if (isset($_GET['categorie'])) {
					$r = query("SELECT * FROM article WHERE categorie = '$_GET[categorie]'");
					foreach ($r as $v) {
						$content .= '<div class="col-4">';
							$content .= '<div class="thumbnail">';
								$content .= "<a href='fiche_produit.php?id_article=" . $v['id_article'] . "'><img style='max-height:200px; max-width:100%;' src='" . $v['photo'] . "'></a>";
								$content .= '<div class="caption">';
									$content .= "<a style='color:black;' href='fiche_produit.php?id_article=" . $v['id_article'] . "'><h5>" . $v['titre'] . "</h5></a>";
									$content .= "<a class='btn btn-light btn-sm float-right' href='fiche_produit.php?id_article=" . $v['id_article'] . "'>Voir la fiche produit</a>";
								$content .= '</div>';
							$content .= '</div>';
						$content .= '</div>';
					}
				
				}
			$content .= '</div>';
		$content .= '</div>';


	$content .= '</div>';

?>

<h1 class="text-center my-5" style="color:brown;"><em>BOUTIQUE</em></h1>

<?= $content; ?>

<?php require_once ('inc/footer.inc.php'); ?>