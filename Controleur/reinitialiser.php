<?php
session_start();

echo "<script>alert('yo')</script>";
if(isset($_GET['log']) AND isset($_GET['cle']))
{
	$donnees = reinitialisationMDP($_GET['log'],$dbh);

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
