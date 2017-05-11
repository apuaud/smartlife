<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="inscription.php" method="post" onsubmit="return verifyInputs();">
			<table id="login" align="center" >
				<tr>
					<td id="firstNameInputFalse"><p align="right" class="border-right"> Votre prénom ne peut contenir que des lettres, espaces et tirets</p></td>
					<td id="itemFirstNames" >
						<input id="firstNameInput" type="text" name="firstName" placeholder="Prénom" size="13"/>
						<input id="lastNameInput" type="text" name="lastName" placeholder="Nom" size="12"/>
					</td>
					<td id="lastNameInputFalse"><p align="left" class="border-left"> Votre nom ne peut contenir que des lettres, espaces et tirets</p></td>
				</tr>
				<tr>
					<td id = "idInputFalse"><p align="right" class="border-right">Votre pseudo ne peut contenir que des lettres, chiffres et tirets</p></td>
					<td id="itemID">
						<input id="idInput" type="text" name="id" placeholder="Pseudo" size="20"/>
						<input id="emailInput" type="text" name="email" placeholder="Email" size="20" />
					</td>
					<td id="emailInputFalse"><p align="left" class="border-left">Votre email n'est pas valide</p></td>
				</tr>
				<tr>
					<td id = "passwordInputFalse"><p align="right" class="border-right">Votre mot de passe doit contenir au moins 8 caractères dont 1 majuscule, 1 minuscule et 1 chiffre</p></td>
					<td id="itemPassword">
						<input id="passwordInput" type="password" name="pw" placeholder="Mot de passe" size="20" />
						<input id="passwordConfirmInput" type="password" name="pw2" placeholder="Recopier le MDP" size="20" />
					</td>
					<td id = "passwordConfirmInputFalse"><p align="left" class="border-left">Must be the same as password</p></td>
				</tr>

				<tr>
					<td></td>
					<td id='itemRegister'><button onclick="verifyInputs()">Register</button></a></td>
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
</html>
