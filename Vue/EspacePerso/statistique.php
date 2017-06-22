<?php
session_start();
include("../pChart/class/pDraw.class.php");
include("../pChart/class/pImage.class.php");
include("../pChart/class/pData.class.php");
include('../db_connect.php');
include('../Modele/modele.php');
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
		height: 60%;
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
<body style="overflow:scroll;">

<?php

$reponse = $dbh->query('SELECT statistique.etat,statistique.time
FROM statistique
WHERE statistique.id_capteur=\'' . $_GET['idCapteur'] . '\'');

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
?>

<div class=op>
<h2 class="titre1">Graphique</h2>
</div>

<?php

$reponse = $dbh->query('SELECT piece.nom AS piece , logement.nom AS logement, type_appareil.nom AS type_appareil
FROM piece, logement, type_appareil, capteur
WHERE capteur.id=\'' . $_GET['idCapteur'] . '\'
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

?>
<img src='basic.png' alt="Graphique" class="graphique" />

<div class=op>
<h2 class="titre1">Données brutes</h2>
</div>

<table class='table1' border=1>
	<tr>
		<td><strong>Date</strong></td>
		<td><strong>Etat</strong></td>
	</tr>
<?php echo $texte . "<br />" ?>
</table>



</body>
</html>
