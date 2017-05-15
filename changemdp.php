<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');

if(isset($_POST['pw']) AND isset($_POST['pw2']) AND isset($_POST['cle']) AND isset($_POST['log']))
{
	changementMDP($_POST['pw']),$_POST['log']),$dbh);
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}
