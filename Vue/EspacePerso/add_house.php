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
			<?php $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/TestHeader.php");
			$doc_root = $_SERVER['DOCUMENT_ROOT'];include_once("$doc_root/app/analyticstracking.php"); ?>
		</header>
	<h1> Ajouter une nouvelle maison </h1>
	<form class="formulairemaison" action="http://puaud.eu/app/Controleur/action.php?action=validerAjoutMaison" method="post" />
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="nom-maison" placeholder="Nom de la maison" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="adresse" placeholder="Adresse" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="codepostal" placeholder="Code postal" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="ville" placeholder="Ville" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="pays" placeholder="Pays" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="superficie" placeholder="Superficie" size=70 />
		</p>
		<p class = "Formulaire">
		<input class="zonetexte" type="text" name="nbhab" placeholder="Nombre d'habitants" size=70 />
		</p>
		<button type="submit"> Valider </button>
	</form>
	</body>
</html>
