
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<?php include_once("analyticstracking.php") ?>
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
					<td id='itemLostPassword'  align="center"><a href="#" style="color:white" >Password forgotten ?</a></td>
				</tr>

				<tr>
					<td id='itemRegister'><button class="buttonsubmit" onclick="window.location.href='register.html'">Register</button></a></td>
				</tr>
			</table>
			</form>
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
			<p id="logoContainer"><img align="middle"id="logo2" src="img/accueil_logo.png"></p>

			<img class ="imgBackground"src="img/accueil.png" style="position:relative; z-index=4;">

			<table id = "barreAccueil" class="caption">
				<tr>
					<td id="itemAccueil" class="menuItem">Home</td>
					<td id="itemPresentation" class="menuItem">Services</td>
					<td id='itemLogo' ></td>
					<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Account</td>
					<td id='itemAide'class="menuItem"><a href="/app/contact.php" style="text-decoration:none;color:inherit;">Help</a></td>
				</tr>
				<tr id="ligneServices">
					<td></td>
					<td id="levelServices"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<p class = "slogan">Your Home, Your Future</p>

		</div>

		<div class="container " id="presentation">
			<div class="sloganDescription">
				<p class="sloganDescriptionP">Take control of your home by connecting the shutters,<br/>
																			the lights, and by adding plenty of other features !</p>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get a smart house</p>
			<img class ="imgBackground"  src="img/presentation1.jpg">
		</div>

		<div class="container" id="presentation2">
			<div class="sloganDescription">
				<p class="sloganDescriptionP">Get a connexion from every where you want, whenever you want<br/>
																			and on each of your devices !</p>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Be connected from everywhere</p>
			<img class ="imgBackground" src="img/presentation2MindFuckRogne.png">
		</div>

		<div class="container" id="presentation3">
			<div class="sloganDescription">
				<p class="sloganDescriptionP">Don't ever be surprised anymore when reveiving your elecrticity and watrer bills,<br/>
																			be aware of your consommation in real time and don't ever waste energy !</p>
			</div>
			<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get full control on your energy</p>
			<img class ="imgBackground" src="img/presentation3.jpg">
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="firstPage.js"></script>

	</body>
</html>
