<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');

if(isset($_POST['nom-piece']) AND isset($_POST['superficie']) AND isset($_POST['etage']))
{
	$piece = htmlspecialchars($_POST["nom-piece"]);
    $etage = htmlspecialchars($_POST["etage"]);
	$superficie = htmlspecialchars($_POST["superficie"]);


	ajouterPiece($piece,$etage,$superficie,$dbh);
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
