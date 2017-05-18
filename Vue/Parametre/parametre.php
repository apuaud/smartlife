<?php
session_start();
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
            <form action="inscription_secondaire.php" method="post">
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
            <form action="inscription_secondaire.php" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="ancien pseudo" placeholder="Ancien pseudo">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="nouveau pseudo" placeholder="Nouveau pseudo">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="confirmer votre pseudo" placeholder="Confirmer pseudo">
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
            <form action="inscription_secondaire.php" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td><input required  type="text" name="ancien mot de passe" placeholder="Ancien mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="aouveau mot de passe" placeholder="Nouveau mot de passe">
                  </td>
                </tr>
                <tr>
                  <td><input required  type="text" name="aonfirmer votre mot de passe" placeholder="Confirmer votre mdp">
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
            <form action="inscription_secondaire.php" method="post">
               <table class="tableForm" align="center">
              </table>
            </form>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="inscription_secondaire.php" method="post">
               <table class="tableForm" align="center">
                <tr>
                  <td>Toute suppression est définitive </button>
                  </td>
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
      <?php include("../../EspacePerso/TestHeader.php") ?>
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
