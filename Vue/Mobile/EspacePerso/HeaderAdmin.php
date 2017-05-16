<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/app/Styles/StyleHeader.css" />
	</head>
			<header class="headersite">
			<img class="logo" src="http://puaud.eu/app/img/logo_sansFond.png" label="logo">
			<section class="ContenuHeader">
				 <section class="MenuHeader">
					<table>
						<tr class="tableHeader">
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/app/index.php">Accueil</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/app/index.php">Présentation</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/app/Controleur/contact.php">Support</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/app/admin.php">Paramètres</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="http://puaud.eu/app/admin.php">Administration</a></td>
						</tr>
					</table>
					<section class="ongletCoHeader">
						<p class="titreConnecte"> <?php echo 'Vous êtes connecté en tant que <br />' . $_SESSION['prenom'] .
						' ' . $_SESSION['nom'] . ' (' . $_SESSION['pseudo'] .')'; ?> </p>
					<form action="http://puaud.eu/app/Controleur/logout.php">
						<button class="deconnexion" type="submit"> Se déconnecter </button>
					</form>
					</section>
				</section>
					<p class = "titreEspace"> Votre espace personnel </p>
			</section>
		</header>
