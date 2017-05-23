<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');
include("../analyticstracking.php");

if(isset($_POST['nomcapteur']) AND isset($_POST['numeroserie']))
{
	$nomcapteur = htmlspecialchars($_POST["nomcapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);



	if($typeinput == 0)
	{
		ajouterCapteur($typeinput,$numeroserie,$_GET['piece'],$dbh);
	}
	else
	{
		ajouterEffecteur($typeinput,$numeroserie,$_GET['piece'],$dbh);
	}
}
else
{
	echo "<script>alert('Erreur dans le remplissage du formulaire');
          document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php';</script>";
}