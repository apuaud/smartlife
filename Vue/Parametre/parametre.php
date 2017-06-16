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
        <title>Paramètres</title>
    </head>
    <body class=parametreBody onload="setFontSize();listenToSelect()" onresize="setFontSize()">
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
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=modifierEmail" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="ancienEmail" placeholder="Ancien email">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="nouveauEmail" placeholder="Nouvel email">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="confirmerEmail" placeholder="Confirmer email">
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
                             $reponse = $dbh->query('SELECT users_logement.id_logement, users_logement.id_user, logement.id, logement.nom
                                 FROM users_logement, logement
                                 WHERE id_user = \''.$_SESSION['id'] .'\'
                                 AND users_logement.id_logement=logement.id');

                             while($donnees = $reponse->fetch())
                             {
                                 echo "<OPTION value=" . $donnees['id_logement']. ">" . $donnees['nom'];
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
            <form action="http://puaud.eu/appmvc/Controleur/action.php?action=supprimerPiece" method="post">
               <table class="tableForm" align="center">
                 <tr>
                   <td>Maison</td>
                 </tr>
                 <tr>
                   <td>
                     <SELECT name="idMaison" id="selectMaison">
                         <?php

                             $reponse = $dbh->query('SELECT users_logement.id_logement, users_logement.id_user, logement.id, logement.nom
                                 FROM users_logement, logement
                                 WHERE id_user = \''.$_SESSION['id'] .'\'
                                 AND users_logement.id_logement=logement.id');

                             while($donnees = $reponse->fetch())
                             {

                                  $selected = (isset($_GET['idMaison']) && ($_GET['idMaison'] == $donnees['id_logement'])) ? "selected" : "";

                                 echo "<OPTION " .$selected . " value=" . $donnees['id_logement']. ">" . $donnees['nom'];
                             }
                             $reponse->closeCursor();
                         ?>
                    </SELECT>
                  </td>
                </tr>
                <tr>
                  <td>Pièce</td>
                </tr>
                 <tr>
                   <td>
                     <SELECT name="idPiece" id="selectPiece">
                         <?php
                              echo "<option value=''>Sélectionner pièce</option>";
                              if(isset($_GET['idMaison']))
                              {
                                $reponse = $dbh->query(
                                  'SELECT piece.id , piece.nom
                                   FROM piece
                                   WHERE piece.id_logement=\''. $_GET['idMaison'] .'\''); // AS=> mettre un nom de variable différent pour chaque champ. Car deux on le même nom (id)
                                while($donnees = $reponse->fetch())
                                {
                                    echo "<OPTION value=" . $donnees['id']. "> ".$donnees['nom'];
                                }
                                $reponse->closeCursor();
                              }
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


    <b class="question slogan" onclick="displayForm(0)">Ajouter un compte secondaire</b>
    <b class="question slogan" onclick="displayForm(1)">Modifier mon pseudo</b>
    <b class="question slogan" onclick="displayForm(2)">Modifier mon email</b>
    <b class="question slogan" onclick="displayForm(3)">Modifier mon mot de passe</b>
    <b class="question slogan" onclick="displayForm(4)">Supprimer une maison</b>
    <b class="question slogan" onclick="displayForm(5)">Supprimer une pièce</b>
    <b class="question slogan" onclick="displayForm(6)">Supprimer son compte</b>

    </body>
    <script>
      var forms = document.getElementsByClassName('sloganDescription');
      var questions = document.getElementsByClassName('question');
      var questionBottomSpace = 50;
      var spaceBetweenQuestions = 80;
      var spaceBetweenHeaderAndFooter = $(window).height()-66-80-40-50;
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

      function setFontSize()
      {
        for(var questionNum = questions.length-1 ; questionNum >= 0  ; questionNum--)
        {
          questions[questionNum].style.bottom = questionBottomSpace +"px";
          questionBottomSpace+=spaceBetweenQuestions;
        }
      }

      function listenToSelect()
      {
        $(document).ready(function () {
          $("#selectMaison").change(function () {
              var val = $(this).val();
              document.location.href="http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre&idMaison=" + val;
            });
          });
      }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php
    if(isset($_GET['idMaison']))
    {
      echo"<script>displayForm(5)</script>";
    }
    ?>
</html>
