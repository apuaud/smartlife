<?php
session_start();

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienEmail']) AND isset($_POST['nouveauEmail']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$ancienEmail = $_POST['ancienEmail'];
	$nouvelEmail = $_POST['nouveauEmail'];

	$emailActuel = getEmailActuel($idUtilisateur, $dbh);


	if($emailActuel == $ancienEmail)
	{
		$countEmail = verifierDoubleCompteEmail($nouvelEmail,$dbh);
		if($countEmail == 0)
		{
			modifierEmail($idUtilisateur, $nouvelEmail, $dbh);
			echo "<script>alert('Votre email a bien été modifié.');
			document.location.href='action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
		}
		else
		{
			echo "<script>alert('Cet email est déjà associé à un compte sur le site ! Veuillez en choisir un autre.');
			document.location.href='action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
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
