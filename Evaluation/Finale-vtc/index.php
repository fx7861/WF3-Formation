<?php

require 'app/App.php';

use App\Controller\ConducteurController;
use App\Controller\VehiculeController;

$app = App::getInstance();

$app->boot();

define('ROOT', __DIR__);

if (isset($_GET['p'])) {
	$page = $_GET['p'];
} else {
	$page = 'conducteur';
}

switch ($page) {
	case 'conducteur':
		$controller = new ConducteurController();
		$controller->conducteur();
		break;
	case 'vehicule':
        $controller = new VehiculeController();
        $controller->vehicule();
		break;
	case 'association':
        $controller = new \App\Controller\AssociationController();
        $controller->association();
		break;
    default:
        header('Location: index.php');
        break;
}

