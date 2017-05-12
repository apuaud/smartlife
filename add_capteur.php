<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');
include_once("analyticstracking.php");

if(isset($_POST['typecapteur']) AND isset($_POST['numeroserie']))
{
	$typecapteur = htmlspecialchars($_POST["typecapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);

	ajouterCapteur($typecapteur,$numeroserie,$_GET['piece'],$dbh);
}
else
{
	echo "<script>alert("Erreur dans le remplissage du formulaire");
          document.location.href='http://www.puaud.eu/app/account.php';</script>";
}