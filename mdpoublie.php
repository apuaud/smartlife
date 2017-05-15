<?php
session_start();
include('http://puaud.eu/app/db_connect.php');
include('http://puaud.eu/app/Modele/modele.php');

if(isset($_POST['email']))
{
	$email = htmlspecialchars($_POST['email']);

	motDePasseOublie($email,$dbh);

	}
	else
	{
		echo "<script>alert('Cet email n\'est relié à aucun compte');history.back();</script>";
	}
}
else
{
	echo "<script>alert('Le champ n'a pas été correctement rempli');history.back();</script>";
}
