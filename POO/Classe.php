<?php

class Classe
{
    private $profPrincipal, $nom, $eleves = [];

    /**
     * Classe constructor.
     * @param $profPrincipal
     * @param $nom
     */
    public function __construct($profPrincipal, $nom)
    {
        $this->profPrincipal = $profPrincipal;
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getProfPrincipal()
    {
        return $this->profPrincipal;
    }

    /**
     * @param mixed $profPrincipal
     */
    public function setProfPrincipal($profPrincipal)
    {
        $this->profPrincipal = $profPrincipal;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return array
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * @param array $eleves
     */
    public function ajouterUnEleve(Eleve $eleve)
    {
        $this->eleves[] = $eleve;
    }

}