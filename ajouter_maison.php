<?php
session_start();
include('db_connect.php');


if(isset($_POST['nom-maison']) AND isset($_POST['adresse']) AND isset($_POST['codepostal']) AND isset($_POST['ville']) 
	AND isset($_POST['pays']) AND isset($_POST['superficie']) AND isset($_POST['nbhab']) AND isset($_SESSION['id']))
{
	$maison = htmlspecialchars($_POST["nom-maison"]);
	$adresse = htmlspecialchars($_POST["adresse"]);
	$codepostal = htmlspecialchars($_POST["codepostal"]);
	$ville = htmlspecialchars($_POST["ville"]);
	$pays = htmlspecialchars($_POST["pays"]);
	$superficie = htmlspecialchars($_POST["superficie"]);
	$nbhab = htmlspecialchars($_POST["nbhab"]);

	$req = $dbh->prepare('INSERT INTO logement(nom, adresse, ville, codePostal, pays, superficie, nombreHabitants) 
		VALUES(:nom, :adresse, :ville, :codepostal, :pays, :superficie, :nbhab)');
	$req->execute(array(
		'nom' => $maison,
		'adresse' => $adresse,
		'ville' => $ville,
		'codepostal' => $codepostal,
		'pays' => $pays,
		'superficie' => $superficie,
		'nbhab' => $nbhab
		));

	$reponse = $dbh->query('SELECT MAX(id) AS idlogement FROM logement');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();

	$req = $dbh->prepare('INSERT INTO users_logement(id_user,id_logement) 
		VALUES(:id_user,:id_logement)');
	$req->execute(array(
		'id_user' => $_SESSION['id'],
		'id_logement' => $donnees['idlogement']
		));

	echo "<script>alert('Maison ajoutée !');document.location.href='http://www.puaud.eu/app/account.php';</script>";
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>