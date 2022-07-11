<?php
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";

//check if ingelogd
//zoja, haal de logingegevens op
// als je ingelogd bent, mag je (als je het juiste product vindt) het product updaten, als je het product niet vindt, geef dan een foutmelding 
// als je niet ingelogd bent, ga naar de indexpagina

if(!isset($_SESSION['ingelogd'])){
  echo "Je hebt geen toegang tot deze pagina.";
  exit();
}

//schrijf de nodige functie om de juiste categorie weer te geven in de dropdown
$product = HalloweenRepository::getProductById($_GET['id']);
$productCatID = $product->catID;

function toonCategorie(){
  $categories = HalloweenRepository::getAllCategories();
  $product = HalloweenRepository::getProductById($_GET['id']);
  foreach($categories as $categorie){
    echo "<option name='catID' value='$categorie->ID'". bepaalSelected($product->catID, $categorie->ID) .">$categorie->categorieNaam</option>";
  }
}

function bepaalSelected($productCatID, $categorieID){
  if($productCatID == $categorieID){
    return "selected";
  } else {
    return "";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="css/screen.css" />
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://kit.fontawesome.com/da3a9d301d.js" crossorigin="anonymous"></script>
	<title>Halloween shop</title>
</head>
<body>

<div class="profile">
<div class="profile__attribute">  
<!-- login gegevens --> 
<img  class="profile__attribute profile__pic" src='<?php echo $_SESSION['afbeelding'] ?>' >
</div>
  <div class=" profile__attribute profile__name"><?php echo $_SESSION['loginVoornaam'] . " " . $_SESSION['loginNaam'] ?></div>
  <a class="profile__attribute profile__logout" href="logout.php">afmelden</a>
 
</div>

</div>
<div class="wrapper-form">
 <div class="form-title">
    <h1>Pas een bestelling aan</h1>
    <a href="index.php">annuleren</a>
</div>
    <form action="update-product-verwerk.php" method="post" class="c-order-form">
    <div class="c-row">
           <img src='<?php echo $product->afbeelding ?>' class="c-row__image">
          </div>
          <div class="c-row">
            <div class="c-row__label">id</div>
            <div class="c-row__input">
             <input type="text" name="id" id="id" readonly value="<?php echo $product->ID ?>">
            </div>
          </div>


          <div class="c-row">
            <div class="c-row__label">Naam van het product</div>
            <div class="c-row__input">
             <input type="text" name="titel" id="titel" value="<?php echo $product->titel ?>">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">Omschrijving</div>
            <div class="c-row__input">
             <input type="text" name="omschrijving" id="omschrijving" value="<?php echo $product->omschrijving ?>">
            </div>
          </div>  <div class="c-row">
            <div class="c-row__label">Pad naar afbeelding</div>
            <div class="c-row__input">
             <input type="text" name="afbeelding" id="afbeelding" value="<?php echo $product->afbeelding ?>">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">Kostprijs</div>
            <div class="c-row__input">
             <input type="text" name="kostprijs" id="kostprijs" value="<?php echo $product->kostprijs ?>">
            </div>
          </div>
          <div class="c-row">
            <div class="c-row__label">categorie</div>
            <div class="c-row__input" for="type">
             <select name="categorie" id="categorie">
               <?php toonCategorie(); ?>
           <!-- toon alle categorie-opties in een dropdown, zorg ervoor dat de huidige categorie geselecteerd staat in de dropdown -->
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