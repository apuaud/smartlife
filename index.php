<?php
session_start();
include_once("analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("home_fr.php");
	}
	else
	{
		include("home_en.php");
	}
}
else
{
	include("home_fr.php"); //Langue par défaut
}
?>