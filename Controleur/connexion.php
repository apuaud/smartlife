<?php
session_start();

$pseudo = $_POST['login'];
$mdpinsere = sha1($_POST['motdepasse']);

$row=connexion($pseudo,$dbh);

// Si le compte est activé et le mot de passe correct
if($row['type'] >= 1 && $mdpinsere==$row['password'])
{
	$_SESSION['id'] = $row['id'];
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['type'] = $row['type'];
	$_SESSION['nom'] = $row['nom'];
	$_SESSION['prenom'] = $row['prenom'];
	if($row['type'] >=3)
	{
		$_SESSION['comptePrincipal'] = $row['id_comptePrincipal'];
	}
	header('Location: action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&');
}

// Si le compte n'est pas activé
else if($row['type'] == 0 && $mdpinsere==$row['password'])
{
	echo "<script>alert('Votre compte n'est pas encore activé !');document.location.href='../index.php';</script>";
}

// Si le mot de passe est incorrect
else if($mdpinsere != $row['password'])
{
	echo "<script>alert('Mot de passe incorrect');document.location.href='../index.php';</script>";
}
