<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="http://puaud.eu/appmvc/Styles/style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerInscription" method="post" onsubmit="return verifyInputs();">

			<table class="registrationTable" align="center">

				<tr>
					<td id="firstNameTd" align="right" >
						<div class="messageCorrection">
							Le prénom ne doit contenir que lettres, espaces et tirets
						</div>
						<div class="iconeErrorDiv">
							<div class="iconeError" >!</div>
						</div>
						<input required  type="text" name="firstName" placeholder="Prénom"/></td>
				</tr>
				<tr>
					<td id="lastNameTd" align="right">
						<div class="messageCorrection">
								Le nom ne doit contenir que lettres, espaces et tirets
						</div>
						<div class="iconeErrorDiv">
							<div class="iconeError" >!</div>
						</div>
						<input required  type="text" name="lastName" placeholder="Nom"/></td>
				</tr>
				<tr>
					<td id="idTd" align="right">
						<div class="messageCorrection">
							L'identifiant ne doit contenir que lettres, espaces, tirets et chiffres
						</div>
						<div class="iconeErrorDiv">
							<div class="iconeError" >!</div>
						</div>
						<input required  type="text" name="id" placeholder="Identifiant"/></td>
				</tr>
				<tr>
					<td id="emailTd" align="right">
						<div class="messageCorrection">
							L'email doit être valide
						</div>
						<div class="iconeErrorDiv">
							<div class="iconeError" >!</div>
						</div>
						<input required  type="text" name="email" placeholder="Email"/></td>
				</tr>
				<tr>
					<td id="passwordTd" align="right">
						<div class="messageCorrection">
							Le mot de passe doit contenir au moins 1 maj, 1 min, 1 chiffre et 8 caractères
						</div>
						<div class="iconeErrorDiv">
							<div class="iconeError" >!</div>
						</div>
						<input required  type="password" name="pw" placeholder="Mot de passe" /></td>
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
			<p id="logoContainer"><img align="middle"id="logo2" src="http://puaud.eu/appmvc/img/logo_sansFond.png"></p>

			<img class ="imgBackground"src="http://puaud.eu/appmvc/img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript">

	</script>
	<script type="text/javascript" src="http://puaud.eu/appmvc/Vue/Register/register.js"></script>
</html>
