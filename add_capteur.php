<?php
session_start();
include('db_connect.php');


if(isset($_POST['typecapteur']) AND isset($_POST['numeroserie']))
{
	$typecapteur = htmlspecialchars($_POST["typecapteur"]);
	$numeroserie = htmlspecialchars($_POST["numeroserie"]);

	$reponse = $dbh->query('SELECT id 
		FROM type_appareil
		WHERE numeroModele =\'' . $typecapteur . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();

	$req = $dbh->prepare('INSERT INTO capteur(id_type_appareil, numeroSerie, id_piece) 
		VALUES(:id_type_appareil, :numeroSerie, :id_piece)');
	$req->execute(array(
		'id_type_appareil' => $typecapteur,
		'numeroSerie' => $numeroserie,
		'id_piece' => $_GET['piece']
		));