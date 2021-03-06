<?php
session_start();
include("../pChart/class/pDraw.class.php");
include("../pChart/class/pImage.class.php");
include("../pChart/class/pData.class.php");

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../Styles/styleespaceperso.css"/>
	<link rel="stylesheet" href="../Styles/StyleAdmin.css" />
	<title>Statistiques</title>
	<style>
	.graphique
	{
		width: 60%;
		margin-left: 20%;
	}
	</style>
</head>
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
			echo "<script> document.location.href='../Controleur/action.php?action=error&error=notConnected';</script>";
		}

		include_once("../analyticstracking.php"); ?>
<body onload="resizeDiv(); listenToSelect()">
	<div class="noOverflow spaceForNavBar">
<?php
	if(isset($_POST['idCapteur']) || isset($_GET['idCapteur']))
	{
		$idCapteur = (isset($_POST['idCapteur'])) ? $_POST['idCapteur'] : $_GET['idCapteur'];
		$reponse = $dbh->query('SELECT statistique.etat,statistique.time
		FROM statistique
		WHERE statistique.id_capteur=\'' . $idCapteur . '\'');

		$a1 = array();
		$a2 = array();
		$i = 10;
		$texte = "";
		while($donnees = $reponse -> fetch())
		{
			array_push($a1, $donnees['etat']);
			if($i%10 == 0)
			{
				array_push($a2, $donnees['time']);
			}
			else
			{
				array_push($a2, VOID);
			}
			$texte = $texte . "<tr>
				<td>". $donnees['time'] ."</td>
				<td>". $donnees['etat'] . "</td>";
			$i = $i+1;
		}
		echo"
			<div class='slogan'>Graphique</div>
		";

		$reponse = $dbh->query('SELECT piece.nom AS piece , logement.nom AS logement, type_appareil.nom AS type_appareil
		FROM piece, logement, type_appareil, capteur
		WHERE capteur.id=\'' . $idCapteur . '\'
		AND capteur.id_type_appareil = type_appareil.id
		AND capteur.id_piece = piece.id
		AND piece.id_logement = logement.id');

		while($donnees = $reponse -> fetch())
		{
			$piece = $donnees['piece'];
			$logement = $donnees['logement'];
			$type_appareil = $donnees['type_appareil'];
		}

		$myData = new pData();
		$myData->addPoints($a1,'Valeur');
		$myData->setAxisName(0,"Valeur relevée");
		$myData->addPoints($a2,'Labels');
		$myData->setSerieDescription("Labels","Date");
		$myData->setAbscissa("Labels");
		$myPicture = new pImage(1200,750,$myData);
		$myPicture->setFontProperties(array("FontName"=>"../fonts/CenturyGothic.ttf","FontSize"=>11));
		$myPicture->setGraphArea(70,70,1150,700);
		$myPicture->drawText(630,35,$logement . " - " . $piece,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
		$myPicture->drawText(630,70,"Statistiques du capteur " . $type_appareil,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
		$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>100));
		$ScaleSettings  = array("Mode"=>SCALE_MODE_MANUAL,"ManualScale"=>$AxisBoundaries,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		$myPicture->drawScale($ScaleSettings);
		$myPicture->drawSplineChart();
		$myPicture->Render("basic.png");

		echo"
		<img src='basic.png' alt='Graphique' class='graphique' />

		<div class='slogan'>Données brutes</div>
		<table class='table1' border=1>
			<tr>
				<td><strong>Date</strong></td>
				<td><strong>Etat</strong></td>
			</tr>
		" . $texte . "<br />
		</table>
		";
	}
	else {

		echo"
		      <form action='action.php?action=goToStatistiques&focus1=itemEspacePerso&focus2=logoStats' method='post'>
		         <table class='tableForm' align='center'>
		           <tr>
		             <td>
		               <SELECT name='idMaison' id='selectMaison'>
		                      <option value=''>Sélectionner maison</option>";
		                       $reponse = getHomesOfUser($dbh, $_SESSION['id']);

		                       while($donnees = $reponse->fetch())
		                       {
		                          $selected = (isset($_GET['idMaison']) && ($_GET['idMaison'] == $donnees['id_logement'])) ? 'selected' : '';
		                          echo '<OPTION ' .$selected . ' value=' . $donnees['id_logement']. '>' . $donnees['nom'];
		                       }
		                       $reponse->closeCursor();

		              echo"</SELECT>
		            </td>
		          </tr>
		           <tr>
		             <td>
		               <SELECT name='idPiece' id='selectPiece'>
		                        <option value=''>Sélectionner pièce</option>";
		                        if(isset($_GET['idMaison']))
		                        {
		                          $reponse = getRoomsOfHome($dbh, $_GET['idMaison']);
		                          while($donnees = $reponse->fetch())
		                          {
		                            $selected = (isset($_GET['idPiece']) && ($_GET['idPiece'] == $donnees['id'])) ? 'selected' : '';
		                              echo '<OPTION ' . $selected . ' value=' . $donnees['id']. '> '.$donnees['nom'];
		                          }
		                          $reponse->closeCursor();
		                        }

		               echo"</SELECT>
		            </td>
		          </tr>
		          <tr>
		            <td>
		              <SELECT name='idCapteur' id='selectCapteur'>
		                        <option value=''>Sélectionner capteur</option>";
		                        if(isset($_GET['idPiece']))
		                        {
		                          $reponse = recupererCapteurDunePiece($_GET['idPiece'],$dbh);
		                          while($donnees = $reponse->fetch())
		                          {
		                              echo '<OPTION value=' . $donnees['id']. '> '.$donnees['nom'];
		                          }
		                          $reponse->closeCursor();
		                        }
		            echo"</td>
		          </tr>
		          <tr>
		            <td>
		               <button class='buttonsubmit' type='submit'> Afficher les statistiques </button>
		            </td>
		          </tr>
		        </table>
		      </form>
		 ";
	}
?>
	</div>
</body>
<script>
  function resizeDiv()
  {
    var heightOfWindow = $(window).height();
    var marginTop = 200;
    var noOverflow = document.getElementsByClassName('noOverflow')[0];
    noOverflow.style.height = (heightOfWindow-marginTop)+"px";
  }

	function listenToSelect()
	{
		var val;
		$(document).ready(function () {
			$("#selectMaison").change(function () {
					val = $(this).val();
					document.location.href="action.php?action=goToStatistiques&focus1=itemEspacePerso&focus2=logoStats&idMaison=" + val;
			});
	});
		$(document).ready(function () {
			$("#selectPiece").change(function () {
					val = $("#selectMaison").val();
					var val2 = $(this).val();
					document.location.href="action.php?action=goToStatistiques&focus1=itemEspacePerso&focus2=logoStats&idMaison=" + val + "&idPiece=" + val2;
			});
	});
	}

</script>
</html>
