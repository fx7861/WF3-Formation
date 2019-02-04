<?php

namespace App\Controller;


class AssociationController extends Controller
{

    public function association(){

        if (isset($_GET['action']) && !empty($_GET['id'])) {
            if ($_GET['action'] === 'supprime') {
                $id = $_GET['id'];
                $this->db->query("DELETE FROM `association_vehicule_conducteur` WHERE `id_association` = $id");
            }

            if ($_GET['action'] === 'modif') {
                $id = $_GET['id'];
                $query = $this->db->query("SELECT * FROM `association_vehicule_conducteur` WHERE `id_association` = $id");
                $association = $query->fetchAll(\PDO::FETCH_OBJ);
                if (!empty($_POST['conducteur']) && !empty($_POST['vehicule'])) {
                    $id_curent = $_POST['id'];
                    $id_conducteur = $_POST['conducteur'];
                    $id_vehicule = $_POST['vehicule'];
                    $r = $this->db->prepare("UPDATE `association_vehicule_conducteur` SET id_vehicule=$id_vehicule, id_conducteur=$id_conducteur WHERE id_association=$id_curent");
                    $r->execute();
                    header('Location: ?p=association');
                }
            }
        }

        if (!empty($_POST['conducteur']) && !empty($_POST['vehicule']) && !isset($_GET['action'])){
            $id_conducteur = $_POST['conducteur'];
            $id_vehicule = $_POST['vehicule'];
            $r = $this->db->prepare('INSERT INTO `association_vehicule_conducteur`(`id_vehicule`, `id_conducteur`) VALUES (?,?)');
            $r->execute(array($id_vehicule, $id_conducteur));
        }

        $queryC = $this->db->query('SELECT * FROM `conducteur`');
        $conducteur = $queryC->fetchAll(\PDO::FETCH_OBJ);
        $queryV = $this->db->query('SELECT * FROM `vehicule`');
        $vehicule = $queryV->fetchAll(\PDO::FETCH_OBJ);
        if (!isset($_GET['action']) OR $_GET['action'] !== 'modif') {
            $queryA = $this->db->query('SELECT * FROM `association_vehicule_conducteur`');
            $association = $queryA->fetchAll(\PDO::FETCH_OBJ);
        }

        return $this->render('page\association', compact('conducteur', 'vehicule', 'association'));

    }

}