<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/support.css" />
        <title>FAQ</title>
    </head>
    <body>
      <b class="question slogan" style="bottom: 530px;" onclick="displayDescriptionNum(this, 0)">Comment créer un compte smartlife ?</b>
    	<b class="question slogan" style="bottom: 450px;" onclick="displayDescriptionNum(this, 1)">Comment me connecter à mon compte ?</b>
    	<b class="question slogan" style="bottom: 370px;" onclick="displayDescriptionNum(this, 2)">Comment modifier mes informations personnelles ?  </b>
    	<b class="question slogan" style="bottom: 290px;" onclick="displayDescriptionNum(this, 3)">Comment ajouter une maison à mon compte ?</b>
    	<b class="question slogan" style="bottom: 210px;" onclick="displayDescriptionNum(this, 4)"> Comment configurer une pièce à ma maison ?</b>
    	<b class="question slogan" style="bottom: 130px;" onclick="displayDescriptionNum(this, 5)"> Comment configurer un capteur à une pièce ?  </b>


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









    	<?php include ("../Vue/Support/header.php") ?>

  		<div style="margin:0;padding:0;cursor:pointer;">
      	<p class = "slogan"><b>NOUS CONTACTER</b></p>
  		</div>


      </body>

  		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
  		</script>
  		<script type="text/javascript" src="firstPage.js"></script>
      <script type="text/javascript">
      	var contactDiv = document.getElementsByClassName('contactDiv')[0];
      	var slogans = document.getElementsByClassName('slogan');

      	function stopSlogansAnimations()
  		{
  		  for (var slogan = 0 ; slogan < slogans.length ; slogan++)
  		  {
  		    slogans[slogan].style.animation="none";
  		  }
  		}

  		slogans[0].addEventListener("click", function(){displayContactDiv()});

  		function displayContactDiv()
  		{
  			contactDiv.style.display = "block";
  		}

  		function hideDescriptionNum(slogan, num)
  		{
  			slogan.parentNode.parentNode.parentNode.style.display="none";
  		}

  		function displayDescriptionNum(slogan, num)
  		{
  		  document.getElementsByClassName('sloganDescription')[num].style.display="table";

  		}
      </script>
</html>
