<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');
include("../analyticstracking.php");

if(isset($_GET['idAppareil']) AND isset($_GET['numeroSerie']))
{
	$nomcapteur = htmlspecialchars($_GET['idAppareil']);
	$numeroserie = htmlspecialchars($_GET['numeroSerie']);

	ajouterCapteur($nomcapteur,$numeroserie,$_GET['piece'],$dbh);
	echo "<script>alert('Appareil ajouté');document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&piece=" . $_GET['piece'] . "&maison=" . $_GET['maison'] . "'</script>";
}
else
{
	echo "<script>alert('Erreur dans le remplissage du formulaire');
          document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&';</script>";
}
