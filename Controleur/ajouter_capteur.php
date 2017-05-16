<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');
include("../analyticstracking.php");
$device = $_GET['device'];

if(isset($_POST['typecapteur']) AND isset($_POST['numeroserie']))
{
	$typecapteur = htmlspecialchars($_POST["typecapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);

	ajouterCapteur($typecapteur,$numeroserie,$_GET['piece'],$dbh);
}
else
{
	echo "<script>alert("Erreur dans le remplissage du formulaire");
          document.location.href='http://localhost:8888/SmartLife/Vue/" . $device . "/EspacePerso/account.php';</script>";
}
