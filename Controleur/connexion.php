<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

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
	header('Location: http://puaud.eu/appmvc/Vue/EspacePerso/account.php');
}

// Si le compte n'est pas activé
else if($row['type'] == 0 && $mdpinsere==$row['password'])
{
	echo "<script>alert('Votre compte n'est pas encore activé !');document.location.href='http://puaud.eu/appmvc/';</script>";
}

// Si le mot de passe est incorrect
else if($mdpinsere != $row['password'])
{
	echo "<script>alert('Mot de passe incorrect');document.location.href='http://puaud.eu/appmvc/';</script>";
}
