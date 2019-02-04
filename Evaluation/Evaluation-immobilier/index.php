<?php include('inc/header.php'); ?>

<section class="d-flex flex-column my-4">
	
	<?php 
		
		$r = $pdo->query("SELECT * FROM `logement` ORDER BY id_logement DESC");
		$res = $r->fetchAll(PDO::FETCH_OBJ);
		foreach ($res as $v):
	?>

	<article class="d-flex my-3">
		<?php 

			if (!empty($v->photo)) {
				echo '<img src="' . $v->photo . '" class="mr-4" width="300px" height="300px">';
			} else {
				echo '<img src="photos/default.jpg" class="mr-4" width="300px" height="300px">';
			}
		?>
		
		<div>
			<h3><?= $v->titre; ?></h3>
			<p><?= $v->adresse; ?></p>
			<p><?= $v->cp . $v->ville; ?></p>
			<p>Surface : <?= $v->surface; ?> m²</p>
			<p>Prix : <?= $v->prix; ?></p>
			<p>Description : <?= strlen($v->description) >= 180 ? substr($v->description, 0, 180).'...' : $v->description; ?></p>

		</div>	
	</article>

	<?php endforeach; ?>

</section>
<?php include('inc/footer.php'); ?>
		
