<?php
include('db_connect.php');

$req = $dbh->prepare('INSERT INTO type_appareil(nom,numeroModele) VALUES(:nom, :numeroModele)');
$req->execute(array(
	'nom' => $_POST['type'],
	'numeroModele' => $_POST['numeromodele']
	));
?>