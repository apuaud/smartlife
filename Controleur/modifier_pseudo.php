<?php
session_start();

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['ancienPseudo']) AND isset($_POST['nouveauPseudo']))
{
    $idUtilisateur = htmlspecialchars($_SESSION['id']);
	$newPseudo = htmlspecialchars($_POST['nouveauPseudo']);

	$countPseudo = verifierDoubleComptePseudo($newPseudo,$dbh);
	if($countPseudo == 0)
	{
		modifierPseudo($idUtilisateur, $newPseudo, $dbh);
		echo "<script>alert('Votre nouveau pseudo est bien :  " . $newPseudo . "');
		document.location.href='action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
	}
	else
	{
		echo "<script>alert('Ce pseudo est déjà réservé ! Veuillez en choisir un autre.');
		document.location.href='action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages&';</script>";
	}

}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );
	history.back();</script>";
}
