<?php

namespace App\Controller;

class ConducteurController extends Controller
{

    /**
     * @return mixed
     */
    public function conducteur(){

        if (isset($_GET['action']) && !empty($_GET['id'])) {

            if ($_GET['action'] === 'supprime') {
                $id = $_GET['id'];
                $this->db->query("DELETE FROM `conducteur` WHERE `id_conducteur` = $id");
            }

            if ($_GET['action'] === 'modif') {
                $id = $_GET['id'];
                $query = $this->db->query("SELECT * FROM `conducteur` WHERE `id_conducteur` = $id");
                $conducteur = $query->fetchAll(\PDO::FETCH_OBJ);
                if (!empty($_POST['prenom']) && !empty($_POST['nom'])) {
                    $id_curent = $_POST['id'];
                    $prenom = $_POST['prenom'];
                    $nom = $_POST['nom'];
                    $r = $this->db->prepare("UPDATE conducteur SET prenom='$prenom', nom='$nom' WHERE id_conducteur=$id_curent");
                    $r->execute();
                    header('Location: ?p=conducteur');
                }
            }
        }

        if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !isset($_GET['action'])){
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $r = $this->db->prepare('INSERT INTO `conducteur`(`prenom`, `nom`) VALUES (?,?)');
            $r->execute(array($prenom, $nom));
        }

        if (!isset($_GET['action']) OR $_GET['action'] !== 'modif') {
            $query = $this->db->query('SELECT * FROM `conducteur`');
            $conducteur = $query->fetchAll(\PDO::FETCH_OBJ);
        }

        return $this->render('page\conducteur', compact('conducteur'));

	}
}