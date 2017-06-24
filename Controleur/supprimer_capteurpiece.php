<?php
session_start();

if(isset($_GET['id']))
{
	supprimerCapteurPiece($_GET['id'],$dbh);
	header('Location:action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison=' . $_GET['maison'] . '&piece=' . $_GET['piece']);
}
?>
