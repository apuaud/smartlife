<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

if(isset($_GET['id']))
{
	echo"<script>alert('yo')</script>";
	supprimerCapteurPiece($_GET['id'],$dbh);
	header('Location:http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&maison=' . $_GET['maison'] . '&piece=' . $_GET['piece']);
}
?>
