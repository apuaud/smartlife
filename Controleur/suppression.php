<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if(isset($_POST['motDePasse']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$mdpInsere = sha1($_POST['motDePasse']);
	$mdpBDD = verifierMDPactuel($idUtilisateur, $dbh);

	if($mdpBDD == $mdpInsere)
	{
		supprimer($idUtilisateur, $dbh);
		echo "<script>alert('Votre compte a été supprimé. Au revoir !');
		document.location.href='http://puaud.eu/appmvc';</script>";
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
?>