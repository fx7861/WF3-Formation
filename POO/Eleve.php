<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 28/01/2019
 * Time: 10:38
 */

class Eleve
{
    private $prenom, $nom, $age;

    /**
     * Eleve constructor.
     * @param $prenom
     * @param $nom
     * @param $age
     */
    public function __construct($prenom, $nom, $age)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    public function getNomComplet() {
        return $this->nom . ' ' . $this->prenom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


}