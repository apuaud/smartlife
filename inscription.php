<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['id']) AND isset($_POST['email']) AND isset($_POST['pw']))
{
	$nom = htmlspecialchars($_POST['firstName']);
	$prenom = htmlspecialchars($_POST['lastName']);
	$pseudo = htmlspecialchars($_POST['id']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['pw'];
	$type = 0;

	verifierDoubleCompte($pseudo,$email,$dbh);

	ajouterUtilisateur($prenom,$nom,$pseudo,$email,$password,$dbh);

	$cle=cleAleatoire($pseudo,$dbh);

	envoiMailConfirmation($pseudo,$cle,$email,$dbh);

	echo "<script>alert('Votre inscription est désormais en attente, veuillez cliquer sur le mail de confirmation !');
	document.location.href='http://puaud.eu/app/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
