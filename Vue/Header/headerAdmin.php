
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/StyleHeader.css" />
	</head>
			<header class="headersite">
				<p id="logoContainer"><img align="middle"id="logo2" src="http://puaud.eu/appmvc/img/accueil_logo.png"></p>
				<table id = "barreAccueil" class="caption">
					<tr style="background-color:rgba(0,0,0,0.5)">
						<td id="itemAccueil" class="menuItem"><a href="http://puaud.eu/appmvc/index.php" style="text-decoration:none;color:inherit;">Accueil</a></td>
						<td id="itemAdministration" class="menuItem"><a href="http://puaud.eu/appmvc/Vue/Admin/admin.php?focus1=itemAdministration&focus2=&" style="text-decoration:none;color:inherit;">Administration</a></td>
						<td id='itemLogo' ><a href="http://puaud.eu/appmvc/index.php" style="text-decoration:none;color:inherit;"></a></td>
						<td id='itemEspacePerso'class="menuItem"><a href="http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&" style="text-decoration:none;color:inherit;">Espace personnel</a></td>
						<td id='itemDeco'class="menuItemDeco">
							<form action="http://puaud.eu/appmvc/Controleur/logout.php">
								<button class="deconnexion" type="submit">
									<img src="http://puaud.eu/appmvc/img/deconnexionBlanc.png" alt="fr" style="height:40px;max-width:auto;" />
								</button>
							</form>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a class="logoTagA" id="logoMaison" href="http://puaud.eu/appmvc/Vue/EspacePerso/account.php?focus1=itemEspacePerso&focus2=logoMaison&">
								<img class="logoSub" src="http://puaud.eu/appmvc/img/logoMaisonBlanc.png">
							</a>
							<a class="logoTagA" id="logoReglages" href="http://puaud.eu/appmvc/Controleur/action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages">
								<img class="logoSub" src="http://puaud.eu/appmvc/img/reglageBlanc.png">
							</a>
						</td>
						<td>
						</td>
					</tr>
				</table>
			</header>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
			<script>
				var focus1 = <?php echo json_encode($_GET['focus1']); ?>;
				var focus2 = <?php echo json_encode($_GET['focus2']); ?>;
				$('#' + focus1).addClass("menuItemSelected");
				document.getElementById(focus2).style.borderColor="white";

			</script>
