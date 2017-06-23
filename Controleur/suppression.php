<?php
session_start();

// On vérifie que tous les champs sont bien remplis
if(isset($_POST['motDePasse']))
{
	$idUtilisateur = htmlspecialchars($_SESSION['id']);
	$mdpInsere = sha1($_POST['motDePasse']);
	$reponse = getMDPactuel($idUtilisateur, $dbh);

	while($mdpBDD = $reponse -> fetch())
	{
		$tmp = $mdpBDD['password'];
	}

	if($tmp == $mdpInsere)
	{
		supprimer($idUtilisateur, $dbh);
		session_unset();
		session_destroy();
		echo "<script>alert('Votre compte a été supprimé. Au revoir !');
		document.location.href='../index.php';</script>";
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
