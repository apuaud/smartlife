<?php
session_start();
include("../Vue/Header/headerAdmin.php");

if($_SESSION['type']!=2)
{
  header("Location:../Controleur/action.php?action=error&error=notAdmin");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Styles/StyleAdmin.css" />
        <title>Administration</title>
    </head>
        <body class="AdminBody" onload="resizeDiv()" onresize="resizeDiv()">
        </body>
</html>

<div class="noOverflow spaceForNavBar">
<div class="slogan">Liste des utilisateurs</div>

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
					<td><strong>Suppr.</strong></td>
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
					echo "<td style='text-align:center'><a href='action.php?action=promouvoir&id=".$donnees['id']."'><img src='../img/fleche_haut.png'
					alt='Promouvoir' width=20px height=auto /></a><a href='../Controleur/action.php?action=depromouvoir&id=".$donnees['id']."'><img src='../img/fleche_bas.png'
					alt='Promouvoir' width=20px height=auto /></a></td>
					<td style='text-align:center'><a href='action.php?action=supprimerCompteUtilisateur&id=".$donnees['id']."'><img src='../img/croix.png'
					alt='Supprimer' width=20px height=auto /></a></td>
					</tr>";
				}
				echo "</table>";

$reponse = recupererLesCapteurs($dbh);
?>

<div class="slogan">Liste des appareils</div>

<?php
echo "<table class='table2' border=1>
<tr>
<td><strong>Type d'appareil</strong></td>
<td><strong>Numéro de série</strong></td>
<td><strong>Suppr.</strong></td>";
while($donnees = $reponse->fetch())
{
	echo "<tr>
	<td>". $donnees['nom'] ."</td>
	<td>". $donnees['numeroModele'] ."</td>
	<td style='text-align:center'><a href='action.php?action=supprimerTypeAppareil&id=".$donnees['id']."'><img src='../img/croix.png'
	alt='Supprimer' width=20px height=auto /></a></td>";
}
echo "</table>";
?>

<div class="slogan">Ajouter un appareil</div>
 <form action="../Controleur/action.php?action=validerAjoutTypeAppareil" method="post">
 	<div align="center">
	<input required class="form" type="text" name="type" size=40 placeholder="Type d'appareil"/><br />
  <input required class="form" type="text" name="numeromodele" size=40 placeholder="Numéro de série"/><br />
	<select required name="typeinput">
    <option value="">Valeur de renvoi</option>
		<optgroup label="Capteur">
			<option value="0">Aucune</option>
		</optgroup>
		<optgroup label="Effecteur">
			<option value="number">Numérique</option>
			<option value="checkbox">Binaire</option>
		</optgroup>
	</select><br />
	<button class="buttonsubmit" type="submit">Ajouter</button>
	</div>
</form>

<div class="slogan">Modifier les conditions d'utilisation et les mentions légales</div>
<div align="center">

<a href="action.php?action=goToCGUAdmin"><button class="buttonsubmit" type="submit" style="margin-right:20px">Conditions d'utilisation</button></a>
<a href="action.php?action=goToMLAdmin"><button class="buttonsubmit" type="submit">Mentions légales</button></a>
</div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
  function resizeDiv()
  {
    var heightOfWindow = $(window).height();
    var marginTop = 200;
    var noOverflow = document.getElementsByClassName('noOverflow')[0];
    noOverflow.style.height = (heightOfWindow-marginTop)+"px";
  }

</script>
