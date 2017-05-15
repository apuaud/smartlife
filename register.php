<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include_once("$doc_root/app/analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Register/register_fr.php");
	}
	else
	{
		$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Register/register_en.php");
	}
}
else
{
	$doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Register/register_fr.php"); //Langue par défaut
}
?>
