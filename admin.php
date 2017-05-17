<?php
session_start();
include('db_connect.php');
$reponse = $dbh->query('SELECT id,pseudo,nom,prenom,email,type 
						FROM users
						LIMIT 0 , 50');
					echo "<table border=1>
					<tr>
					<td><strong>ID</strong></td>
					<td><strong>Pseudo</strong></td>
					<td><strong>Prénom</strong></td>
					<td><strong>Nom</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Compte</strong></td>
					<td><strong>Adm.</strong></td>
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
					echo "<td style='text-align:center'><img src='https://image.freepik.com/icones-gratuites/petite-fleche-vers-le-haut_318-27116.jpg' 
					alt='Promouvoir' width=20px height=auto /></td>
					<td style='text-align:center'><img src='http://image.noelshack.com/fichiers/2017/20/1494968356-fermer-croix-supprimer-erreurs-sortie-icone-4368-1282.png' 
					alt='Promouvoir' width=20px height=auto /></td>
					</tr>";
				}
				echo "</table>";

$reponse = $dbh->query('SELECT nom,numeroModele 
						FROM type_appareil
						LIMIT 0 , 50');
echo "<br /><br /><table border=1>
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
<h2>Ajouter un nouveau type d'appareil</h2>
 <form action="http://puaud.eu/appmvc/Controleur/action.php?action=validerAjoutTypeAppareil" method="post">
	<input type="text" name="type" placeholder="Type de capteur" size=40 /><br />
	<input type="text" name="numeromodele" placeholder="Numéro de modèle" size=40 /><br />
	<button type="submit">Ajouter</button>
</form>
		