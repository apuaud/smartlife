<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="inscription.php" method="post" onsubmit="return verifyInputs();">
			<table id="login" align="center" >
				<tr>
					<td id="firstNameInputFalse"><p align="right" class="border-right"> First name must contains only letters, spaces and dashes</p></td>
					<td id="itemFirstNames" >
						<input id="firstNameInput" type="text" name="firstName" placeholder="First name" size="13"/>
						<input id="lastNameInput" type="text" name="lastName" placeholder="Last name" size="12"/>
					</td>
					<td id="lastNameInputFalse"><p align="left" class="border-left"> Last name must contains only letters, spaces and dashes</p></td>
				</tr>
				<tr>
					<td id = "idInputFalse"><p align="right" class="border-right">ID must contains only letters, numbers and dashes</p></td>
					<td id="itemID">
						<input id="idInput" type="text" name="id" placeholder="ID" size="20"/>
						<input id="emailInput" type="text" name="email" placeholder="Email" size="20" />
					</td>
					<td id="emailInputFalse"><p align="left" class="border-left">Email must be valid</p></td>
				</tr>
				<tr>
					<td id = "passwordInputFalse"><p align="right" class="border-right">PW must contains at least 1 uppercase, 1 lowercase, 1 digit and 8 characters</p></td>
					<td id="itemPassword">
						<input id="passwordInput" type="password" name="pw" placeholder="Password" size="20" />
						<input id="passwordConfirmInput" type="password" name="pw2" placeholder="Confirm password" size="20" />
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
