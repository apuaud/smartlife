<?php
session_start();
include("../../db_connect.php");
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="http://puaud.eu/app/Styles/styleespaceperso.css"/>
			<title>Mon espace personnel</title>
		</head>
		<body class="manonbody">
		<?php
		if($_SESSION['type']==1)
		{
			include("TestHeader.php");
		}
		if($_SESSION['type']==2)
		{
			include("HeaderAdmin.php");
		}
		include_once("../../analyticstracking.php"); ?>


			<table class="listepiece manontable">
				<tr>
				<?php
				$reponse = $dbh->query('SELECT logement.id,nom
					FROM logement,users_logement
					WHERE users_logement.id_user=\'' . $_SESSION['id'] . '\'
					AND logement.id=users_logement.id_logement');

				while($donnees = $reponse->fetch())
				{
					echo "<td class='manon'><div class='textbox'><span><a href='http://puaud.eu/app/Vue/EspacePerso/account.php?maison="
					. $donnees['id'] . "'>" . $donnees['nom'] . "</a></span></div></td>";
				} ?>
					<td class="manon"><div class="textbox">
						<span><a href="http://puaud.eu/app/Controleur/action.php?device=Mobile&action=goToAjoutMaison">+</a></span>
					</td>
				</tr>
			</table>
			<?php $reponse->closeCursor(); ?>

		<?php if(isset($_GET['maison'])){
			echo "<table class='manon'><tr>";
				$reponse = $dbh->query('SELECT piece.nom
					FROM logement,piece
					WHERE logement.id=\'' . $_GET['maison'] . '\'
					AND piece.id_logement=logement.id');

				while($donnees = $reponse->fetch())
				{
					echo "<td class='manon'><div class='textbox dropdown'>
					<span>". $donnees['nom'] ."</span>
					<div class='texbox dropdown-content'>
				<ul>
					<div class='liste'><li>Température</li>
					<li>Luminosité</li>
					<li>Volets</li>
					<li>Humidité</li></div>
					<li class='plus'>+</li>
				</ul>
					</div>
					</div>
					</td>";
				}
				echo "<td class='manon'><div class='textbox'>
					<span><a href='http://puaud.eu/app/Controleur/action.php?device=Mobile&action=goToAjoutPiece?maison=" . $_GET['maison'] . "'>+</a></span>
					</td></tr></table>";
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
					<span><a href="http://puaud.eu/app/add_room.php">+</a></span>
					</div>
					</td>
				</tr>
		</table>
-->
	</body>
</html>
