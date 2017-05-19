<div class="container" id="accueil" >
		<p id="logoContainer"><img align="middle"id="logo2" src="http://puaud.eu/appmvc/img/accueil_logo.png"></p>

		<img class ="imgBackground"src="http://puaud.eu/appmvc/img/accueil.png" style="position:relative; z-index=4;">

		<table id = "barreAccueil" class="caption">
			<tr>
				<td id="itemAccueil" class="menuItem">Home</td>
				<td id="itemPresentation" class="menuItem">Services</td>
				<td id='itemLogo' ></td>
				<td id='itemAccount'class="menuItem" onclick=<?php echo $functionCalledOnAccountClick ?>>Account</td>
				<td id='itemAide'class="menuItem"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToSupport" style="text-decoration:none;color:inherit;">Help</a></td>
			</tr>
			<tr id="ligneServices">
				<td></td>
				<td id="levelServices"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<p class = "slogan zoomAnimation">Your Home, Your Future</p>

</div>

<div class="container " id="presentation">
	<div class="sloganDescription">
		<div class="sloganDescriptionInnerContainer">
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Take control of your home by connecting the shutters,
																		the lights, and by adding plenty of other features !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get a smart house</p>
	<img class ="imgBackground"  src="http://puaud.eu/appmvc/img/presentation1.jpg">
</div>

<div class="container" id="presentation2">
	<div class="sloganDescription">
		<div class="sloganDescriptionInnerContainer">
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Get a connexion from every where you want, whenever you want
																		and on each of your devices !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Be connected from everywhere</p>
	<img class ="imgBackground" src="http://puaud.eu/appmvc/img/presentation2MindFuckRogne.png">
</div>

<div class="container" id="presentation3">
	<div class="sloganDescription">
		<div class="sloganDescriptionInnerContainer">
			<p class="sloganDescriptionP" style="text-align:left"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsHaut.png"></p>
			<p class="sloganDescriptionP">Don't ever be surprised anymore when reveiving your elecrticity and water bills,
																		be aware of your consumption in real time and don't ever waste energy !</p>
			<p class="sloganDescriptionP" style="text-align:right"><img class="sloganDescriptionGuillemet"src="http://puaud.eu/appmvc/img/guillemetsBas.png"></p>
		</div>
	</div>
	<p class = "slogan zoomAnimation" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Get full control on your energy</p>
	<img class ="imgBackground" src="http://puaud.eu/appmvc/img/presentation3.jpg">
</div>