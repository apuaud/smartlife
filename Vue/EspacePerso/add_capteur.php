<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAccount.css" />
        <title>Ajout d'un capteur</title>
    </head>

    <?php include("TestHeader.php");
    include("../analyticstracking.php"); ?>
    <body class="guillaumebody">
    <h1> Ajouter un nouveau capteur </h1>
    <form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutCapteur" method="post">
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
		<input class="zonetexte"type="text" name="numeroserie" placeholder="Numéro de série" size=70 required />
		</p>
		<button class="valider" type="submit"> Valider </button>
    </form>
	</body>
    </body>
</html>
