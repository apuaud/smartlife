<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

if(isset($_POST['nom-piece']) AND isset($_POST['superficie']) AND isset($_POST['etage']) AND isset($_GET['maison']))
{
	$piece = htmlspecialchars($_POST["nom-piece"]);
  $etage = htmlspecialchars($_POST["etage"]);
	$superficie = htmlspecialchars($_POST["superficie"]);
	$maison = htmlspecialchars($_GET['maison']);

	ajouterPiece($piece,$etage,$superficie,$maison,$dbh);
	$idPiece = getIdPiece($dbh);
	echo "<script>document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison=" . $maison . "&piece=" . $idPiece . "';</script>";
}
else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
