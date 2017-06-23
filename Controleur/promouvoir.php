<?php
session_start();

if(isset($_GET['id']))
{
	promouvoir($_GET['id'],$dbh);
	header('Location:action.php?action=goToAdministration&');
}
?>
