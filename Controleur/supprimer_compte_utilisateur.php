<?php
session_start();

if(isset($_GET['id']))
{
	supprimer($_GET['id'],$dbh);
	header('Location:action.php?action=goToAdministration&focus1=itemAdministration&focus2=&');
}
?>
