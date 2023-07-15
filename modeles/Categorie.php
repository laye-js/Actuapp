<?php 
class Categorie{
    private $id;
    private $libelle;

	public function getLibelle() {
		return $this->libelle;
	}
	public function getId() {
		return $this->id;
	}
    public function __construct($id, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }
	
}
?>