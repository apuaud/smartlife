<?php
session_start();
include_once("http://puaud.eu/app/analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("http://puaud.eu/app/Vue/Contact/contact_fr.php");
	}
	else
	{
		include("http://puaud.eu/app/Vue/Contact/contact_en.php");
	}
}
else
{
	include("http://puaud.eu/app/Vue/Contact/contact_fr.php"); //Langue par défaut
}
?>
