<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');
$device = $_GET['device'];

if(isset($_POST['nom-piece']) AND isset($_POST['superficie']) AND isset($_POST['etage']) AND isset($_GET['maison']))
{
	$piece = htmlspecialchars($_POST["nom-piece"]);
    $etage = htmlspecialchars($_POST["etage"]);
	$superficie = htmlspecialchars($_POST["superficie"]);
	$maison = htmlspecialchars($_GET['maison']);

	ajouterPiece($piece,$etage,$superficie,$maison,$dbh);
	echo "<script>alert('Pièce ajoutée !');document.location.href='http://puaud.eu/app/Vue/" . $device . "/EspacePerso/account.php';</script>";

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
