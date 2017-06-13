<?php
session_start();
include('../../db_connect.php');
include("../EspacePerso/HeaderAdmin.php");
include("../../Modele/modele.php");

if($_SESSION['type']!=2)
{
  header("Location:http://puaud.eu/appmvc/Controleur/action.php?action=error&error=notAdmin");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleAdmin.css" />
        <title>Administration</title>
    </head>
        <body class="AdminBody">
        </body>
</html>

<?php
					echo "<table class='table1' border=1>
					<tr>
					<td><strong>ID</strong></td>
					<td><strong>Pseudo</strong></td>
					<td><strong>Prénom</strong></td>
					<td><strong>Nom</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Compte</strong></td>
					<td><strong>Admin</strong></td>
					<td><strong>Supp.</strong></td>
					</tr>";

$reponse = recupererLesUtilisateurs($dbh);

while($donnees = $reponse->fetch())
				{
					echo "<tr>
					<td>". $donnees['id'] ."</td>
					<td>". $donnees['pseudo'] ."</td>
					<td>". $donnees['nom'] ."</td>
					<td>". $donnees['prenom'] ."</td>
					<td>". $donnees['email'] ."</td>";
					if($donnees['type']==2){echo "<td>Admin</td>";}else if($donnees['type']==0)
					{echo "<td>Inactif</td>";}else if($donnees['type']==1){echo "<td>Actif</td>";}else{echo "<td>Secondaire</td>";}
					echo "<td style='text-align:center'><a href='http://puaud.eu/appmvc/Controleur/promouvoir.php?id=".$donnees['id']."'><img src='../../img/fleche_haut.png'
					alt='Promouvoir' width=20px height=auto /></a><a href='http://puaud.eu/appmvc/Controleur/action.php?action=depromouvoir&id=".$donnees['id']."'><img src='../../img/fleche_bas.png'
					alt='Promouvoir' width=20px height=auto /></a></td>
					<td style='text-align:center'><a href='http://puaud.eu/appmvc/Controleur/supprimer_compte.php?id=".$donnees['id']."'><img src='../../img/croix.png'
					alt='Supprimer' width=20px height=auto /></a></td>
					</tr>";
				}
				echo "</table>";

$reponse = recupererLesCapteurs($dbh);

echo "<br /><br /><table class='table2' border=1>
<tr>
<td><strong>Type d'appareil</strong></td>
<td><strong>Numéro de série</strong></td>";
while($donnees = $reponse->fetch())
{
	echo "<tr>
	<td>". $donnees['nom'] ."</td>
	<td>". $donnees['numeroModele'] ."</td>";
}
echo "</table>";
?>
<div class=op>
<h2 class="titre1">Ajouter un nouveau type d'appareil</h2>
</div>
 <form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutTypeAppareil" method="post">
 	<div align="center">
	<label class=PSG for="Type de capteur"> Type de capteur :</label><input required class="form" type="text" name="type" size=40 /><br />
	<label class=PSG for="Numéro de modèle"> Numéro de modèle :</label><input required class="form" type="text" name="numeromodele" size=40 /><br />
	<label class=PSG for="Numéro de modèle"> Type de valeur :</label>
	<select name="typeinput">
		<optgroup label="Capteur">
			<option value="0">Aucune</option>
		</optgroup>
		<optgroup label="Effecteur">
			<option value="number">Numérique</option>
			<option value="checkbox">Binaire</option>
		</optgroup>
	</select><br />
	<button class="add" type="submit">Ajouter</button>
	</div>
</form>
