<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleHeader.css" />
	</head>
			<header class="headersite">
			<img class="logo" src="http://puaud.eu/appmvc/img/logo_sansFond.png" label="logo">
			<section class="ContenuHeader">
				 <section class="MenuHeader">
					<table class="tableHeader">
						<tr class="trHeader">
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/appmvc/Vue/EspacePerso/account.php">Accueil</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/appmvc/Controleur/action.php?action=goToSupport">Support</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre">Paramètres</a></td>
							<td class="ongletHeader border-right"> <a class="lienheader" href="http://puaud.eu/appmvc/Vue/Admin/admin.php">Administration</a></td>
						</tr>
					</table>
					
					<section class="ongletCoHeader">
					<form action="http://puaud.eu/appmvc/Controleur/logout.php">
						<button class="deconnexion" type="submit">
							<img src="http://puaud.eu/appmvc/img/deconnexionBlanc.png" alt="fr" style="height:80px;max-width:auto;" />
						</button>
					</form>
					</section>
				</section>
					<p class = "titreEspace" style="color:white"> Votre espace personnel </p>
			</section>
		</header>
