<?php
session_start();
require_once dirname(__FILE__) . "/src/helper/debug.php";
require_once dirname(__FILE__) . "/src/repository/halloweenrepository.php";
// link de juiste bestanden

//haal het juiste product op.
$product = HalloweenRepository::getProductById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Product detail</title>
		<link rel="stylesheet" href="css/screen.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script src="https://kit.fontawesome.com/da3a9d301d.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="wrapper-form">
			<div class="form-title">
				<h1>Producttitel</h1>
				<a href="index.php">terug naar overzicht</a>
			</div>
			<form>
				<div class="c-row">
					<!-- image source-->
					<img src="<?php echo $product->afbeelding ?>" alt="<?php echo $product->afbeelding ?>" class="c-row__image c-row__image--big" />
				</div>

				<div class="product-grid__row">
					<div class="c-row__input">
						<!-- productomschrijving-->
						<p><?php echo $product->omschrijving ?></p>
					</div>
				</div>

				<div class="product-grid__row" style="justify-content: center">
					<!-- kostprijs -->
					<span class="product-grid__price"> € <?php echo $product->kostprijs ?></span>
				</div>

				<!--winkelmandje moet niet functioneel zijn -->
				<div class="product-grid__row" style="justify-content: center">
					<a href="index.php">
						<span class="product-grid__btn product-grid__add-to-cart" style="width: 100%"><i class="fas fa-cart-arrow-down"></i> Toevoegen aan winkelmandje</span>
					</a>
				</div>
			</form>
		</div>
	</body>
</html>
