<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 01/02/2019
 * Time: 12:21
 */

namespace App\Controller;


class VehiculeController extends Controller
{
    public function vehicule(){

        if (isset($_GET['action']) && !empty($_GET['id'])) {

            if ($_GET['action'] === 'supprime') {
                $id = $_GET['id'];
                $this->db->query("DELETE FROM `vehicule` WHERE `id_vehicule` = $id");
            }

            if ($_GET['action'] === 'modif') {
                $id = $_GET['id'];
                $query = $this->db->query("SELECT * FROM `vehicule` WHERE `id_vehicule` = $id");
                $vehicule = $query->fetchAll(\PDO::FETCH_OBJ);
                if (
                    !empty($_POST['marque']) &&
                    !empty($_POST['modele']) &&
                    !empty($_POST['couleur']) &&
                    !empty($_POST['immatriculation'])
                ) {
                    $id_curent = $_POST['id'];
                    $marque = $_POST['marque'];
                    $modele = $_POST['modele'];
                    $couleur = $_POST['couleur'];
                    $immatriculation = $_POST['immatriculation'];
                    $r = $this->db->prepare("UPDATE `vehicule` SET `marque`='$marque',`modele`='$modele',`couleur`='$couleur',`immatriculation`='$immatriculation' WHERE id_vehicule=$id_curent");
                    $r->execute();
                    header('Location: ?p=vehicule');
                }
            }
        }

        if (
            !empty($_POST['marque']) &&
            !empty($_POST['modele']) &&
            !empty($_POST['couleur']) &&
            !empty($_POST['immatriculation']) &&
            !isset($_GET['action'])
        ){
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $couleur = $_POST['couleur'];
            $immatriculation = $_POST['immatriculation'];
            $r = $this->db->prepare('INSERT INTO `vehicule`(`marque`, `modele`, `couleur`, `immatriculation`) VALUES (?,?,?,?)');
            $r->execute(array($marque, $modele, $couleur, $immatriculation));
        }

        if (!isset($_GET['action']) OR $_GET['action'] !== 'modif') {
            $query = $this->db->query('SELECT * FROM `vehicule`');
            $vehicule = $query->fetchAll(\PDO::FETCH_OBJ);
        }


        return $this->render('page\vehicule', compact('vehicule'));

    }
}