<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Styles/StyleHeader.css" />
	</head>
			<header class="headersite">
			<img class="logo" src="img/logo_sansFond.png" label="logo">
			<section class="ContenuHeader"> 	
				 <section class="MenuHeader"> 
					<table>
						<tr class="tableHeader"> 
							<td class="ongletHeader"> <a class="lienheader" href="index.php">Accueil</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="index.php">Présentation</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="contact.php">Support</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="admin.php">Paramètres</a></td>
							<td class="ongletHeader"> <a class="lienheader" href="admin.php">Administration</a></td>
						</tr>
					</table>
					<section class="ongletCoHeader"> 
						<p class="titreConnecte"> <?php echo 'Vous êtes connecté en tant que <br />' . $_SESSION['prenom'] . 
						' ' . $_SESSION['nom'] . ' (' . $_SESSION['pseudo'] .')'; ?> </p>
					<form action="logout.php">
						<button class="deconnexion" type="submit"> Se déconnecter </button>
					</form>
					</section>	
				</section>
					<p class = "titreEspace"> Votre espace personnel </p>
			</section>
		</header>