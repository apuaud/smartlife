<?php
session_start();
include("analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("Vue/Register/register_fr.php");
	}
	else
	{
		include("Vue/Register/register_en.php");
	}
}
else
{
	include("Vue/Register/register_fr.php"); //Langue par défaut
}
?>
