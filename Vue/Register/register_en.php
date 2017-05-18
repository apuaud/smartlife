<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="http://puaud.eu/appmvc/Styles/style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerInscription" method="post" onsubmit="return verifyInputs();">
				<table class="registrationTable" align="center">

					<tr>
						<td id="firstNameTd" align="right" >
							<div class="messageCorrection">

								First name must contains only letters, spaces and dashes
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="text" name="firstName" placeholder="First name"/></td>
					</tr>
					<tr>
						<td id="lastNameTd" align="right">
							<div class="messageCorrection">
									Last name must contains only letters, spaces and dashes
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="text" name="lastName" placeholder="Last name"/></td>
					</tr>
					<tr>
						<td id="idTd" align="right">
							<div class="messageCorrection">
								ID must contains only letters, numbers, dashes and numbers
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="text" name="id" placeholder="ID"/></td>
					</tr>
					<tr>
						<td id="emailTd" align="right">
							<div class="messageCorrection">
								Email must be valid
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="text" name="email" placeholder="Email"/></td>
					</tr>
					<tr>
						<td id="passwordTd" align="right">
							<div class="messageCorrection">
								PW must contains at least 1 uppercase, 1 lowercase, 1 digit and 8 characters
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required  type="password" name="pw" placeholder="Password" /></td>
					</tr>
					<tr>
						<td id="passwordConfirmTd" align="right">
							<div class="messageCorrection">
								Must be the same as password
							</div>
							<div class="iconeErrorDiv">
								<div class="iconeError" >!</div>
							</div>
							<input required type="password" name="pw2" placeholder="Confirm password"/></td>
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
	<script type="text/javascript" src="http://puaud.eu/appmvc/Vue/Register/register.js"></script>

</html>
