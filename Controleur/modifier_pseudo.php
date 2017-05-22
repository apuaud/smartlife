<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienPseudo']) AND isset($_POST['nouveauPseudo']))
{
  $idUtilisateur = htmlspecialchars($_SESSION['id']);
	$newPseudo = htmlspecialchars($_POST['nouveauPseudo']);

  modifierPseudo($idUtilisateur, $newPseudo, $dbh);
	echo "<script>alert('Votre nouveau pseudo est bien :  " . $newPseudo . "');
	document.location.href='http://puaud.eu/appmvc/Vue/Parametre/parametre.php';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
