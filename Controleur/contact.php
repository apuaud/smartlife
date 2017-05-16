<?php
session_start();
include("analyticstracking.php");
$device = $_GET['device'];

if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("../Vue/" . $device . "/Contact/contact_fr.php");
	}
	else
	{
		include("../Vue/" . $device . "/Contact/contact_en.php");
	}
}
else
{
	include("../Vue/" . $device . "/Contact/contact_fr.php"); //Langue par défaut
}
?>
