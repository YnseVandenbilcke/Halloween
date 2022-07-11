<?php
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";

print_r_pre($_POST);

if(isset($_POST['submit'])){
    $aantalRijen = HalloweenRepository::updateProduct($_POST['titel'], $_POST['omschrijving'], $_POST['kostprijs'], $_POST['afbeelding'], $_POST['categorie'], $_POST['id']);
    if($aantalRijen > 0){
        header("location:index.php");
    } else {
        echo "Updaten mislukt";
    }
} else {
    echo "Updaten mislukt (Je kwam niet van het formulier)";
}
//link de nodige bestanden

// controleer er via het formulier op deze pagina terecht is gekomen, anders geef je een foutmelding.
// Als er via het formulier is binnengekomen: controleer of alle velden in het form zijn ingevuld
// update het product
// als het gelukt is, ga terug naar de index
// anders geef je een foutmelding




?>