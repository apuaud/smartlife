<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="Styles/style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="Controleur/action.php?action=connexion" method="post">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer"  /></td>
				</tr>
				<tr>
					<td id="itemID" ><input required id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword"><input required id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="Controleur/action.php?action=goToOublieMotDePasse" style="color:white" >Mot de passe oublié ?</td>
				</tr>

				<tr>
					<td id='itemRegister' style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Inscription</div></td>
				</tr>
			</table>
			</form>
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
		<div class="container" id="accueil" >
			<p id="logoContainer"><img align="middle"id="logo2" src="img/accueil_logo.png"></p>

			<img class ="imgBackground"src="img/accueil.png" style="position:relative; z-index=4;">

			<table id = "barreAccueil" class="caption">
				<tr>
					<td id="itemAccueil" class="menuItem">Home</td>
					<td id="itemPresentation" class="menuItem">Services</td>
					<td id='itemLogo' ></td>
					<td id='itemAccount'class="menuItem" onclick=<?php echo $functionCalledOnAccountClick ?>>Account</td>
					<td id='itemAide'class="menuItem"><a href="Controleur/action.php?action=goToSupport&focus1=itemSupport&focus2=&" style="text-decoration:none;color:inherit;">Help</a></td>
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
			<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Your Home, Your Future</p>
<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Discover more by scrolling down!</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>

		<div class="container " id="presentation">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Take control of your home by connecting the shutters,
																				the lights, and by adding plenty of other features !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get a smart house</p>
			<img class ="imgBackground"  src="img/presentation1.jpg">
		</div>

		<div class="container" id="presentation2">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Get a connexion from every where you want, whenever you want
																				and on each of your devices !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Be connected from everywhere</p>
			<img class ="imgBackground" src="img/presentation2MindFuckRogne.png">
		</div>

		<div class="container" id="presentation3">
			<div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
					<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="img/guillemetsHaut.png"></p>
					<p class="sloganDescriptionP">Don't ever be surprised anymore when reveiving your elecrticity and water bills,
																				be aware of your consumption in real time and don't ever waste energy !</p>
					<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="img/guillemetsBas.png"></p>
				</div>
			</div>
			<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get full control on your energy</p>
			<img class ="imgBackground" src="img/presentation3.jpg">
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="Vue/Index/firstPage.js"></script>

	</body>
</html>
