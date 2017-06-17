<?php
session_start();
require_once("../../phpChart/conf.php"); // this must be include in every page that uses phpChart.
include("../../pChart/class/pDraw.class.php");
include("../../pChart/class/pImage.class.php");
include("../../pChart/class/pData.class.php");
include('../../db_connect.php');
include('../../Modele/modele.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/styleespaceperso.css"/>
	<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAdmin.css" />
	<title>Statistiques</title>
	<style>
	#__chart1
	{
		margin-left: 25%;
	}
	</style>
</head>
<?php

		if(isset($_SESSION['id']))
		{
			if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
			{
				include("TestHeader.php");
			}
			else if($_SESSION['type']==2)
			{

				include("HeaderAdmin.php");
			}
		}

		if(!isset($_SESSION['id']) || $_SESSION['type']==0)
		{
			echo "<script> document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notConnected';</script>";
		}

		include_once("../../analyticstracking.php"); ?>
<body style="background-image:url('http://puaud.eu/appmvc/img/admin.jpeg')">
    
<div class=op>
<h2 class="titre1">Données brutes</h2>
</div>

<table class='table1' border=1>
	<tr>
		<td><strong>Date</strong></td>
		<td><strong>Etat</strong></td>
	</tr>

<?php

$reponse = $dbh->query('SELECT statistique.etat,statistique.time
FROM statistique
WHERE statistique.id_capteur=\'' . $_GET['idCapteur'] . '\'');

$a1 = array();

while($donnees = $reponse -> fetch())
{
	array_push($a1, $donnees['etat']);
	echo "<tr>
		<td>". $donnees['time'] ."</td>
		<td>". $donnees['etat'] . "</td>";
}
?>
</table>


<div class=op>
<h2 class="titre1">Graphique</h2>
</div>

<?php
/*
$myData = new pData(); 
$myData->addPoints($a1);
$myPicture = new pImage(700,450,$myData);
$myPicture->setFontProperties(array("FontName"=>"../../fonts/CenturyGothic.ttf","FontSize"=>11));
$myPicture->setGraphArea(60,40,670,190);
$myPicture->drawScale();
$myPicture->drawSplineChart();
$myPicture->Render("basic.png");
*/

$pc = new C_PhpChartX(array($a1),'basic_chart');
$pc->set_title(array('text'=>'Statistiques du capteur'));
$pc->set_animate(true);
$pc->draw();
?>

</body>
</html>