<form action="http://puaud.eu/appmvc/Controleur/action.php?action=connexion" method="post">
	<table id="login" align="center">
		<tr>
			<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer"  /></td>
		</tr>
		<tr>
			<td id="itemID" ><input id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
		</tr>
		<tr>
			<td id="itemPassword"><input id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
		</tr>
		<tr>
			<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Log in</button></td>
		</tr>
		<tr>
			<td id='itemLostPassword'  align="center"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToOublieMotDePasse" style="color:white" >
			Forgot password ?</td>
		</tr>

		<tr>
			<td id='itemRegister' style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Create new account</div></td>
		</tr>
	</table>
</form>