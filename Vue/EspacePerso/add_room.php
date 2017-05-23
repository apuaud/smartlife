<?php session_start(); 
include("../db_connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAccount.css" />
		<title>Ajout d'une nouvelle maison</title>
	</head>
	<body class="guillaumebody">
		<header class="myheader">
			<?php
			if(isset($_SESSION['id']))
			{
				if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
				{
					include("../Vue/EspacePerso/TestHeader.php");
				}
				else if($_SESSION['type']==2)
				{
					include("../Vue/EspacePerso/HeaderAdmin.php");
				}
			}
			if(!isset($_SESSION['id']) || $_SESSION['type']==0)
			{
				header("Location:http://puaud.eu/appmvc/Vue/Error/error.php?error=notConnected");
			}
			include("../analyticstracking.php"); ?>
		</header>
	<h1> Ajout d'une nouvelle pièce </h1>
	<form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutPiece&maison=<?php echo $_GET['maison'] ?>" method="post" onsubmit="return verifyInputs();"/>
		<p class = "Formulaire">
		<input required class="zonetexte" type="text" name="nom-piece" placeholder="Nom de la pièce" size=70 />
		</p>
		<p class = "Formulaire">
		<input required class="zonetexte" type="number" name="etage" placeholder="Etage" size=70 />
		<input required class="zonetexte" type="number" name="superficie" placeholder="Superficie" size=70 />
		</p>
		<button type="submit"> Valider </button>
	</form>
	</body>

	<script type="text/javascript" src="http://puaud.eu/appmvc/Vue/EspacePerso/checkInputsFields.js"></script>

</html>
