<?php
session_start();
if(isset($_POST['pw']) AND isset($_POST['pw2']) AND isset($_POST['cle']) AND isset($_POST['log']))
{
	if($_POST['pw'] == $_POST['pw2'])
	{
		changementMDP($_POST['pw'],$_POST['log'],$dbh);
		echo "<script>alert('Mot de passe modifié !');document.location.href='../index.php';</script>";
	}
	else
	{
		echo "<script>alert('Les deux mots de passe ne correspondent pas !');history.back();</script>";
	}
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !');history.back();</script>";
}
