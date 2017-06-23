<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="../Styles/style.css"  />

	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="action.php?action=connexion" method="post">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" class="spaceBetweenInput"onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
				</tr>
				<tr>
					<td id="itemID"class="spaceBetweenInput" ><input required id="idInput" type="text" name="login" placeholder="Pseudo" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword"class="spaceBetweenInput"><input required id="passwordInput" type="password" name="motdepasse" placeholder="Mot de passe" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'class="spaceBetweenInput"><button class="buttonsubmit" type="submit">Connexion</button></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="action.php?action=goToOublieMotDePasse" style="color:white" >Mot de passe oublié ?</td>
				</tr>
				</form>
				<tr>
					<td id='itemRegister' class="spaceBetweenInput"style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Inscription</div></td>
				</tr>
			</table>
		</div>
		<!--
		<p class="langueselect">
			<a href="Controleur/action.php?action=goToLanguefr">
				<button class="buttonlangue" name="fr">
					<img src="http://www.oneturf.fr/images/fr.gif" alt="fr" style="height:15px;max-width:auto;" />
			</a>
				</button> |
				<a href="Controleur/action.php?action=goToLangueen">
				<button class="buttonlangue" name="en">
					<img src="http://www.oneturf.fr/images/gb.gif" alt="en" style="height:15px;max-width:auto;" />
				</button>
			</a>
		</p>
	-->

	<?php
	if(isset($_SESSION['id']))
	{
		if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
		{
			include("../Vue/Header/headerUser.php");
		}
		else if($_SESSION['type']==2)
		{

			include("../Vue/Header/headerAdmin.php");
		}
	}
	else {
		include("../Vue/Header/headerNotConnected.php");
	}
	?>

		<div class="container" id="accueil" >
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="../img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Découvrez-en plus en descendant la page !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="../img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Your Home, Your Future</p>

			<img class ="imgBackground"src="../img/accueil.png" style="position:relative; z-index=4;">
		</div>

		<div class="container " id="presentation">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="../img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Prenez le contrôle de votre logement en connectant vos volets,
																				vos lumières et en a plein d'autres fonctionnalités !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="../img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Rendez votre maison intelligente</p>
			<img class ="imgBackground"  src="../img/presentation1.jpg">
		</div>


		<div class="container" id="presentation2">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="../img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Connectez vous à votre logement quand vous voulez,
																				d'où vous voulez, et à partir de n'importe quel appareil !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="../img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Contrôlez votre maison à distance</p>
			<img class ="imgBackground" src="../img/presentation2MindFuckRogne.png">
		</div>

		<div class="container" id="presentation3">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="../img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Ne soyez plus surpris du montant inscrit au bas de vos factures d'eau et d'électricité,
																				soyez avertit en temps réel de votre consommation et ne gaspillez plus d'énergie !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="../img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Optimisez votre consommation énergétique</p>
			<img class ="imgBackground" src="../img/presentation3.jpg">
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="../Vue/Index/firstPage.js"></script>

	</body>
</html>
