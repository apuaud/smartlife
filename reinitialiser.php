<?php
session_start();
include('db_connect.php');

if(isset($_GET['log']) AND isset($_GET['cle']))
{
	$reponse = $dbh->query('SELECT cle FROM users WHERE pseudo=\'' . $_GET['log'] . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();

	if($donnees['cle'] == $_GET['cle'])
	{
		include('reinitialiserform.php');
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