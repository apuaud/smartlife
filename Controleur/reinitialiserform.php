<?php
session_start();
include('../db_connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mettre à jour votre mot de passe</title>
		<link rel="stylesheet" type="text/css" href="../Styles/style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="action.php?action=changemdp" method="post" onsubmit="return verifyInputs();">
			<table id="login" align="center" >
				<tr>
					<td id="firstNameInputFalse"><p align="right" class="border-right"></p></td>
					<td id="itemFirstNames" >
						<input required id="firstNameInput" type="password" name="pw" placeholder="Mot de passe" size="20"/>
						<input required id="lastNameInput" type="password" name="pw2" placeholder="Confirmer MDP" size="20"/>
					</td>
					<td id="lastNameInputFalse"><p align="left" class="border-left"></p></td>
				</tr>
				<tr>
					<td></td>
					<input required type="hidden" name="log" value=<?php echo "'" . $_GET['log'] . "'" ?>>
					<input required type="hidden" name="cle" value=<?php echo "'" . $_GET['cle'] . "'" ?>>
					<td id='itemRegister'><button onclick="">Mettre à jour votre mot de passe</button></a></td>
					<td></td>
				</tr>

			</table>
			</form>

		</div>

		<div class="container" id="accueil" >
			<p class = "slogan">Your Home | Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="../img/logo_sansFond.png"></p>

			<img class ="imgBackground"src="../img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../Vue/Register/register.js"></script>
	<script type="text/javascript">document.getElementById('formulaire').style.display="block";</script>
</html>
