<?php
session_start();
include('db_connect.php');

if(isset($_POST['email']))
{
	$email = htmlspecialchars($_POST['email']);

	$reponse = $dbh->query('SELECT COUNT(*) AS nbEmail FROM users WHERE email=\'' . $email . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbEmail']==1)
	{
		$reponse2 = $dbh->query('SELECT pseudo FROM users WHERE email=\'' . $email . '\'');
		$donnees2 = $reponse2->fetch();
		$reponse2->closeCursor();

		// On génère une clé aléatoire pour le mail de réinitialisation
		$cle = md5(microtime(TRUE)*100000);
		$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
		$stmt->bindParam(':cle', $cle);
		$stmt->bindParam(':pseudo', $donnees2['pseudo']);
		$stmt->execute();

		$destinataire = $email;
		$sujet = "Réinitialiser votre mot de passe sur SmartLife";
		$headers  = 'MIME-Version: 1.0' . "\n";
		$headers .= "From: noreply@puaud.eu";
		$message = 'Bonjour,
 
Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous
ou le copier/coller dans votre navigateur internet.
 
http://puaud.eu/app/reinitialiser.php?log='.urlencode($donnees2['pseudo']).'&cle='.urlencode($cle).'
 
---------------
Ceci est un mail automatique, merci de ne pas y répondre.';
		mail($destinataire, $sujet, $message, $headers);
		echo "<script>alert('Un email vient de vous être envoyé !');document.location.href='http://www.puaud.eu/app/';</script>";
	}
	else
	{
		echo "<script>alert('Cet email n\'est relié à aucun compte');history.back();</script>";
	}
}
else
{
	echo "<script>alert('Le champ n'a pas été correctement rempli');history.back();</script>";
}