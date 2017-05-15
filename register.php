<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include_once("$doc_root/app/analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("http://puaud.eu/app/Vue/Register/register_fr.php");
	}
	else
	{
		include("http://puaud.eu/app/Vue/Register/register_en.php");
	}
}
else
{
	include("http://puaud.eu/app/Vue/Register/register_fr.php"); //Langue par défaut
}
?>
