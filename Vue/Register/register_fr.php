<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="../Styles/style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="action.php?action=validerInscription" method="post" onsubmit="return pwAndpwcEquals()">
				<table class="registrationTable" align="center">
					<tr>
						<td id="firstNameTd" class="spaceBetweenInput" align="right" >
							<input required type="text" name="firstName" placeholder="Prénom" pattern="[a-zA-Z- ]{1,}" title="Ne doit contenir que lettres et tirets" id="firstNameInput"/></td>
					</tr>
					<tr>
						<td id="lastNameTd" class="spaceBetweenInput"align="right">
							<input required  type="text" name="lastName" placeholder="Nom" pattern="[a-zA-Z- ]{1,}" title="Ne doit contenir que lettres et tirets"/></td>
					</tr>
					<tr>
						<td id="idTd" class="spaceBetweenInput"align="right">
							<input required  type="text" name="id" placeholder="Identifiant" pattern="[a-zA-Z0-9-_]{1,}" title="Ne doit contenir que lettres / chiffres / tirets"/></td>
					</tr>
					<tr>
						<td id="emailTd" class="spaceBetweenInput"align="right">
							<input required  type="text" name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$" title="L'email doit être valide"/></td>
					</tr>
					<tr>
						<td id="passwordTd" class="spaceBetweenInput"align="right">
							<input id="passwordInputValue"required type="password" name="pw" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 1maj, 1min, 1 chiffre et 8 caractères"/></td>
					</tr>
					<tr>
						<td id="passwordConfirmTd" class="spaceBetweenInput"align="right">
							<input id="passwordConfirmInputValue" required type="password" name="pw2" placeholder="Confirmation mot de passe"/></td>
					</tr>
					<tr>
						<td id='buttonConnexion' class="spaceBetweenInput"style="text-align:center"><button class="buttonsubmit" type="submit">Register</button></td>
					</tr>
				</table>
			</form>
		</div>

		<div class="container" id="accueil" >
			<p id="logoContainer"><a href="action.php?action=goToHome"><img align="middle"id="logo2" src="../img/logo_sansFond.png"></a></p>
			<img class ="imgBackground"src="../img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
</html>
