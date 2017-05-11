<?php
session_start();
include('db_connect.php');

if(isset($_POST['pw']) AND isset($_POST['pw2']) AND isset($_POST['cle']) AND isset($_POST['log']))
{
	$stmt = $dbh->prepare("UPDATE users SET password=:password WHERE pseudo like :pseudo");
	$stmt->bindParam(':password', sha1($_POST['pw']));
	$stmt->bindParam(':pseudo', htmlspecialchars($_POST['log']));
	$stmt->execute();
	echo "<script>alert('Mot de passe modifié !' );document.location.href='http://www.puaud.eu/app/';</script>";
}

else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}