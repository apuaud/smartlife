<?php
session_start();
echo"<script>alert('yo')</script>";

if(isset($_GET['id']))
{
	supprimer($_GET['id'],$dbh);
	header('Location:action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages');
}
?>
