<?php ob_clean() ?>
<div id="formulaire">
			<form action="http://puaud.eu/appmvc/Controleur/action.php?action=connexion" method="post">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
				</tr>
				<tr>
					<td id="itemID" ><input id="idInput" type="text" name="login" placeholder="Pseudo" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword"><input id="passwordInput" type="password" name="motdepasse" placeholder="Mot de passe" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToOublieMotDePasse" style="color:white" >Mot de passe oublié ?</td>
				</tr>
				</form>
				<tr>
					<td id='itemRegister' style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Inscription</div></td>
				</tr>
			</table>
		</div>
<?php $contenuEn = ob_get_clean() 
	include('gabaritFr.php')
?>