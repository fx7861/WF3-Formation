<?php require_once('init.inc.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta name='language' content='FR'>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= ROOT . 'assets/css/style.css'; ?>">
	<link rel="canonical" href="https://www.monsite.com" />
	<meta name='url' content='https://www.monsite.com'>
	<title>Le titre</title>
	<meta name='description' content='150 caractères'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/scripts.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="<?= ROOT . 'index.php'?>">Boutique</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    	<ul class="navbar-nav mr-auto">
			   			<li class="nav-item">
			        		<a class="nav-link" href="<?= ROOT . 'index.php'?>">Accueil</a>
			   			</li>
		   				<li class="nav-item">
					     	<a class="nav-link" href="<?= ROOT . 'panier.php'?>">Panier</a>
					   	</li>

			   			<?php if (adminConnect()): ?> 
				   			<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          BackOffice
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						       		<a class="dropdown-item" href="<?= ROOT . 'admin/gestion_boutique.php'?>">Gestion boutique</a>
						       		<a class="dropdown-item" href="<?= ROOT . 'admin/gestion_membre.php'?>">Gestion membre</a>
						        </div>
				   			</li>
			   			<?php endif; ?>

			   			<?php if (userConnect()): ?>
						  	<li class="nav-item">
						     	<a class="nav-link" href="<?= ROOT . 'profil.php'?>">Profil</a>
						   	</li>
						   	<li class="nav-item">
						     	<a class="nav-link" href="<?= ROOT . 'connexion.php?action=deconnexion'?>">Déconnexion</a>
						   	</li>
					   	<?php else: ?>
						   	<li class="nav-item">
						     	<a class="nav-link" href="<?= ROOT . 'inscription.php'?>">Inscription</a>
						   	</li>
						   	<li class="nav-item">
						     	<a class="nav-link" href="<?= ROOT . 'connexion.php'?>">Connexion</a>
							</li>
					   	<?php endif; ?>
			 		</ul>
			  	</div>
			</nav>
		</div>
	</header>
	<main>
		<div class="container">