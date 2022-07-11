<?php
//vergeet niet: sessie starten, nodige bestanden linken
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";

function toonLogin(){
	if(!isset($_SESSION["loginNaam"])){
		echo "<div class='login'>";
			echo "<form class='login__form' method='POST' action='" . $_SERVER['PHP_SELF'] ."'>";
				echo "<input class='login__name' placeholder='login' name='login__name'>";
				echo "<input class='login__password' placeholder='paswoord' name='login__password'>";
				echo "<input class='login__submit' type='submit' value='ok' name='login'>";
			echo "</form>";
		echo "</div>";
	} else {
		echo "<div class='profile'>";
			echo "<div class='profile__attribute'>";
				echo "<img class='profile__attribute profile__pic' src='". $_SESSION['afbeelding'] ."'>";
			echo "</div>";
			echo "<div class='profile__attribute profile__name'>". $_SESSION['loginVoornaam']. " " . $_SESSION['loginNaam'] ."</div>";
			echo "<a class='profile__attribute profile__logout' href='logout.php'>Afmelden</a>";
		echo "</div>";
	}
} 

if(isset($_POST['login'])){
	$_SESSION['gebruikersnaam'] = $_POST['login__name'];
	$user = HalloweenRepository::getMemberByLogin($_SESSION['gebruikersnaam']);
	if(isset($user)){
		if(password_verify($_POST['login__password'], $user['paswoord'])){
			$_SESSION['loginNaam'] = $user['Naam'];
			$_SESSION['loginVoornaam'] = $user['Voornaam'];
			$_SESSION['ingelogd'] = true;
			$_SESSION['loginID'] = $user['id'];
			$_SESSION['afbeelding'] = $user['afbeelding'];
			header("location:index.php");
		} else {
			echo "Verkeerd wachtwoord";
		}
	} else {
		echo "Gebruiker bestaat niet";
	}
}

// variabelen bijhouden met categorieën, members, producten, producten aan de hand van het ID, variabele die bijhoudt of je al dan niet bent ingelogd.
//default: toon alle producten; Anders als het via de filterknoppen wordt opgehaald, toon producten met specifiek ID.
//als de sessie bestaat: haal de gegevens op van de ingelogde gebruiker (en pas je (ingelogd of niet-)variabele aan)
// anders:als de persoon inlogt via form: haal de gegevens op en steek ze in een sessie (pas de (ingelogd of niet)-variabele aan)
//vergeet de controle op paswoord niet! (indien paswoord niet ok = pas de (ingelogd of niet)-variabele aan.
//anders = niet ingelogd

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

<!-- if ingelogd -->
<!-- vul de correcte gegevens in in de form en voeg de nodige attributen toe, om via php controle te doen-->
<?php toonLogin(); ?>
<!-- if niet ingelogd: toon gegevens van ingelogde user-->

<!-- end if --> 
<h1>Halloween webshop</h1>
<div class="wrapper">
	<div class="content c-row">
		<section>
			<div class="c-row categories">
				<div class="c-nav__filter">
				<a href="index.php" class="c-nav__link"><span class='product-grid__btn product-grid__update'>alles</span></a>
					<?php 
						$categories = HalloweenRepository::getAllCategories();
						foreach($categories as $categorie){
					?>
						<a href="index.php?id=<?php echo $categorie->ID ?>" class="c-nav__link"><span class="product-grid__btn product-grid__update"><?php echo $categorie->categorieNaam ?></span></a>
					<?php } ?>
					<!-- toon andere buttons afhankelijk van de productcategorieën -->
					<!-- layout is gelijk aan de 'alles' van hierboven -->
				</div>
			</div>
		</section>
		<section>
			<div class="product-grid product-grid--flexbox">
				<div class="product-grid__wrapper">

					<!-- toon alle producten -->
					<?php
						if(!isset($_GET['id'])){		
							$producten = HalloweenRepository::getAllProducts();
							foreach($producten as $product){
					?>
						<div class='product-grid__product-wrapper'>
							<div class='product-grid__product'>
								<div class='product-grid__img-wrapper'>			
									<img src='<?php echo $product->afbeelding ?>' alt='Img' class='product-grid__img' />
								</div>
								<div class='product-grid__row'>
									<aside class='product-grid__side'>
										<span class='product-grid__title'><?php echo $product->titel ?></span>
										<span class='product-grid__price'>&euro; <?php echo $product->kostprijs ?></span>
									</aside>
									<?php if(isset($_SESSION['ingelogd'])){ ?>
									<!-- als je ingelogd bent, toon dan de update en delete knoppen + juiste link-->
										<div class='product-grid__action'>
											<a href='update-product.php?id=<?php echo $product->ID ?>&catID=<?php echo $product->catID ?>'><span class='product-grid__btn product-grid__update'><i class='fas fa-pencil-alt'></i></span></a>	
											<a href='delete-product.php?id=<?php echo $product->ID ?>'><span class='product-grid__btn product-grid__delete'><i class='fas fa-trash-alt'></i></i></span></a>
										</div>
									<?php } else { ?>
									<!-- end ingelogd-->

									<!-- anders toon je de view-knop -->
										<div class='product-grid__action product-grid__action--user'>
											<a href=''><span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-shopping-cart"></i></span></a>
											<a href='detail.php?id=<?php echo $product->ID ?>'><span class='product-grid__btn product-grid__view'><i class='fas fa-eye'></i> </span></a>										</div>
									<?php } ?>
									<!-- end anders-->
			
								</div>
							</div>
						</div>
					<?php }} else {
						$producten = HalloweenRepository::getProductsByCategoryID($_GET['id']);
						foreach($producten as $product){
							?>
						<div class='product-grid__product-wrapper'>
							<div class='product-grid__product'>
								<div class='product-grid__img-wrapper'>	
									<img src='<?php echo $product->afbeelding ?>' alt='Img' class='product-grid__img' />
								</div>
								<div class='product-grid__row'>
									<aside class='product-grid__side'>
										<span class='product-grid__title'><?php echo $product->titel ?></span>
										<span class='product-grid__price'>&euro; <?php echo $product->kostprijs ?></span>
									</aside>
									<?php if(isset($_SESSION['ingelogd'])){ ?>
									<!-- als je ingelogd bent, toon dan de update en delete knoppen + juiste link-->
										<div class='product-grid__action'>
											<a href='update-product.php?id=<?php echo $product->ID ?>&catID=<?php echo $product->catID ?>'><span class='product-grid__btn product-grid__update'><i class='fas fa-pencil-alt'></i></span></a>	
											<a href='delete-product.php?id=<?php echo $product->ID ?>'><span class='product-grid__btn product-grid__delete'><i class='fas fa-trash-alt'></i></i></span></a>
										</div>
									<?php } else { ?>
									<!-- end ingelogd-->

									<!-- anders toon je de view-knop -->
										<div class='product-grid__action product-grid__action--user'>
											<a href=''><span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-shopping-cart"></i></span></a>
											<a href='detail.php?id=<?php echo $product->ID ?>'><span class='product-grid__btn product-grid__view'><i class='fas fa-eye'></i> </span></a>
										</div>
									<?php } ?>
									</div>
							</div>
						</div>
									<!-- end anders-->
							<?php
						}
					}
				?>
    
					<!-- als je ingelogd bent, moet je een product kunnen toevoegen: -->
					<?php
						if(isset($_SESSION['ingelogd'])){
					?>
					<div class='product-grid__product-wrapper'>
						<a href='create-product.php' class='c-btn'>
							<div class='product-grid__product'>
								<div class='product-grid__img-wrapper'>			
									<img src='images/plus.png' alt='Img' class='product-grid__img' />
								</div>
								<div class='product-grid__row'>
									<aside class='product-grid__side'>
										<span class='product-grid__title'>Voeg een nieuw Halloweenproduct toe</span>
										<span class='product-grid__price'></span>
									</aside>
								</div>
							</div>
						</a>
					</div>
					<?php } ?>
					<!-- end product toevoegen -->
				</div>
			</div>
		</section>
	</div>
</div>

</body>
</html>
