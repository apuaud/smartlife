<?php
session_start();
include("../analyticstracking.php");

if(isset($_GET['piece'])&&isset($_POST))
{
  mettreAJourLesEffecteursDeLaPiece($_GET['piece'], $_POST, $dbh);
	echo "<script>alert('Mise à jour des capteurs effectuée !');document.location.href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "';</script>";
}
