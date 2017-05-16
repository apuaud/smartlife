<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://localhost:8888/SmartLife/Styles/support.css" />
        <title>FAQ</title>
    </head>
    <body>
    	<p class="FAQ" style="position: relative; position: fixed; margin-top:150px; border: solid;">FAQ</p>
    	<!--<p style="position: relative; margin-top: 50px; margin-left: 50px;"><b>Comment je fais pour me connecter ?</b></p>-->
    	<!--<p class="reponse" style="position: relative;margin-top: 200px; margin-left: 280px; margin-right: 200px; position: fixed;">--><b class="question slogan" style="cursor: pointer; bottom: 580px; margin-right: 100px" onclick="displayDescription(this)">Comment je fais pour créer un compte ?</b>
    	<b class="question slogan" style="cursor: pointer; bottom: 500px;" onmouseover="displayDescription(this)" onmouseout="hideDescription(this)">Comment je fais pour me connecter ?</b><b class="question slogan" style="cursor: pointer; bottom: 420px;">Comment je fais pour changer de langue ? </b><b class="question slogan" style="cursor: pointer; bottom: 340px;">Comment ajouter une maison à mon compte ?</b><b class="question slogan" style="cursor: pointer; bottom: 260px;"> Comment ajouter une pièce à ma maison ?</b><b class="question slogan" style="cursor: pointer; bottom: 180px;"> Comment ajouter un capteur à une pièce ?  </b>
    	<div class="sloganDescription">
    			<div id="closeForm" onclick="hideDescription(this)"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></div>
				<p class="sloganDescriptionP" >Cliquez sur la rubrique « Espace personnel » puis cliquez « se créer un compte ».<br/> Ensuite veuillez remplir les informations nécessaires.<br/> Pour terminer votre inscription, cliquez sur « s’enregistrer ».<br/> Vous allez recevoir un	mail de confirmation qu’il faudra ouvrir pour finaliser votre inscription.</p>
		</div>
		<div class="sloganDescription">
				<p class="sloganDescriptionP">Cliquez sur la rubrique « Espace personnel » puis entrez votre identifiant et votre mot de passe.<br/> Ensuite cliquez sur « Entrer ».</p>
			</div>



    	<?php include ("http://localhost:8888/SmartLife/Vue/Desktop/Support/header.php") ?>

		<div>


    	<p class = "slogan" style="cursor: pointer;position: fixed;">Nous contacter</p>


		</div>


    </body>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="http://localhost:8888/SmartLife/Vue/Desktop/Index/firstPage.js"></script>
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

		function hideDescription(slogan)
		{
			  			alert('yo');

		}
    </script>
</html>
