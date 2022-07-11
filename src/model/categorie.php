<?php
class Categorie{
    public $ID;
    public $categorieNaam;

    public function __construct($parID=-1, $parCategorieNaam=-1)
    {
        $this->ID = $parID;
        $this->categorieNaam = $parCategorieNaam;
    }
}
?>