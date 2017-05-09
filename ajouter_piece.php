<?php
session_start();
include('db_connect.php');

if(isset($_POST['nom-piece']) AND isset($_POST['superficie']) AND isset($_POST['etage']))
{
	$piece = htmlspecialchars($_POST["nom-piece"]);
    $etage = htmlspecialchars($_POST["etage"]);
	$superficie = htmlspecialchars($_POST["superficie"]);


	$req = $dbh->prepare('INSERT INTO piece(nom, etage, superficie, id_logement)
		VALUES(:nom, :etage, :superficie, :id_logement)');
	$req->execute(array(
		'nom' => $piece,
    	'etage' => $etage,
		'superficie' => $superficie,
		'id_logement' => 2
		));
	echo "<script>alert('Pièce ajoutée !');document.location.href='http://www.puaud.eu/app/account.php';</script>";
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
