<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife_Mobile</title>
		<link rel="stylesheet" type="text/css" href="http://puaud.eu/app/Styles/Mobile_style.css"  />
	</head>
	<body>

    <div class="fixed" id="barreDiv">
			<table class="barreTable">
				<tr>
					<td>
						<img width="200px"align="middle"src="http://puaud.eu/app/img/accueil_logo.png">
					</td>
				</tr>
			</table>
		</div>

		<div class=container id="formulaire" style="display:block">
			<div class="formulaireDiv">
				<table class="descriptionTable" id="formulaireTab">
					<form action="inscription.php" method="post" onsubmit="return verifyInputs();">
					<tr>
					</tr>
					<tr>
						<td><input id="firstNameInput" type="text" name="firstName" placeholder="First name" size="13"/></td>
					</tr>
					<tr>
						<td><input id="lastNameInput" type="text" name="lastName" placeholder="Last name" size="12"/></td>
					</tr>
					<tr>
						<td><input id="idInput" type="text" name="id" placeholder="ID" size="20"/></td>
					</tr>
					<tr>
						<td><input id="emailInput" type="text" name="email" placeholder="Email" size="20" /></td>
					</tr>
          <tr>
            <td><input id="passwordInput" type="password" name="pw" placeholder="Password" size="20" />
            </td>
          </tr>
          <tr>
            <td><input id="passwordConfirmInput" type="password" name="pw2" placeholder="Confirm password" size="20" />
            </td>
          </tr>
					</form>
					<tr>
						<td><button class = "buttonsubmit" onclick="verifyInputs()">Register</button></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
  </body>
</html>
