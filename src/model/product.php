<?php
class Product{
    public $ID;
    public $titel;
    public $omschrijving;
    public $kostprijs;
    public $afbeelding;
    public $catID;

    public function __construct($parID=-1, $parTitel="", $parOmschrijving="", $parKostprijs=-1, $parAfbeelding="", $parCatID=-1)
    {
        $this->ID = $parID;
        $this->titel = $parTitel;
        $this->omschrijving = $parOmschrijving;
        $this->kostprijs = $parKostprijs;
        $this->afbeelding = $parAfbeelding;
        $this->catID = $parCatID;
    }
}
?>