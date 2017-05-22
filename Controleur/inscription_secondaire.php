<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['id'])
	AND isset($_POST['email']) AND isset($_POST['pw']) AND isset($_POST['type']))
{
	$nom = htmlspecialchars($_POST['firstName']);
	$prenom = htmlspecialchars($_POST['lastName']);
	$pseudo = htmlspecialchars($_POST['id']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['pw'];
	$type = htmlspecialchars($_POST['type']);

	$nbPseudo = verifierDoubleComptePseudo($pseudo,$dbh);

	if($nbPseudo>=1)
	{
		echo "<script>alert('Ce pseudo ne peut pas être utilisé !');history.back();</script>";
		exit;
	}

	$nbEmail = verifierDoubleCompteEmail($email,$dbh);

	if($nbEmail>=1)
	{
		echo "<script>alert('Cet email a déjà un compte associé !');history.back();</script>";
		exit;
	}

	ajouterUtilisateurSecondaire($prenom,$nom,$pseudo,$email,$password,$type,$_SESSION['id'],$dbh);

	envoiMailConfirmationSecondaire($pseudo,$email,$dbh);

	echo "<script>alert('Votre ajout de compte secondaire est désormais en attente, veuillez cliquer sur le mail de confirmation !');
	document.location.href='http://puaud.eu/appmvc/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
