<?php

class Ecole
{
    private $nom, $adresse, $cp, $ville, $directeur, $classes = [];

    /**
     * Ecole constructor.
     * @param $nom
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $directeur
     */
    public function __construct($nom, $adresse, $cp, $ville, $directeur)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->directeur = $directeur;
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
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     * @param mixed $directeur
     */
    public function setDirecteur($directeur)
    {
        $this->directeur = $directeur;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * @param array $classes
     */
    public function ajouterUneClasse(Classe $classe)
    {
        $this->classes[] = $classe;
    }


}
