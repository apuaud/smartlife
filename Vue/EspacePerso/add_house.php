<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAccount.css" />
		<title>Ajout d'une nouvelle maison</title>
	</head>
	<body class="guillaumebody">
		<header class="myheader">
			<?php include("TestHeader.php");
			include("../analyticstracking.php"); ?>
		</header>
	<h1> Ajouter une nouvelle maison </h1>
	<form class="formulairemaison" action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutMaison" method="post" onsubmit="return verifyInputs();"/>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" name="nom-maison" pattern=".{1,}" title="Doit contenir au moins un caractère" placeholder="Nom de la maison" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" name="adresse" pattern=".{1,}" title="Doit contenir au moins un caractère" placeholder="Adresse" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" pattern="[0-9]{5}" title="5 chiffres"name="codepostal" placeholder="Code postal" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" pattern="[a-zA-Z]{1,}" title="Ne peut conternir que des lettres" name="ville" placeholder="Ville" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" name="pays" pattern="[a-zA-Z]{1,}" title="Ne peut conternir que des lettres" placeholder="Pays" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="number" name="superficie" placeholder="Superficie" size=70 />
		<input required class="zonetexte" type="number" name="nbhab" placeholder="Nombre d'habitants" size=70 />
		</p>

		<button type="submit"> Valider </button>
	</form>
	</body>

	<script type="text/javascript" src="http://puaud.eu/appmvc/Vue/EspacePerso/checkInputsFields.js"></script>
</html>
