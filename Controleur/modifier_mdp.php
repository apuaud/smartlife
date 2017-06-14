<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienMotDePasse']) AND isset($_POST['nouveauMotDePasse']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$newPassword = $_POST['nouveauMotDePasse'];
	$mdpInsere = sha1($_POST['ancienMotDePasse']);

	$mdpBDD = verifierMDPactuel($idUtilisateur, $dbh);

	if($mdpBDD == $mdpInsere)
	{
		modifierMDP($idUtilisateur, $newPassword, $dbh);
		echo "<script>alert('Votre mot de passe a bien été modifié.');
		document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre';</script>";
	}
	else
	{
		echo "<script>alert('Le mot de passe actuel est incorrect.');
		history.back();</script>";
	}
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
