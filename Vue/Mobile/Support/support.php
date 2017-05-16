<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/app/Styles/support.css" />
        <title>FAQ</title>
    </head>
    <body>
      <!--<p class="FAQ" style="position: relative; position: fixed; margin-top:150px; border: solid;">FAQ</p>
    	<!--<p style="position: relative; margin-top: 50px; margin-left: 50px;"><b>Comment je fais pour me connecter ?</b></p>-->
    	<!--<p class="reponse" style="position: relative;margin-top: 200px; margin-left: 280px; margin-right: 200px; position: fixed;">--><b class="question slogan" style="cursor: pointer; bottom: 530px;  position: fixed; " onclick="displayDescriptionNum(this, 0)">Comment créer un compte smartlife ?</b>
    	<b class="question slogan" style="cursor: pointer; bottom: 450px; position: fixed; " onclick="displayDescriptionNum(this, 1)">Comment puis-je me connecter à mon compte ?</b>
    	<!--<b class="question slogan" style="cursor: pointer; bottom: 450px; position: fixed;" onclick="displayDescriptionNum(this, 2)">Comment je fais pour changer de langue ? </b>-->
    	<b class="question slogan" style="cursor: pointer; bottom: 370px; position: fixed;" onclick="displayDescriptionNum(this, 2)">Comment modifier mes informations personnelles ?  </b>
    	<b class="question slogan" style="cursor: pointer; bottom : 290px; position: fixed;" onclick="displayDescriptionNum(this, 3)">Comment ajouter une maison à mon compte ?</b>
    	<b class="question slogan" style="cursor: pointer; bottom: 210px; position: fixed;" onclick="displayDescriptionNum(this, 4)"> Comment configurer une pièce à ma maison ?</b>
    	<b class="question slogan" style="cursor: pointer; bottom: 130px; position: fixed;" onclick="displayDescriptionNum(this, 5)"> Comment configurer un capteur à une pièce ?  </b>

    	<div class="sloganDescription">
    			<!--<div id="closeForm" onclick="hideDescriptionNum(this, 1)"></div>-->
				<p class="sloganDescriptionP" style="margin-top: 300px; padding-top: 0px; position: fixed;" id="closeForm"  > <img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this)"/>  Cliquez sur la rubrique « Espace personnel » puis cliquez sur « se créer un compte ».<br/> Ensuite, veuillez remplir les informations nécessaires.<br/> Pour terminer votre inscription, cliquez sur « s’enregistrer ».<br/> Vous allez recevoir un	mail de confirmation qu’il faudra ouvrir pour finaliser votre inscription.</p>
		</div>
		<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 380px; position: fixed; padding-top: 0px" id="closeForm" ><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this)"/>Cliquez sur la rubrique « Espace personnel » puis entrez <br/>votre identifiant et votre mot de passe. Ensuite cliquez sur « Entrer ».</p>
		</div>
		<!--<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 25%; position: fixed;">Utilisez les drapeaux situés en haut à droite de l’écran de votre ordinateur ou smartphone, pour choisir votre langue.</p>
		</div>-->
		<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 450px; position: fixed;" id="closeForm" ><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 1)"/>   Cliquez sur la rubrique « Espace personnel », puis cliquez  sur « paramètres ».<br/> Vous trouverez toutes vos informations personnelles et vous pourrez les modifier à votre guise.</p>
		</div>
		<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 530px; position: fixed;" id="closeForm" ><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 1)" />Cliquez sur la rubrique « Espace personnel », puis vous pouvez directement <br/>ajouter une maison en cliquant sur la rubrique « ajouter une maison ». Vous êtes ensuite <br/>redirigés sur la page de votre nouvelle maison et vous pouvez compléter les informations demandées.</p>
		</div>
		<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 380px; position: fixed;" id="closeForm"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px"  onclick="hideDescriptionNum(this, 1)" /> Cliquez sur la rubrique « Espace personnel », puis cliquez sur « Ma maison ».<br/> Vous êtes ensuite redirigés vers la page de votre maison où vous pouvez voir<br/> l’ensemble de vos pièces. Cliquez maintenant sur la rubrique « Ajouter une pièce ».</p>
		</div>
		<div class="sloganDescription">
				<p class="sloganDescriptionP" style="margin-top: 400px; position: fixed;" id="closeForm" ><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 1)" />  Cliquez sur la rubrique « Espace personnel », cliquez ensuite sur la pièce <br/>ou le lieu dans lequel vous voulez ajouter un capteur. Une fois sur cette page vous avez<br/> la possibilité d’ajouter un capteur grâce au menu déroulant.</p>
		</div>




    	<?php include ("http://puaud.eu/app/Vue/Desktop/Support/header.php") ?>

  		<div>


      	<p class = "slogan" style="cursor: pointer;position: fixed;"><b>NOUS CONTACTER</b></p>


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

  			slogan.parentNode.parentNode.getElementsByClassName('sloganDescriptionP')[0].style.display="none";

  		}

  		function displayDescriptionNum(slogan, num)
  		{
  		  document.getElementsByClassName('sloganDescriptionP')[num].style.display="table";
  		  document.getElementsByClassName('sloganDescription')[num].style.display="table";

  		}
      </script>
</html>
