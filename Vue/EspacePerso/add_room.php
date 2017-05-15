<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/app/Styles/StyleAccount.css" />
		<title>Ajout d'une nouvelle maison</title>
	</head>
	<body class="guillaumebody">
		<header class="myheader">
			<?php include("TestHeader.php");
			include("analyticstracking.php"); ?>
		</header>
	<h1> Ajout d'une nouvelle pièce </h1>
	<form action="http://puaud.eu/app//Controleur/action.php?action=validerAjoutPiece" method="post" />
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="nom-piece" placeholder="Nom de la pièce" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="etage" placeholder="Etage" size=70 />
		</p>
    <p class = "Formulaire">
		<input class="zonetexte" type="text" name="superficie" placeholder="Superficie" size=70 />
		</p>
		<button type="submit"> Valider </button>
	</form>
	</body>
</html>
