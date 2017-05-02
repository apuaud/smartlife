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
	$nom = htmlspecialchars($_POST['firstName']);
	$prenom = htmlspecialchars($_POST['lastName']);
	$pseudo = htmlspecialchars($_POST['id']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['pw'];
	$type = 0;
	$req = $dbh->prepare('INSERT INTO users(prenom, nom, pseudo, email, password, type) VALUES(:prenom, :nom, :pseudo, :email, :password, :type)');
	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'pseudo' => $pseudo,
		'email' => $email,
		'password' => sha1($password),
		'type' => $type
		));

	$cle = md5(microtime(TRUE)*100000);
	$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
	$stmt->bindParam(':cle', $cle);
	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->execute();

	$destinataire = $email;
	$sujet = "Activer votre compte sur SmartLife";
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= "From: noreply@puaud.eu";
	$message = 'Bienvenue sur SmartLife,
 
	Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
	ou le copier/coller dans votre navigateur internet.
 
	http://puaud.eu/app/activation.php?log='.urlencode($pseudo).'&cle='.urlencode($cle).'
 
	---------------
	Ceci est un mail automatique, Merci de ne pas y répondre.';
 
 
	mail($destinataire, $sujet, $message, $headers);

	echo "<script>alert('Votre inscription est désormais en attente, veuillez cliquer sur le mail de confirmation !');document.location.href='http://www.puaud.eu/app/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}