<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['type']==0)
{
  echo "<script> document.location.href='action.php?action=error&error=notConnected';</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Styles/StyleParametre.css" />
        <title>Paramètres</title>
    </head>
    <body class=parametreBody onload="setFontSize();listenToSelect()" onresize="setFontSize()">
      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=ajouterCompteSecondaire" method="post">
              <table class="tableForm" align="center" style="margin-top:100px;">
                <?php
                $compteAssocie = recupererCompteSecondaireAssocie($_SESSION['id'],$dbh);
                $listeCompte = array();
                $listeNom = array();
                $listePrenom = array();
                $listeID = array();
                while($donnees = $compteAssocie -> fetch())
                {
                  array_push($listeCompte, $donnees['pseudo']);
                  array_push($listeNom, $donnees['prenom']);
                  array_push($listePrenom, $donnees['nom']);
                  array_push($listeID, $donnees['id']);
                }
               ?>
                <tr>
                  <td>
                    <div style="color:red;font-size:12px;">* Tous les champs sont obligatoires</div>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="email" placeholder="Email"></td>
                  <td><span>Comptes secondaires actuels :</span></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="lastName" placeholder="Prénom"></td>
                  <td><?php if(isset($listeCompte[0])){echo $listeCompte[0] . " (" . $listePrenom[0] . " " . $listeNom[0] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[0]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="firstName" placeholder="Nom"></td>
                  <td><?php if(isset($listeCompte[1])){echo $listeCompte[1] . " (" . $listePrenom[1] . " " . $listeNom[1] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[1]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><input required  type="text" name="id" placeholder="Pseudo"></td>
                  <td><?php if(isset($listeCompte[2])){echo $listeCompte[2] . " (" . $listePrenom[2] . " " . $listeNom[2] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[2]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><input required  type="password" name="pw" placeholder="Mot de passe"></td>
                  <td><?php if(isset($listeCompte[3])){echo $listeCompte[3] . " (" . $listePrenom[3] . " " . $listeNom[3] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[3]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><input required  type="password" name="pw2" placeholder="Confirmer MDP"></td>
                  <td><?php if(isset($listeCompte[4])){echo $listeCompte[4] . " (" . $listePrenom[4] . " " . $listeNom[4] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[4]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><label style="font-family: CenturyGothic,serif;">Lecture </label><input required type="radio" name="type" value=4></td>
                  <td><?php if(isset($listeCompte[5])){echo $listeCompte[5] . " (" . $listePrenom[5] . " " . $listeNom[5] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[5]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
                </tr>
                <tr>
                  <td><label style="font-family: CenturyGothic,serif;">Edition </label><input required type="radio" name="type" value=3></td>
                  <td><?php if(isset($listeCompte[6])){echo $listeCompte[6] . " (" . $listePrenom[6] . " " . $listeNom[6] . ")  " . "<a href='action.php?action=supprimerCompteSecondaire&id=".$listeID[6]."'><img src='../img/croix.png'
          alt='Supprimer' width=20px height=auto /></a>";} ?></td>
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=modifierPseudo" method="post">
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=modifierEmail" method="post">
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=modifierMDP" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="password" name="ancienMotDePasse" placeholder="Ancien mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="password" name="nouveauMotDePasse" placeholder="Nouveau mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="password" name="confirmerMotDePasse" placeholder="Confirmer votre mdp">
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=supprimerMaison" method="post">
               <table class="tableForm" align="center">
                 <tr>
                   <td>
                     <SELECT name="idMaison">
                         <?php
                             $reponse = getHomesOfUser($dbh, $_SESSION['id']);
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=supprimerPiece" method="post">
               <table class="tableForm" align="center">
                 <tr>
                   <td>Maison</td>
                 </tr>
                 <tr>
                   <td>
                     <SELECT name="idMaison" id="selectMaison">
                         <?php
                            echo "<option value=''>Sélectionner maison</option>";
                             $reponse = getHomesOfUser($dbh, $_SESSION['id']);

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
                                $reponse = getRoomsOfHome($dbh, $_GET['idMaison']);
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
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="../img/whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=supprimerComptePrincipale" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td>
                    <div style="color:red"> Toute suppression est définitive</div>
                  </td>
                </tr>
                <tr>
                  <td><input required  type="password" name="motDePasse" placeholder="Mot de passe actuel"></td>
                </tr>
                <tr>
                  <td>
                     <button class="buttonsubmit"> Supprimer </button>
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
  				include("../Vue/Header/headerUser.php");
  			}
  			else if($_SESSION['type']==2)
  			{
  				include("../Vue/Header/headerAdmin.php");
  			}
  		}
  		if(!isset($_SESSION['id']) || $_SESSION['type']==0)
  		{
  			header("Location:../Vue/Error/error.php?error=notConnected");
  		} ?>

    <?php
    if(!isset($_SESSION['comptePrincipal']))
    {
      echo '<b class="question slogan" onclick="displayForm(0)">Gérer les comptes secondaires</b>';
    }
     ?>
    <b class="question slogan" onclick="displayForm(1)">Modifier mon pseudo</b>
    <b class="question slogan" onclick="displayForm(2)">Modifier mon email</b>
    <b class="question slogan" onclick="displayForm(3)">Modifier mon mot de passe</b>
    <b class="question slogan" onclick="displayForm(4)">Supprimer une maison</b>
    <b class="question slogan" onclick="displayForm(5)">Supprimer une pièce</b>
    <b class="question slogan" onclick="displayForm(6)">Supprimer mon compte</b>

    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
      var forms = document.getElementsByClassName('sloganDescription');
      var questions = document.getElementsByClassName('question');
      var questionBottomSpace = 10;
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
        questionBottomSpace = 40;
        spaceBetweenHeaderAndFooter = $(window).height()-66-80-questionBottomSpace;
        spaceBetweenQuestions = spaceBetweenHeaderAndFooter/8;
        for(var questionNum = questions.length-1 ; questionNum >= 0  ; questionNum--)
        {
          questions[questionNum].style.fontSize=40*$(window).width()/1440 + "px";
          questions[questionNum].style.bottom = questionBottomSpace +"px";
          questionBottomSpace+=spaceBetweenQuestions;
        }
      }

      function listenToSelect()
      {
        $(document).ready(function () {
          $("#selectMaison").change(function () {
              var val = $(this).val();
              document.location.href="action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&idMaison=" + val;
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
