<?php
session_start();
setcookie('langue', 'fr', time() + 365*24*3600, null, null, false, true);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife_Mobile</title>
		<link rel="stylesheet" type="text/css" href="http://localhost:8888/SmartLife/Styles/Mobile_style.css"  />
	</head>
	<body>

		<!-- SECTION CACHÉE CONNEXION -->
		<div class=container id="formulaire">
			<div class="formulaireDiv">
				<table class="descriptionTable" id="formulaireTab">
					<form action="http://localhost:8888/SmartLife/Controleur/action.php?device=Mobile&action=connexion" method="post">
					<tr>
						<td id="closeForm" style="text-align:right; padding-right:100px;" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="40px" /></td>
					</tr>
					<tr>
						<td id="itemID" ><input id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
					</tr>
					<tr>
						<td id="itemPassword"><input id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
					</tr>
					<tr>
						<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
					</tr>
					<tr>
						<td id='itemLostPassword'  align="center"><a href="#" style="color:white" >Mot de passe oublié ?</td>
					</tr>
					</form>
					<tr>
						<td id='itemRegister'><button class="buttonsubmit" onclick="window.location.href='http://localhost:8888/SmartLife/Vue/Mobile/Register/register_fr.php'">Register</button></td>
					</tr>
				</table>
				</form>
			</div>
		</div>

		<!-- SECTION ICONES -->
	  <div class="fixed" id="barreDiv">
			<table class="barreTable">
				<tr>
					<td onclick="callContactPage()">
						<img class="logo" align="middle"src="http://localhost:8888/SmartLife/img/email.png">
					</td>
					<td>
						<img class="logo" align="middle"src="http://localhost:8888/SmartLife/img/accueil_logo.png">
					</td>
					<td onclick="displayFormulaire()">
						<img class="logo" align="middle"src="http://localhost:8888/SmartLife/img/profile.png">
					</td>
				</tr>
			</table>
		</div>

		<!-- SECTION 1 -->
		<div class="container" style="background-color:#008B8B" id="container1">
			<div class="inner-container">
				<table class="descriptionTable">
					<tr>
						<td style="text-align:left">
						</td>
					</tr>
					<tr>
						<td>
							<p class="descriptionP"> Your Home <br/>
																			 Your Future</p>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">
						</td>
					</tr>
				</table>
			</div>
		</div>

		<!-- SECTION 2 -->
		<div class="container" style="background-color:#483D8B" id="container2">
			<div class="inner-container">
				<table class="descriptionTable">
					<tr>
						<td style="text-align:left">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsHaut.png" style="width:50px">
						</td>
					</tr>
					<tr>
						<td>
							<p class="descriptionP">Prenez le contrôle de votre logement en connectant vos volets,
																						vos lumières et ajoutez plein d'autres fonctionnalités !</p>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsBas.png" style="width:50px">
						</td>
					</tr>
				</table>
			</div>
			<div class="sloganDiv">
				Rendez votre maison intelligente
			</div>
		</div>

		<!-- SECTION 3 -->
		<div class="container" style="background-color:#A52A2A" id="container3">
			<div class="inner-container">
				<table class="descriptionTable">
					<tr>
						<td style="text-align:left">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsHaut.png" style="width:50px">
						</td>
					</tr>
					<tr>
						<td>
							<p class="descriptionP">Connectez vous à votre logement quand vous voulez,
																						d'où vous voulez, et à partir de n'importe quel appareil !</p>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsBas.png" style="width:50px">
						</td>
					</tr>
				</table>
			</div>
			<div class="sloganDiv">
				Contrôlez votre maison à distance
			</div>
		</div>

		<div class="container"style="background-color:#20B2AA" id="container4">
			<div class="inner-container">
				<table class="descriptionTable">
					<tr>
						<td style="text-align:left">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsHaut.png" style="width:50px">
						</td>
					</tr>
					<tr>
						<td>
							<p class="descriptionP">Ne soyez plus surpris du montant inscrit au bas de vos factures d'eau et d'électricité,
																						soyez avertit en temps réel de votre consommation et ne gaspillez plus d'énergie !</p>
						</td>
					</tr>
					<tr>
						<td style="text-align:right">
							<img align="middle"src="http://localhost:8888/SmartLife/img/guillemetsBas.png" style="width:50px">
						</td>
					</tr>
				</table>
			</div>
			<div class="sloganDiv">
				Optimisez votre consommation énergétique
			</div>
		</div>

		<script>
			var formulaire = document.getElementById('formulaire');

			function displayFormulaire()
			{
			  formulaire.style.display="block";
			  document.getElementById('idInput').focus();
			}
			function hideFormulaire()
			{
			  formulaire.style.display="none";
			  idInput.value="";
			  passwordInput.value="";
			}

			function callContactPage()
			{
				window.location="contact.php";
			}
		</script>

	</body>
</html>
