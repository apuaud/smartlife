<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="../Styles/style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="action.php?action=validerInscription" method="post">
				<table class="registrationTable" align="center">
					<tr>
						<td id="firstNameTd" align="right" >
							<input required type="text" name="firstName" placeholder="Prénom" pattern="[a-zA-Z-]{1,}" title="Ne doit contenir que lettres et tirets" id="firstNameInput"/></td>
					</tr>
					<tr>
						<td id="lastNameTd" align="right">
							<input required  type="text" name="lastName" placeholder="Nom" pattern="[a-zA-Z-]{1,}" title="Ne doit contenir que lettres et tirets"/></td>
					</tr>
					<tr>
						<td id="idTd" align="right">
							<input required  type="text" name="id" placeholder="Identifiant" pattern="[a-zA-Z0-9-_]{1,}" title="Ne doit contenir que lettres / chiffres / tirets"/></td>
					</tr>
					<tr>
						<td id="emailTd" align="right">
							<input required  type="text" name="email" placeholder="Email" pattern="[a-zA-Z0-9-_]{1,}" title="L'email doit être valide"/></td>
					</tr>
					<tr>
						<td id="passwordTd" align="right">
							<div class="messageCorrection">
								Le mot de passe doit contenir au moins 1 maj, 1 min, 1 chiffre et 8 caractères
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="password" name="pw" placeholder="Mot de passe" pattern="[a-zA-Z0-9-_]{1,}" title="L'email doit être valide"/></td>
					</tr>
					<tr>
						<td id="passwordConfirmTd" align="right">
							<div class="messageCorrection">
								Doit être identique au mot de passe ci-dessus
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required type="password" name="pw2" placeholder="Confirmation mot de passe"/></td>
					</tr>
					<tr>
						<td id='buttonConnexion' style="text-align:center"><button class="buttonsubmit" type="submit">Register</button></td>
					</tr>
				</table>
			</form>
		</div>

		<div class="container" id="accueil" >
			<p id="logoContainer"><img align="middle"id="logo2" src="../img/logo_sansFond.png"></p>
			<img class ="imgBackground"src="../img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../Vue/Register/register.js"></script>
</html>
