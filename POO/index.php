<?php

require_once 'Ecole.php';
require_once 'Eleve.php';
require_once 'Classe.php';

$ecole = new Ecole(
    'WF3 Les Mureaux',
    '17 rue Albert Thomas',
    '78130',
    'Les Mureaux',
    'Hugo LIEGEARD'
);

echo $ecole->getNom() . ' - ' . $ecole->getDirecteur();

echo $ecole->setNom('Webforce3 - Les Mureaux');

$eleve1 = new Eleve('Hugo', 'LIEGEARD', 29 );
$eleve2 = new Eleve('Christian', 'SIMO', 22);
$eleve3 = new Eleve('Akim', 'LEBOGOSS', 26);
$eleve4 = new Eleve('Mustapha', 'El MIR', 38);

$classeFront = new Classe('Jordan', 'Front');
$classeBack = new Classe('Jérémie', 'Back');
$classeFullstack = new Classe('Hugo', 'Fullstack');

$classeFront->ajouterUnEleve($eleve2);
$classeFront->ajouterUnEleve($eleve4);
$classeBack->ajouterUnEleve($eleve3);
$classeFullstack->ajouterUnEleve($eleve1);

$ecole->ajouterUneClasse($classeFront);
$ecole->ajouterUneClasse($classeBack);
$ecole->ajouterUneClasse($classeFullstack);

echo '<hr>';

/*echo '<pre>';
print_r($classeFront);
print_r($classeBack);
print_r($classeFullstack);
echo '</pre>';

echo '<hr>';

echo '<pre>';
print_r($ecole);
echo '</pre>';*/

echo '<h3>Ecole : ' . $ecole->getNom() . '</h3>';
echo '<ol>';
/** @var Classe $c */
foreach ($ecole->getClasses() as $c) {
    echo '<li>Classe : ' . $c->getNom() . '</li>';
    echo '<ul>';
    /** @var Eleve $e */
    foreach ($c->getEleves() as $e) {
        echo '<li>Eleve :' . $e->getNomComplet() . '</li>';
    }
    echo '</ul>';
}
echo '</ol>';
