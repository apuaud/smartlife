<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

if(isset($_GET['id']))
{
	promouvoir($_GET['id'],$dbh);
	header('Location:action.php?action=goToAdministration&');
}
?>