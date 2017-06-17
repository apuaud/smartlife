<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienEmail']) AND isset($_POST['nouveauEmail']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$ancienEmail = $_POST['ancienEmail'];
	$nouvelEmail = $_POST['nouvelEmail'];

	$emailBDD = verifierEmailActuel($idUtilisateur, $dbh);

	if($emailBDD == $ancienEmail)
	{
		$countEmail = verifierDoubleCompteEmail($nouvelEmail,$dbh)
		if($countEmail == 0)
		{
			modifierEmail($idUtilisateur, $nouvelEmail, $dbh);
			echo "<script>alert('Votre mot de passe a bien été modifié.');
			document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
		}
		else
		{
			echo "<script>alert('Cet email est déjà associé à un compte sur le site ! Veuillez en choisir un autre.');
			document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
		}
	}
	else
	{
		echo "<script>alert('Le mail actuel inséré est incorrect.');
		history.back();</script>";
	}
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
