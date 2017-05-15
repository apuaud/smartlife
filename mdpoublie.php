<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');

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
