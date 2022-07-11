<?php
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";
// enkel ingelogden kunnen hier iets toevoegen
// vergeet niet iets belangrijks te starten
// link de juiste bestanden
if(isset($_SESSION['ingelogd'])){
  $voornaam = $_SESSION['loginVoornaam'];
  $naam = $_SESSION['loginNaam'];
  $loginID = $_SESSION['loginID'];
  $afbeelding = $_SESSION['afbeelding'];
} else {
  header("location:index.php");
}

function toonCategorie(){

}

// als je ingelogd bent, gebruik dan de gegevens van de ingelogde user (liefs dmv een sessie)
// indien niet ingelogd: stuur terug naar de homepagina.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/screen.css">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/da3a9d301d.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- profiel van member inladen-->
<div class="profile">
<div class="profile__attribute">  

<img  class="profile__attribute profile__pic" src='<?php echo $afbeelding ?>'>
</div>
  <div class=" profile__attribute profile__name"><?php echo $voornaam . " " . $naam ?></div>
  <a class="profile__attribute profile__logout" href="logout.php">afmelden</a>
 
</div>

</div>
<div class="wrapper-form">
 <div class="form-title">
    <h1>Voeg een nieuwe bestelling toe</h1>
   
    <a href="index.php">annuleren</a>
</div>

<!-- vul het form juist aan -->
<!-- voeg de nodige attributen toe, om via php controle te doen-->
    <form action="create-product-verwerk.php" method="POST" class="c-order-form">
 
          <div class="c-row">
            <div class="c-row__label">Naam van het product</div>
            <div class="c-row__input">
             <input type="text" id="titel" name="titel">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">Omschrijving</div>
            <div class="c-row__input">
             <input type="text" id="omschrijving" name="omschrijving">
            </div>
          </div>  <div class="c-row">
            <div class="c-row__label">Pad naar afbeelding</div>
            <div class="c-row__input">
             <input type="text" id="afbeelding" name="afbeelding">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">Kostprijs</div>
            <div class="c-row__input">
             <input type="text" id="kostprijs" name="kostprijs">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">categorie</div>
            <div class="c-row__input" for="type">
             <select id="categorie" name="catID">
               <?php
                 $categories = HalloweenRepository::getAllCategories();
                 foreach($categories as $categorie){
                   echo "<option value='$categorie->ID'>$categorie->categorieNaam</option>";
                 } 
               ?>
            <!-- toon alle categorie-opties in een dropdown -->
             </select>

            </div>
          </div>
          <div class="c-row">
              <div class="c-row__label">
              </div>
              <div class="c-row__input"><input   type="submit"  value="Verzenden" name="submit"></div>
          </div>
       
      </form>
              </div>
</body>
</html>