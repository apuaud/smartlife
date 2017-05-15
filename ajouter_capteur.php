<?php
session_start();
include('http://puaud.eu/app/db_connect.php');
include('http://puaud.eu/app/Modele/modele.php');
include_once("http://puaud.eu/app/analyticstracking.php");

if(isset($_POST['typecapteur']) AND isset($_POST['numeroserie']))
{
	$typecapteur = htmlspecialchars($_POST["typecapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);

	ajouterCapteur($typecapteur,$numeroserie,$_GET['piece'],$dbh);
}
else
{
	echo "<script>alert("Erreur dans le remplissage du formulaire");
          document.location.href='http://puaud.eu/app/account.php';</script>";
}
