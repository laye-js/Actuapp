<?php

class Article
{
    private $id;
    private $titre;
    private $libelle;
    private $contenu;
    private $datemod;
    private $dateCrea;
    private $categorie;



    public function __construct($id,$titre, $libelle, $contenu,$datemod,$dateCrea,$categorie)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->libelle = $libelle;
        $this->contenu = $contenu;
        $this->datemod = $datemod;
        $this->dateCrea = $dateCrea;
        $this->categorie = $categorie;



    }
    public function getTitre() {
        return $this->titre;
    }
    public function getLibelle() {
        return $this->libelle;
    }
    public function getContenu() {
        return $this->contenu;
    }
    

	/**
	 * @return mixed
	 */
	public function getCategorie() {
		return $this->categorie;
	}

	/**
	 * @return mixed
	 */
	public function getDateCrea() {
		return $this->dateCrea;
	}

	/**
	 * @return mixed
	 */
	public function getDatemod() {
		return $this->datemod;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
}
?>