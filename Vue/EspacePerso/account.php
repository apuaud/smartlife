<?php
session_start();
include("../../db_connect.php");
include("../../Modele/modele.php");

?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/styleespaceperso.css"/>
			<title>Mon espace personnel</title>
		</head>
		<body class="manonbody">

			<div id="formulaire">
				<form action="http://puaud.eu/appmvc/Controleur/action.php?action=connexion" method="post">
				<table id="login" align="center">
					<tr>
						<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer"  /></td>
					</tr>
					<tr>
						<td class="nomCapteur">Température</td>
						<td><input required type="number" name="login" placeholder="30" size="30"/></td>
					</tr>
					<tr>
						<td class="nomCapteur">Luminosité</td>
						<td><input required type="number" name="login" placeholder="30" size="30"/></td>
					</tr>
					<tr>
						<td class="nomCapteur">Volets</td>
						<td><input required type="checkbox" name="login" placeholder="30" size="30"/></td>
					</tr>
					<tr>
						<td class="nomCapteur">Humidité</td>
						<td><input required type="number" name="login" placeholder="30" size="30"/></td>
					</tr>
					<tr>
						<td><button class="buttonsubmit" type="submit">Envoyer</button></td>
						<td><button class="buttonsubmit" type="submit">Ajouter Capteur</button></td>

					</tr>

				</table>
				</form>
			</div>
		<?php
		if(isset($_SESSION['id']))
		{
			if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
			{
				include("TestHeader.php");
			}
			else if($_SESSION['type']==2)
			{
				include("HeaderAdmin.php");
			}
		}
		if(!isset($_SESSION['id']) || $_SESSION['type']==0)
		{
			header("Location:http://puaud.eu/appmvc/Vue/Error/error.php?error=notConnected");
		}

		include_once("../../analyticstracking.php"); ?>

		<div class='textbox fixed'><span><a href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAjoutMaison'>+</a></span>
		</div>
		<div class='scroll-hori spaceForPlus'>
			<table class="listepiece">
				<tr>
				<?php
				$reponse = $dbh->query('SELECT logement.id,nom
					FROM logement,users_logement
					WHERE users_logement.id_user=\'' . $_SESSION['id'] . '\'
					AND logement.id=users_logement.id_logement');

				while($donnees = $reponse->fetch())
				{
					echo "<td class='manon'><div class='textbox'><span><a href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php?maison="
					. $donnees['id'] . "'>" . $donnees['nom'] . "</a></span></div></td>";
				} ?>
				</tr>
			</table>
		</div>
			<?php $reponse->closeCursor(); ?>

		<?php
		$houseBelongsToUser = verifierAppartenanceMaisonUtilisateur($_SESSION['id'], $_GET['maison'], $dbh);
		if(isset($_GET['maison']) && $houseBelongsToUser){
			echo "<div class='textbox fixed'><span><a href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAjoutPiece&maison=" . $_GET['maison'] . "'>+</a></span>
						</div>
						<div class='scroll-hori spaceForPlus'><table class='listepiece'><tr>";
				$reponse = $dbh->query('SELECT piece.nom,piece.id
					FROM logement,piece
					WHERE logement.id=\'' . $_GET['maison'] . '\'
					AND piece.id_logement=logement.id');

				while($donnees = $reponse->fetch())
				{
					$reponse2 = $dbh->query('SELECT type_appareil.nom, capteur.etatActuel
					FROM type_appareil,capteur
					WHERE capteur.id_piece=\'' . $donnees['id'] . '\'
					AND capteur.id_type_appareil=type_appareil.id');

					echo "<td><div class='textbox dropdown'>
					<span>". $donnees['nom'] ."</span>
					<div class='dropdown-content'><ul>
							<div class='liste-left'>";

					$reponse3 = $dbh->query('SELECT capteur.etatActuel
					FROM type_appareil,capteur
					WHERE capteur.id_piece=\'' . $donnees['id'] . '\'
					AND capteur.id_type_appareil=type_appareil.id');

					while($donnees2 = $reponse2->fetch())
					{
						echo "<li>".$donnees2['nom']."</li>";
					}
					echo "</div><div class='liste-right'>";
					while($donnees3 = $reponse3->fetch())
					{
						echo "<li>" . $donnees3['etatActuel'] . "</li>";
					}
					echo "</div><li style='text-align:right;'><img class='minilogo' src='http://puaud.eu/appmvc/img/reglage.png' onclick='displaySetCaptors()'></li>
						</ul></div>
					</div>
					</td>";
				}
				echo "<td class='manon'><div class='textbox'>
					<span><a href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAjoutPiece&maison=" . $_GET['maison'] . "'>+</a></span>
					</td></tr></table>";
			}
		else if(isset($_GET['maison']) && !$houseBelongsToUser)
		{
			header('Location: http://puaud.eu/appmvc/Vue/Error/error.php?error=notYourHouse');
		} ?>


<!--
			<table class="manon">
				<tr>
					<td class="manon"><div class="textbox dropdown">
					<span>Salon</span>
					<div class="texbox dropdown-content">
				<ul>
					<div class="liste"><li>Température</li>
					<li>Luminosité</li>
					<li>Volets</li>
					<li>Humidité</li></div>
					<li class="plus">+</li>
				</ul>
					</div>
					</div>
					</td>

					<td class="manon"><div class="textbox dropdown">
					<span>Cuisine</span>
					<div class="texbox dropdown-content">
				<ul>
					<div class="liste"><li>Température</li>
					<li>Luminosité</li>
					<li>Volets</li>
					<li>Humidité</li></div>
					<li class="plus">+</li>
					</div>
					</div>
					</td>
				</ul>
					<td class="manon"><div class="textbox dropdown">
					<span>Chambres</span>
					<div class="texbox dropdown-content">
				<ul>
					<div class="liste"><li>Température</li>
					<li>Luminosité</li>
					<li>Volets</li>
					<li>Humidité</li></div>
					<li class="plus">+</li>
				</ul>
					</div>
					</div>
					</td>
					<td class="manon"><div class="textbox dropdown">
					<span><a href="http://puaud.eu/appmvc/add_room.php">+</a></span>
					</div>
					</td>
				</tr>
		</table>
-->

			<script>
				var formulaire = document.getElementById('formulaire');

				function displaySetCaptors()
				{
					formulaire.style.display="block";
				}

				function hideFormulaire()
				{
					formulaire.style.display="none";
				}
			</script>
	</body>
</html>
