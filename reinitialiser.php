<?php
session_start();
include('http://puaud.eu/app/db_connect.php');
include('http://puaud.eu/app/Modele/modele.php');

if(isset($_GET['log']) AND isset($_GET['cle']))
{
	reinitialisationMDP($_GET['cle'],$dbh);

	if($donnees['cle'] == $_GET['cle'])
	{
		include('http://puaud.eu/app/reinitialiserform.php');
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
