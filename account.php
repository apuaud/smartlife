<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
	<html>

		<head>

			<meta charset="utf-8"/>
			<link rel="stylesheet" href="styleespaceperso.css"/>
			<title>Mon espace personnel</title>
		</head>
		<body class="manonbody">
		<header>
		<table class="manontable" align="center">
		<tr>
			<td class="manon"><p class="textbox2">Votre espace personnel</p></td>
		</tr>
		</table>
		</header>


			<table class="listepiece manontable">
				<tr>
				<?php
				$reponse = $dbh->query('SELECT logement.id,nom
					FROM logement,users_logement 
					WHERE users_logement.id_user=\'' . $_SESSION['id'] . '\'
					AND logement.id=users_logement.id_logement');

				while($donnees = $reponse->fetch())
				{
					echo "<td class='manon'><div class='textbox'><span><a href='account.php?maison=" 
					. $donnees['id'] . "'>" . $donnees['nom'] . "</a></span></div></td>";
				} ?>
					<td class="manon"><div class="textbox">
					<span><a href="add_house.php">+</a></span>
					</td>	
				</tr>
			</table>
			<?php $reponse->closeCursor(); ?>
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
					<span><a href="add_room.php">+</a></span>
					</div>
					</td>
				</tr>
		</table>		
	</body>
</html>