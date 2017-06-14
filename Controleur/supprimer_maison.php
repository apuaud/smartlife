<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['idMaison']))
{
	$idMaison = htmlspecialchars($_POST['idMaison']);

  supprimerMaison($idMaison, $dbh);
	echo "<script>alert('Votre maison a bien été supprimée');
	document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
