<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

$pseudo = $_POST['login'];
$mdpinsere = sha1($_POST['motdepasse']);

$row=connexion($pseudo,$dbh);

// Si le compte est activé et le mot de passe correct
if($type >= 1 && $mdpinsere==$mdp)
{
	$_SESSION['id'] = $row['id'];
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['type'] = $row['type'];
	$_SESSION['nom'] = $row['nom'];
	$_SESSION['prenom'] = $row['prenom'];
	header('Location: http://puaud.eu/app/account.php');
}

// Si le compte n'est pas activé
else if($type == 0 && $mdpinsere==$mdp)
{
	echo "<script>alert('Votre compte n'est pas encore activé !');document.location.href='http://puaud.eu/app/';</script>";
}

// Si le mot de passe est incorrect
else if($mdpinsere != $mdp)
{
	echo "<script>alert('Mot de passe incorrect');</script>";
}
