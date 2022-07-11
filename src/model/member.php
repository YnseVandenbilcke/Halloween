<?php
class Member{
    public $naam;
    public $voornaam;
    public $geboortedatum;
    public $geslacht;
    public $paswoord;
    public $afbeelding;
    public $id;

    public function __construct($parNaam="", $parVoornaam="", $parGeboortedatum=null, $parGeslacht="", $parPaswoord="", $parAfbeelding="", $parID=-1)
    {
        $this->naam = $parNaam;
        $this->voornaam = $parVoornaam;
        $this->geboortedatum = $parGeboortedatum;  
        $this->geslacht = $parGeslacht;
        $this->paswoord = $parPaswoord;
        $this->afbeelding = $parAfbeelding;
        $this->id = $parID;
    }
}
?>