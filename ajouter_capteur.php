<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include_once("$doc_root/app/analyticstracking.php");

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
