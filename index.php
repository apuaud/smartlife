<?php
session_start();
include("analyticstracking.php");

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
	$device="Mobile";
}
else
{
	$device="Desktop";
}

if (isset($_COOKIE['langue']))
{
	if($_COOKIE['langue']=='fr') //Détermination de la langue enregistrée en cookie
	{
		include("Vue/" . $device . "/Index/home_fr.php");
	}
	else
	{
		include("Vue/" . $device . "/Index/home_en.php");
	}
}
else
{
	include("Vue/" . $device . "/Index/home_fr.php"); //Langue par défaut
}
?>
