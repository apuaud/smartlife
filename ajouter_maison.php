<?php
session_start();
include('http://puaud.eu/app/db_connect.php');
include('http://puaud.eu/app/Modele/modele.php');


if(isset($_POST['nom-maison']) AND isset($_POST['adresse']) AND isset($_POST['codepostal']) AND isset($_POST['ville'])
	AND isset($_POST['pays']) AND isset($_POST['superficie']) AND isset($_POST['nbhab']) AND isset($_SESSION['id']))
{
	$maison = htmlspecialchars($_POST["nom-maison"]);
	$adresse = htmlspecialchars($_POST["adresse"]);
	$codepostal = htmlspecialchars($_POST["codepostal"]);
	$ville = htmlspecialchars($_POST["ville"]);
	$pays = htmlspecialchars($_POST["pays"]);
	$superficie = htmlspecialchars($_POST["superficie"]);
	$nbhab = htmlspecialchars($_POST["nbhab"]);

	ajouterMaison($maison,$adresse,$ville,$codepostal,$pays,$superficie,$nbhab,$dbh);

	lienUtilisateurLogement($_SESSION['id']);

	echo "<script>alert('Maison ajoutée !');document.location.href='http://puaud.eu/app/account.php';</script>";
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
