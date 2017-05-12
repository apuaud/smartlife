<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Styles/StyleAccount.css" />
        <title>Ajout d'un capteur</title>
    </head>

    <?php include("TestHeader.php");
    include_once("analyticstracking.php"); ?>
    <body class="guillaumebody">
    <h1> Ajouter un nouveau capteur </h1>
    <form action="ajouter_capteur.php" method="post">
		<p class = "Formulaire">
		<SELECT name="typecapteur">
            <?php
                $reponse = $dbh->query('SELECT ALL nom,numeroModele
                    FROM type_appareil');
                while($donnees = $reponse->fetch())
                {
                    echo "<OPTION value=" . $donnees['numeroModele']. ">" . $donnees['nom'] . " (" . $donnees['numeroModele'] . ")";
                } 
                $reponse->closeCursor();
            ?>
        </SELECT>
		</p>
		<p class = "Formulaire">
		<input class="zonetexte"type="text" name="numeroserie" placeholder="Numéro de série" size=70/>
		</p>	
		<button class="valider" type="submit"> Valider </button>
    </form>
	</body>
    </body>
</html>