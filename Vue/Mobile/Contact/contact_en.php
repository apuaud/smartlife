<?php
session_start();
setcookie('langue', 'en', time() + 365*24*3600, null, null, false, true);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="http://localhost:8888/SmartLife/Styles/style.css"  />
	<style>
	body
	{
		background-image: url("http://image.noelshack.com/fichiers/2017/13/1490602675-accueil2.png");
		background-size: 100%;
	}
	#form
	{
		margin-top: 20%;
	}
	td
	{
		background-color: rgba(0, 0, 0, 0.2);
	}
	#login
	{
		border-collapse: collapse;
	}
	</style>
</head>
<body>
<div class="container" id="accueil" >
	<!--<p id = "slogan">Your Home | Your Future</p>-->
	<p id="logoContainer"><img align="middle"id="logo2" src="http://image.noelshack.com/fichiers/2017/13/1490602674-accueil-logo.png"></p>

	<table id = "barreAccueil" class="caption" style="position:fixed ">
		<tr>
			<td id="itemAccueil" class="menuItem"><a href="http://localhost:8888/SmartLife/" style="text-decoration:none;color:inherit;">Home</a></td>
			<td id="itemPresentation" class="menuItem">Services</td>
			<td id='itemLogo' ></td>
			<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Account</td>
			<td id='itemAide'class="menuItem" ><a href="http://localhost:8888/SmartLife/Controleur/contact.php" style="text-decoration:none;color:inherit;">Help</a></td>
		</tr>
		<tr id="ligneServices">
			<td></td>
			<td id="levelServices"></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
<div id="form" style="z-index=7">
<form action="http://localhost:8888/SmartLife/Controleur/action.php?device=Mobile&action=sendMail" method="post">
<table id="login" align="center">
	<tr>
		<td id="itemEmail" class="menuMail"><input type="text" name="email" placeholder="Your email" size="41"/></td>
	</tr>
	<tr>
		<td id="itemSubject" class="menuMail"><input type="text" name="subject" placeholder="Subject" size="41"/></td>
	</tr>
	<tr>
		<td id="itemPassword" class="menuMail"><textarea name="message" rows="10" cols="70" placeholder="Write your message here"></textarea></td>
	</tr>
	<tr>
		<td id="valider" class="menuMail"><input type="submit" value="Send" />
</table>
</form>
</div>
</div>
</body>
</html>
