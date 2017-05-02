<?php
session_start();
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("contact_fr.php");
	}
	else
	{
		include("contact_en.php");
	}
}
else
{
	include("contact_fr.php"); //Langue par défaut
}
?>