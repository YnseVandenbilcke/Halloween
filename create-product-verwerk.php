<?php
//link de nodige bestanden
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";

if(isset($_POST['submit'])){
    $aantalRijen = HalloweenRepository::createProduct($_POST['titel'], $_POST['omschrijving'], $_POST['kostprijs'], $_POST['afbeelding'], $_POST['catID']);
    if($aantalRijen > 0){
        header('location:index.php');
    } else {
        echo "Toevoegen mislukt";
    }
} else {
    echo "Toevoegen mislukt. (Je kwam niet van het formulier)";
}
// controleer er via het formulier op deze pagina terecht is gekomen, anders geef je een foutmelding.
// Als er via het formulier is binnengekomen: controleer of alle velden in het form zijn ingevuld
// voeg het product toe
// als het gelukt is, ga terug naar de index
// anders geef je een foutmelding
?>