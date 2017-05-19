
<div class="container" id="accueil" >
	<p class = "slogan">Your Home, Your Future</p>
	<p id="logoContainer"><img align="middle"id="logo2" src="http://puaud.eu/appmvc/img/accueil_logo.png"></p>

	<img class ="imgBackground"src="http://puaud.eu/appmvc/img/accueil.png" style="position:relative; z-index=4;">

	<table id = "barreAccueil" class="caption">
		<tr>
			<td id="itemAccueil" class="menuItem">Accueil</td>
			<td id="itemPresentation" class="menuItem">Présentation</td>
			<td id='itemLogo' ></td>
			<td id='itemAccount'class="menuItem" onclick=<?php echo $functionCalledOnAccountClick ?>>Espace personnel</td>
			<td id='itemAide'class="menuItem"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToSupport" style="text-decoration:none;color:inherit;">Support</a></td>
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
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Prenez le contrôle de votre logement en connectant vos volets,
																		vos lumières et en a plein d'autres fonctionnalités !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Rendez votre maison intelligente</p>
	<img class ="imgBackground"  src="http://puaud.eu/appmvc/img/presentation1.jpg">
</div>


<div class="container" id="presentation2">
	<div class="sloganDescription">
		<div class="sloganDescriptionInnerContainer">
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Connectez vous à votre logement quand vous voulez,
																		d'où vous voulez, et à partir de n'importe quel appareil !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Contrôlez votre maison à distance</p>
	<img class ="imgBackground" src="http://puaud.eu/appmvc/img/presentation2MindFuckRogne.png">
</div>

<div class="container" id="presentation3">
	<div class="sloganDescription">
		<div class="sloganDescriptionInnerContainer">
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Ne soyez plus surpris du montant inscrit au bas de vos factures d'eau et d'électricité,
																		soyez avertit en temps réel de votre consommation et ne gaspillez plus d'énergie !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Optimisez votre consommation énergétique</p>
	<img class ="imgBackground" src="http://puaud.eu/appmvc/img/presentation3.jpg">
</div>