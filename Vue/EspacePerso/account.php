<?php
session_start();
include("../db_connect.php");
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/styleespaceperso.css"/>
			<title>Mon espace personnel</title>
		</head>

		<body class="manonbody">
			<?php
			$houseBelongsToUser = verifierAppartenanceMaisonUtilisateur($_SESSION['id'], $_GET['maison'], $dbh);
			$roomBelongsToHouse =true;
			if(isset($_GET['maison']) && isset($_GET['piece']) && $houseBelongsToUser && $roomBelongsToHouse)
			{
				$listeCapteurPiece = recupererLesCapteursDeLaPiece($_GET['piece'], $dbh);
				$listeEffecteurPiece = recupererLesEffecteursDeLaPiece($_GET['piece'], $dbh);

				echo "<div id='formulaire'>
					<form action='http://puaud.eu/appmvc/Controleur/action.php?action=updateCaptors&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "' method='post'>
					<table id='login' align='center'>
						<tr>
							<td id='closeForm' onclick='hideFormulaire()''><img id='cross' src='http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png' alt='Fermer'  /></td>
						</tr>";

						while($capteur = $listeCapteurPiece -> fetch())
						{
							echo "<tr>
								<td class='nomCapteur'>" . $capteur['nom'] . "</td>";

							echo "<td>" . $capteur['etatActuel'] . "</td>";

						}


						while($effecteur = $listeEffecteurPiece -> fetch())
						{
							echo "<tr>
								<td class='nomCapteur'>" . $effecteur['nom'] . "</td>";
							echo "<td><input required type='" . $effecteur['type_input'] ."' name='" . $effecteur['nom'] . "' value = '" . $effecteur['etatActuel'] ."' placeholder='30' size='30'/></td>
							</tr>";
						}

						echo"<tr>
							<td><button class='buttonsubmit' type='submit' href='http://puaud.eu/appmvc/Controleur/action.php?action=updateCaptors&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "'>Envoyer</button></td>
							<td><div class='buttonsubmit'><a href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAjoutCapteur&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "'>Ajouter Capteur</a></div></td>
						</tr>
					</table>
					</form>
				</div>";
			}
			else if (isset($_GET['maison']) && $houseBelongsToUser==false)
			{
				echo "<script> document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notYourHouse';</script>";
			}
			else if (isset($_GET['maison']) && $roomBelongsToHouse==false)
			{
				echo "<script> document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notYourRoom';</script>";
			}
			?>
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
			echo "<script> document.location.href='http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notConnected';</script>";
		}

		include_once("../../analyticstracking.php"); ?>

		<div class='textbox fixed'><span><a href='http://puaud.eu/appmvc/Controleur/action.php?action=goToAjoutMaison'>+</a></span>
		</div>
		<div class='scroll-hori spaceForPlus'>
			<table class="listepiece">
				<tr>
				<?php
				$reponse = recupererLesMaisonsDeLUtilisateur($_SESSION['id'], $dbh);

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
				$reponse = recupererLesPiecesDeLaMaison($_GET['maison'], $dbh);

				while($donnees = $reponse->fetch())
				{

					$reponse2 = recupererLesCapteursDeLaPiece($donnees['id'], $dbh);

					echo "<td><div class='textbox dropdown'>
					<span>" . $donnees['nom'] ."</span>
					<div class='dropdown-content'><ul>
							<div class='liste-left'>";

					$reponse3 = recupererLEtatDesCapteursDeLaPiece($donnees['id'], $dbh);

					while($donnees2 = $reponse2->fetch())
					{
						echo "<li>".$donnees2['nom']."</li>";
					}
					echo "</div><div class='liste-right'>";
					while($donnees3 = $reponse3->fetch())
					{
						echo "<li>" . $donnees3['etatActuel'] . "</li>";
					}
					echo "</div><li style='text-align:right;'><a href='http://puaud.eu/appmvc/Vue/EspacePerso/account.php?maison=". $_GET['maison'] ."&piece=" . $donnees['id'] . "'>
					<img class='minilogo' src='http://puaud.eu/appmvc/img/reglage.png' onclick='displaySetCaptors()'></a></li>
						</ul></div>
					</div>
					</td>";
				}
			}
		else if(isset($_GET['maison']) && !$houseBelongsToUser)
		{
			header('Location: http://puaud.eu/appmvc/Vue/Error/error.php?error=notYourHouse');
		} ?>

			<script>
				var formulaire = document.getElementById('formulaire');

				function hideFormulaire()
				{
					formulaire.style.display="none";
				}
			</script>
	</body>
</html>
