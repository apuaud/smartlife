<?php
session_start();
include("../analyticstracking.php");
if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("../Vue/Support/support_fr.php");
	}
	else
	{
		include("../Vue/Support/support_en.php");
	}
}
else
{
	include("../Vue/Support/support_fr.php"); //Langue par défaut
}
?>
