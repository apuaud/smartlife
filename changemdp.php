<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

if(isset($_POST['pw']) AND isset($_POST['pw2']) AND isset($_POST['cle']) AND isset($_POST['log']))
{
	changementMDP($_POST['pw']),$_POST['log']),$dbh);
	echo "<script>alert('Mot de passe modifié !');document.location.href='http://puaud.eu/app/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}
