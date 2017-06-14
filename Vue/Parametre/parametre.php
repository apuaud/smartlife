<?php
session_start();
include('../db_connect.php');
if(!isset($_SESSION['id']) || $_SESSION['type']==0)
  {
    echo "<script> document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notConnected';</script>";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleParametre.css" />
        <title>Paramètre</title>
    </head>
    <body class=parametreBody>
      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=ajouterCompteSecondaire" method="post">
              <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="lastName" placeholder="Prénom"></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="firstName" placeholder="Nom"></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="id" placeholder="Pseudo"></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="pw" placeholder="Mot de passe"></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="pw2" placeholder="Confirmer MDP"></td>
                </tr>
                <tr>
                  <td>Lecture  <input required type="radio" name="type" value=3></td>
                </tr>
                <tr>
                  <td>Edition  <input required type="radio" name="type" value=4></td>
                </tr>
                <tr>
                  <td><button class="buttonsubmit" type="submit"> Valider </button></td>
                </tr>
              </table>
            </form>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=modifierPseudo" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="ancienPseudo" placeholder="Ancien pseudo">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="nouveauPseudo" placeholder="Nouveau pseudo">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="confirmerPseudo" placeholder="Confirmer pseudo">
                  </td>
                </tr>
                <tr>
                  <td><button class="buttonsubmit" type="submit"> Valider </button>
                  </td>
                </tr>
              </table>
            </form>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=modifierMDP" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="ancienMotDePasse" placeholder="Ancien mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="nouveauMotDePasse" placeholder="Nouveau mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="confirmerMotDePasse" placeholder="Confirmer votre mdp">
                  </td>
                </td>
                <tr>
                  <td>
                     <button class="buttonsubmit" type="submit"> Valider </button>
                  </td>
                </tr>
              </table>
            </form>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=supprimerMaison" method="post">
               <table class="tableForm" align="center">
                 <tr>
                   <td>
                     <SELECT name="idMaison">
                         <?php
                             $reponse = $dbh->query('SELECT logement_id, user_id, logement.id, nom
                                 FROM users_logement, logement
                                 WHERE user_id = \''.$_SESSION['id'] .'\'
                                 AND logement_id=logement.id');

                             while($donnees = $reponse->fetch())
                             {
                                 echo "<OPTION value=" . $donnees['logement_id']. ">" . $donnees['nom'];
                             }
                             $reponse->closeCursor();
                         ?>
                    </SELECT>
                  </td>
                </tr>
                <tr>
                  <td>
                     <button class="buttonsubmit" type="submit"> Supprimer </button>
                  </td>
                </tr>

              </table>
            </form>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="suppression.php" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td>
                    <div style="color:red"> Toute suppression est définitive</div>
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="motDePasse" placeholder="Mot de passe actuel"></td>
                </tr>
                <tr>
                  <td>
                     <button class="buttonsubmit"> Valider </button>
                  </td>
                </tr>
              </table>
            </form>
        </div>
      </div>
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
  		} ?>
    	<h1>
    		Paramètres
    	</h1>
    <div class="divHori">
    	<button class="compte" onclick="displayForm(0)"> Ajouter un compte secondaire </button>
    </div>

    <div class="divHori">
      <button class="compte" onclick="displayForm(1)"> Modifier mon pseudo </button>
    </div>
    <div class="divHori">
      <button class="compte" onclick="displayForm(2)"> Modifier mon mot de passe </button>
    </div>

    <div class="divHori">
      <button class="compte" onclick="displayForm(3)"> Supprimer une maison</button>
    </div>

    <div class="divHori">
      <button class="compte" onclick="displayForm(4)"> Supprimer mon compte </button>
    </div>

    </body>
    <script>
      var forms = document.getElementsByClassName('sloganDescription');

      function hideForms()
      {
        for (var form = 0 ; form < forms.length ; form++)
        {
          forms[form].style.display="none";
        }
      }

      function displayForm(num)
      {
        forms[num].style.display="table";
      }
    </script>
</html>
