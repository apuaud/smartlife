<?php
$link = ($_GET['action']=='goToHome') ? '' : 'goToHome()';
 ?>

<p id="logoContainer"><img align="middle"id="logo2" src="../img/accueil_logo.png"></p>
<table id = "barreAccueil" class="caption">
	<tr style="background-color:rgba(0,0,0,0.5)">
		<td id="itemAccueil" class="menuItem" onclick="<?php echo $link; ?>">Accueil</a></td>
		<td id="itemPresentation" class="menuItem" onclick="<?php echo $link; ?>">Présentation</td>
		<td id='itemLogo' class="menuItem" ></td>
		<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Espace personnel</td>
		<td id='itemAide'class="menuItem" onclick="goToSupport()">Support</td>
	</tr>
	<tr id="ligneServices">
		<td></td>
		<td id="levelServices"></td>
		<td></td>
		<td></td>
		<td id="levelSupport"></td>
	</tr>
</table>
