<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');
include("../analyticstracking.php");

if(isset($_POST['nomcapteur']) AND isset($_POST['numeroserie']))
{
	$nomcapteur = htmlspecialchars($_POST["nomcapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);

	ajouterCapteur($nomcapteur,$numeroserie,$_GET['piece'],$dbh);
	echo "<script>document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php'</script>";
}
else
{
	echo "<script>alert('Erreur dans le remplissage du formulaire');
          document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php';</script>";
}