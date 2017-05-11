<?php
session_start();
setcookie('langue', 'fr', time() + 365*24*3600, null, null, false, true);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="connexion.php" method="post">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
				</tr>
				<tr>
					<td id="itemID" ><input id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword"><input id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="lostpassword.php" style="color:white" >Mot de passe oublié ?</td>
				</tr>
				</form>
				<tr>
					<td id='itemRegister'><a href="register.php">S'inscrire</a></td>
				</tr>
			</table>
		</div>
		<p class="langueselect">
			<a href="languefr.php">
				<button class="buttonlangue" name="fr">
					<img src="http://www.oneturf.fr/images/fr.gif" alt="fr" style="height:15px;max-width:auto;" />
			</a>
				</button> |
			<a href="langueen.php">
				<button class="buttonlangue" name="en">
					<img src="http://www.oneturf.fr/images/gb.gif" alt="en" style="height:15px;max-width:auto;" />
				</button>
			</a>
		</p>
		<div class="container" id="accueil" >
			<p class = "slogan">Your Home, Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="img/accueil_logo.png"></p>

			<img class ="imgBackground"src="img/accueil.png" style="position:relative; z-index=4;">

			<table id = "barreAccueil" class="caption">
				<tr>
					<td id="itemAccueil" class="menuItem">Accueil</td>
					<td id="itemPresentation" class="menuItem">Présentation</td>
					<td id='itemLogo' ></td>
					<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Espace personnel</td>
					<td id='itemAide'class="menuItem"><a href="/app/contact.php" style="text-decoration:none;color:inherit;">Support</a></td>
				</tr>
				<tr id="ligneServices">
					<td></td>
					<td id="levelServices"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>

		<div class="container " id="presentation">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Prenez le contrôle de votre logement en connectant vos volets,
																				vos lumières et en ajoutant plein d'autres fonctionnalités !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Rendez votre maison intelligente</p>
			<img class ="imgBackground"  src="img/presentation1.jpg">
		</div>


		<div class="container" id="presentation2">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Connectez vous à votre logement quand vous voulez,
																				d'où vous voulez, et à partir de n'importe quel appareil !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Contrôlez votre maison à distance</p>
			<img class ="imgBackground" src="img/presentation2MindFuckRogne.png">
		</div>

		<div class="container" id="presentation3">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Ne soyez plus surpris du montant inscrit au bas de vos factures d'eau et d'électricité,
																				soyez avertit en temps réel de votre consommation et ne gaspillez plus d'énergie !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Optimisez votre consommation énergétique</p>
			<img class ="imgBackground" src="img/presentation3.jpg">
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="firstPage.js"></script>


	</body>
</html>
