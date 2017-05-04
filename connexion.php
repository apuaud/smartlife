<?php
session_start();
include('db_connect.php');

$pseudo = $_POST['login'];
$mdpinsere = sha1($_POST['motdepasse']);
$req = $dbh->prepare("SELECT id,password,type,nom,prenom FROM users WHERE pseudo like :pseudo ");
if($req->execute(array(':pseudo' => $pseudo)) && $row = $req->fetch())
{
	$id = $row['id'];
    $mdp = $row['password'];
    $type = $row['type'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];
}

if($type >= 1 && $mdpinsere==$mdp)
{
	$_SESSION['id'] = $id;
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['type'] = $type;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	header('Location: http://puaud.eu/app/account.php');
}
else if($type == 0 && $mdpinsere==$mdp)
{
	echo "<script>alert('Votre compte n'est pas encore activé !');document.location.href='http://www.puaud.eu/app/';</script>";
}
else if($mdpinsere != $mdp)
{
	echo "<script>alert('Mot de passe incorrect');</script>";
}