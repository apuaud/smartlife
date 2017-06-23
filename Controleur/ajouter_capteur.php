<?php
session_start();
include("../analyticstracking.php");

if(isset($_GET['idAppareil']) AND isset($_GET['numeroSerie']))
{
	$nomcapteur = htmlspecialchars($_GET['idAppareil']);
	$numeroserie = htmlspecialchars($_GET['numeroSerie']);

	ajouterCapteur($nomcapteur,$numeroserie,$_GET['piece'],$dbh);
	echo "<script>document.location.href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&piece=" . $_GET['piece'] . "&maison=" . $_GET['maison'] . "'</script>";
}
else
{
	echo "<script>alert('Erreur dans le remplissage du formulaire');
          document.location.href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&';</script>";
}
