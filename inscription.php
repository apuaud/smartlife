<?php
$dsn = 'mysql:dbname=u111859621_slife;host=mysql.hostinger.fr';
$user = 'u111859621_admin';
$password = 'ISEP2019';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

if (isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['id']) AND isset($_POST['email']) AND isset($_POST['pw']))
{
	$nom = $_POST['firstName'];
	$prenom = $_POST['lastName'];
	$pseudo = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['pw'];
	$isAdmin = 0;
	$req = $dbh->prepare('INSERT INTO users(prenom, nom, pseudo, email, password, isAdmin) VALUES(:prenom, :nom, :pseudo, :email, :password, :isAdmin)');
	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'pseudo' => $pseudo,
		'email' => $email,
		'password' => md5($password),
		'isAdmin' => $isAdmin
		));

	echo "<script>alert('Votre inscription est confirmée !');document.location.href='http://www.puaud.eu/app/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}