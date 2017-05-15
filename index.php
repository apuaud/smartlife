<?php
session_start();
include_once("http://puaud.eu/app/analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Index/home_fr.php");
	}
	else
	{
		$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Index/home_en.php");
	}
}
else
{
	$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Index/home_fr.php"); //Langue par défaut
}
?>
