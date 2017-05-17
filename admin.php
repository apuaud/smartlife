<?php
session_start();
include('db_connect.php');
include("Vue/EspacePerso/HeaderAdmin.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Styles/StyleAdmin.css" />
        <title>Administration</title>
        <body class="AdminBody">	
        </body>
    </head>
</html>
<?php
$reponse = $dbh->query('SELECT id,pseudo,nom,prenom,email,type 
						FROM users
						LIMIT 0 , 50');
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
					echo "<td style='text-align:center'><a href='Controleur/promouvoir.php?id=".$donnees['id']."'><img src='img/fleche_haut.png' 
					alt='Promouvoir' width=20px height=auto /></a><a href='Controleur/depromouvoir.php?id=".$donnees['id']."'><img src='img/fleche_bas.png' 
					alt='Promouvoir' width=20px height=auto /></a></td>
					<td style='text-align:center'><a href='Controleur/supprimer_compte.php?id='".$donnees['id']."'><img src='img/croix.png' 
					alt='Supprimer' width=20px height=auto /></a></td>
					</tr>";
				}
				echo "</table>";

$reponse = $dbh->query('SELECT nom,numeroModele 
						FROM type_appareil
						LIMIT 0 , 50');
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
	<label class=PSG for="Type de capteur"> Type de capteur :</label><input class="form" type="text" name="type" size=40 /><br />
	<label class=PSG for="Numéro de modèle"> Numéro de modèle:</label><input class="form" type="text" name="numeromodele" size=40 /><br />
	<button class="add" type="submit">Ajouter</button>
	</div>
</form>
		