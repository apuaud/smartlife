<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="StyleAccount.css" />
		<title>Ajout d'une nouvelle maison</title>
	</head>
	<body>
		<header>
			<?php echo 'Vous êtes connecté en tant que ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' (' . $_SESSION['pseudo'] .')'; ?>
			<h1> Votre espace personnel </h1>
		</header>
		<h1> Ajout d'une nouvelle maison </h1>
	<form action="ajouter_maison.php" method="post" />
		<p class = "Formulaire">
		<input type="text" name="nom-maison" placeholder="Nom de la maison" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="adresse" placeholder="Adresse" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="codepostal" placeholder="Code postal" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="ville" placeholder="Ville" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="pays" placeholder="Pays" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="superficie" placeholder="Superficie" size=70 />
		</p>
		<p class = "Formulaire">
		<input type="text" name="nbhab" placeholder="Nombre d'habitants" size=70 />
		</p>	
		<button type="submit"> Valider </button>
	</form>
	</body>
</html>