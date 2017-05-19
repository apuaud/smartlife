<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAccount.css" />
        <title>Ajout d'un capteur</title>
    </head>

    <?php
    if(isset($_SESSION['id']))
    {
      if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
      {
        include("../Vue/EspacePerso/TestHeader.php");
      }
      else if($_SESSION['type']==2)
      {
        include("../Vue/EspacePerso/HeaderAdmin.php");
      }
    }
    if(!isset($_SESSION['id']) || $_SESSION['type']==0)
    {
      header("Location:http://puaud.eu/appmvc/Vue/Error/error.php?error=notConnected");
    }
    include("../../analyticstracking.php"); ?>
    <body class="guillaumebody">
    <h1> Ajouter un nouveau capteur </h1>
    <form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutCapteur" method="post" onsubmit="return verifyInputs();">
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
		<input required class="zonetexte"type="text" name="numeroserie" placeholder="Numéro de série" size=70/>
		</p>
		<button class="valider" type="submit"> Valider </button>
    </form>
	</body>
  <script type="text/javascript" src="http://puaud.eu/appmvc/Vue/EspacePerso/checkInputsFields.js"></script>

</html>
