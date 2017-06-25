<?php
session_start();

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienMotDePasse']) AND isset($_POST['nouveauMotDePasse']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$newPassword = $_POST['nouveauMotDePasse'];
	$mdpInsere = sha1($_POST['ancienMotDePasse']);

	$mdpBDD = getMDPactuel($idUtilisateur, $dbh);

	if($mdpBDD == $mdpInsere)
	{
		modifierMDP($idUtilisateur, $newPassword, $dbh);
		echo "<script>alert('Votre mot de passe a bien été modifié.');
		document.location.href='action.php?action=seDeconnecter';</script>";
	}
	else
	{
		echo "<script>alert('Le mot de passe actuel inséré est incorrect.');
		history.back();</script>";
	}
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
