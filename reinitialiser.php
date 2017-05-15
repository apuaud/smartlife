<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');

if(isset($_GET['log']) AND isset($_GET['cle']))
{
	reinitialisationMDP($_GET['cle'],$dbh);

	if($donnees['cle'] == $_GET['cle'])
	{
		$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/reinitialiserform.php');
	}
	else
	{
		echo "<script>alert('Clé invalide');history.back();</script>";
	}

}
else
{
	echo "<script>alert('URL invalide');history.back();</script>";
}
