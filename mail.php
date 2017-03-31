<?php
$destinataire = 'ad_92@laposte.net';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = $_POST['email'];
$objet = $_POST['subject']; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: '.$expediteur."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire      
$message = $_POST['message'];
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
	echo "<script>alert('Votre email a correctement été envoyé');document.location.href='http://www.puaud.eu/app/';</script>";
}
else // Non envoyé
{
    echo "<script>alert('Un problème est survenu lors de l'envoi de votre email, 
    	merci de réessayer');document.location.href='javascript:history.go(-1)';</script>";
}
?>