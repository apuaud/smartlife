<?php

if(isset($_SESSION['id']))
{
	$functionCalledOnAccountClick = "callAccount()";
}
else
{
	$functionCalledOnAccountClick ="displayFormulaire()";
} ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/support.css" />
        <title>FAQ</title>
    </head>
    <body onload="onLoadFunction()" onresize="setFontSize()">

			<div id="formulaire">
				<form action="http://puaud.eu/appmvc/Controleur/action.php?action=connexion" method="post">
				<table class="login" align="center">
					<tr>
						<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
					</tr>
					<tr>
						<td id="itemID" ><input required id="idInput" type="text" name="login" placeholder="Pseudo" size="30"/></td>
					</tr>
					<tr>
						<td id="itemPassword"><input required id="passwordInput" type="password" name="motdepasse" placeholder="Mot de passe" size="30" /></td>
					</tr>
					<tr>
						<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
					</tr>
					<tr>
						<td id='itemLostPassword'  align="center"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToOublieMotDePasse" style="color:white" >Mot de passe oublié ?</td>
					</tr>
					</form>
					<tr>
						<td id='itemRegister' style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Inscription</div></td>
					</tr>
				</table>
			</div>

      <b class="question slogan" onclick="displayDescriptionNum(this, 0)">Comment créer un compte smartlife ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 1)">Comment me connecter à mon compte ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 2)">Comment modifier mes informations personnelles ?  </b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 3)">Comment ajouter une maison à mon compte ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 4)"> Comment configurer une pièce à ma maison ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 5)"> Comment configurer un capteur à une pièce ?  </b>


      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 0)"/>
          <p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel » puis cliquez sur « se créer un compte ».<br/> Ensuite, veuillez remplir les informations nécessaires.<br/> Pour terminer votre inscription, cliquez sur « s’enregistrer ». Vous allez recevoir un	mail de confirmation qu’il faudra ouvrir pour finaliser votre inscription.</p>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 1)"/>
          <p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel » puis entrez votre identifiant et votre mot de passe. Ensuite cliquez sur « Entrer ».</p>
        </div>
      </div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 2)"/>
					<p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel », puis cliquez  sur « paramètres ». Vous trouverez toutes vos informations personnelles et vous pourrez les modifier à votre guise.</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 3)"/>
					<p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel », puis vous pouvez directement <br/>ajouter une maison en cliquant sur la rubrique « ajouter une maison ». Vous êtes ensuite <br/>redirigés sur la page de votre nouvelle maison et vous pouvez compléter les informations demandées.</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 4)"/>
					<p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel », puis cliquez sur « Ma maison ». Vous êtes ensuite redirigés vers la page de votre maison où vous pouvez voir l’ensemble de vos pièces. Cliquez maintenant sur la rubrique « Ajouter une pièce ».</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 5)"/>
					<p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel », puis cliquez sur « Ma maison ». Vous êtes ensuite redirigés vers la page de votre maison où vous pouvez voir l’ensemble de vos pièces. Cliquez maintenant sur la rubrique « Ajouter une pièce ».</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 6)"/>
          <form action="http://puaud.eu/appmvc/Controleur/action.php?action=sendMail" method="post">
            <table id="login" align="center">
            	<tr>
            		<td id="itemEmail" class="menuMail"><input required type="text" name="email" placeholder="Votre email" size="41"/></td>
            	</tr>
            	<tr>
            		<td id="itemSubject" class="menuMail"><input required type="text" name="subject" placeholder="Sujet de votre email" size="41"/></td>
            	</tr>
            	<tr>
            		<td id="itemPassword" class="menuMail"><textarea class="textarea"name="message" rows="10" cols="70" placeholder="Ecrivez votre message ici"></textarea></td>
            	</tr>
            	<tr>
                <td id='buttonConnexion'><button class="buttonsubmit" type="submit">Envoyer</button></td>
            	</tr>
            </table>
          </form>
				</div>
			</div>

    	<?php include("../Vue/Support/header.php") ?>

  		<div style="margin:0;padding:0;cursor:pointer;">
      	<p class = "slogan" onclick="displayDescriptionNum(this,6)"><b>Nous contacter</b></p>
  		</div>

      </body>

  		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="http://puaud.eu/appmvc/Vue/Support/support.js"></script>
</html>
