<?php
$destinataire = 'ad_92@laposte.net';
$expediteur = $_POST['email'];
$objet = $_POST['subject']; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: '.$expediteur."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire      
$message = $_POST['message'];
if (isset($_POST['email']) AND isset($_POST['subject']) AND isset($_POST['message']))
{
	if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
	{
		echo "<script>alert('Votre email a correctement été envoyé');document.location.href='http://localhost:8888/SmartLife/';</script>";
	}
	else // Non envoyé
	{
	    echo "<script>alert('Un problème est survenu lors de l'envoi de votre email, 
	    	merci de réessayer');document.location.href='javascript:history.go(-1)';</script>";
	}
}
else // Tous les champs n'ont pas été remplis
{
	echo "<script>alert('Un des champs n'a pas été correctement rempli')</script>";
}
?>