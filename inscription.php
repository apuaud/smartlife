<?php
session_start();
include('db_connect.php');

// On vérifie que tous les champs sont bien remplis
if (isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['id']) AND isset($_POST['email']) AND isset($_POST['pw']))
{
	$nom = htmlspecialchars($_POST['firstName']);
	$prenom = htmlspecialchars($_POST['lastName']);
	$pseudo = htmlspecialchars($_POST['id']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['pw'];
	$type = 0;

// On vérifie que personne détient déjà un compte avec ce pseudo
	$reponse = $dbh->query('SELECT COUNT(*) AS nbPseudo FROM users WHERE pseudo=\'' . $pseudo . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbPseudo']>=1)
	{
		echo "<script>alert('Ce pseudo ne peut pas être utilisé !');history.back();</script>";
		exit;
	}

// On fait le même test avec l'adresse email
	$reponse = $dbh->query('SELECT COUNT(*) AS nbEmail FROM users WHERE email=\'' . $email . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbEmail']>=1)
	{
		echo "<script>alert('Cet email a déjà un compte associé !');history.back();</script>";
		exit;
	}

// On ajoute l'utilisateur dans la BDD
	$req = $dbh->prepare('INSERT INTO users(prenom, nom, pseudo, email, password, type) VALUES(:prenom, :nom, :pseudo, :email, :password, :type)');
	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'pseudo' => $pseudo,
		'email' => $email,
		'password' => sha1($password),
		'type' => $type
		));

// On génère une clé aléatoire pour le mail de confirmation
	$cle = md5(microtime(TRUE)*100000);
	$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
	$stmt->bindParam(':cle', $cle);
	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->execute();

// Préparation du mail de confirmation
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
 
// Envoi du mail de confirmation 
	mail($destinataire, $sujet, $message, $headers);
	echo "<script>alert('Votre inscription est désormais en attente, veuillez cliquer sur le mail de confirmation !');document.location.href='http://www.puaud.eu/app/';</script>";
}
else
{
	echo "<script>alert('Tous les champs doivent être remplis !' );history.back();</script>";
}