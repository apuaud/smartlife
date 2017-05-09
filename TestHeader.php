<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="StyleHeader.css" />
	</head>
			<header class="headersite">
			<img class="logo" src="img/logo_sansFond.png" label="logo">
			<section class="ContenuHeader"> 	
				 <section class="MenuHeader"> 
					<table>
						<tr class="tableHeader"> 
							<td class="ongletHeader"> Accueil</td>
							<td class="ongletHeader"> Présentation</td>
							<td class="ongletHeader"> Support</td>
						</tr>
					</table>
					<section class="ongletCoHeader"> 
						<p class="titreConnecte"> <?php echo 'Vous êtes connecté en tant que <br />' . $_SESSION['prenom'] . 
						' ' . $_SESSION['nom'] . ' (' . $_SESSION['pseudo'] .')'; ?> </p>
						<button class="deconnexion" type="submit"> Se déconnecter </button>
					</section>	
				</section>
					<p class = "titreEspace"> Votre espace personnel </p>
			</section>
		</header>