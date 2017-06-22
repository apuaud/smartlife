<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

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
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body class=parametreBody onload="listenToSelect()">
    	<p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideForms()"/>
            <form action="action.php?action=goToStatistiques" method="post">
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
                                	$selected = (isset($_GET['idPiece']) && ($_GET['idPiece'] == $donnees['id'])) ? "selected" : "";
                                    echo "<OPTION " . $selected . " value=" . $donnees['id']. "> ".$donnees['nom'];
                                }
                                $reponse->closeCursor();
                              }
                         ?>
                     </SELECT>
                  </td>
                </tr>
                <tr>
                  <td>Capteur</td>
                </tr>
                <tr>
                	<td>
                		<SELECT name="idCapteur" id="selectCapteur">
                         <?php
                              echo "<option value=''>Sélectionner capteur</option>";
                              if(isset($_GET['idPiece']))
                              {
                                $reponse = recupererCapteurDunePiece($_GET['idPiece'],$dbh);
                                while($donnees = $reponse->fetch())
                                {
                                    echo "<OPTION value=" . $donnees['id']. "> ".$donnees['nom'];
                                }
                                $reponse->closeCursor();
                              }
                         ?>
                	</td>
                </tr>
                <tr>
                  <td>
                     <button class="buttonsubmit" type="submit"> Afficher les statistiques </button>
                  </td>
                </tr>
              </table>
            </form>
        </div>
      </div>
	<script>

      function listenToSelect()
      {
      	var val;
        $(document).ready(function () {
          $("#selectMaison").change(function () {
              val = $(this).val();
              document.location.href="action.php?action=goToAccueilStatistiques&focus1=itemEspacePerso&focus2=logoReglages&idMaison=" + val;
          });
      });
        $(document).ready(function () {
          $("#selectPiece").change(function () {
          	  val = $("#selectMaison").val();
              var val2 = $(this).val();
              document.location.href="action.php?action=goToAccueilStatistiques&focus1=itemEspacePerso&focus2=logoReglages&idMaison=" + val + "&idPiece=" + val2;
          });
      });
      }

    </script>