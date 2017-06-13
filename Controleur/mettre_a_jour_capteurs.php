<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');
include("../analyticstracking.php");

if(isset($_GET['piece'])&&isset($_POST))
{
  mettreAJourLesEffecteursDeLaPiece($_GET['piece'], $_POST, $dbh);
	echo "<script>alert('Mise à jour des capteurs effectuée !');document.location.href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php?maison=" . $_GET['maison'] . "';</script>";
}
