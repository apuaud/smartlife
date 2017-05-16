<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

if(isset($_POST['nom-piece']) AND isset($_POST['superficie']) AND isset($_POST['etage']))
{
	$piece = htmlspecialchars($_POST["nom-piece"]);
    $etage = htmlspecialchars($_POST["etage"]);
	$superficie = htmlspecialchars($_POST["superficie"]);


	ajouterPiece($piece,$etage,$superficie,$dbh);
	echo "<script>alert('Pièce ajoutée !');document.location.href='http://puaud.eu/app/Vue/EspacePerso/account.php';</script>";
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
