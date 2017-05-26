<?php
session_start();
include('../db_connect.php');
include('../Modele/modele.php');

if(isset($_GET['id']))
{
	depromouvoir($_GET['id'],$dbh);
	header('Location:http://puaud.eu/appmvc/Vue/Admin/admin.php');
}
?>