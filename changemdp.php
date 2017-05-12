<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

if(isset($_POST['pw']) AND isset($_POST['pw2']) AND isset($_POST['cle']) AND isset($_POST['log']))
{
	changementMDP($_POST['pw']),$_POST['log']),$dbh);
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}