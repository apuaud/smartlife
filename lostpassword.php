<?php
session_start();
include('db_connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="mdpoublie.php" method="post" onsubmit="">
			<table id="login" align="center" >
				<tr>
					<td id="firstNameInputFalse"><p align="right" class="border-right"></p></td>
					<td id="itemFirstNames" >
						<input id="firstNameInput" type="text" name="email" placeholder="Votre email" size="20"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td id='itemRegister'><button onclick="">Réinitialiser mon mot de passe</button></a></td>
					<td></td>
				</tr>

			</table>
			</form>

		</div>

		<div class="container" id="accueil" >
			<p class = "slogan">Your Home | Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="img/logo_sansFond.png"></p>

			<img class ="imgBackground"src="img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="register.js"></script>
	<script type="text/javascript">document.getElementById('formulaire').style.display="block";</script>
</html>