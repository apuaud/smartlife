<?php
session_start();
include_once("analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("Vue/Index/home_fr.php");
	}
	else
	{
		include("Vue/Index/home_en.php");
	}
}
else
{
	include("Vue/Index/home_fr.php"); //Langue par défaut
}
?>