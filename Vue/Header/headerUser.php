
	<link rel="stylesheet" href="../Styles/StyleHeader.css" />
	<p id="logoContainer" style="z-index:200"><img align="middle"id="logo2" style="z-index:200"src="../img/accueil_logo.png"></p>

		<header class="headersite" style="z-index:100">
			<table id = "barreAccueil" class="caption">
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="color:white; text-align:center; font-family:CenturyGothic">
						<?php echo "Connecté : " . getUsersPseudo($_SESSION['id'], $dbh)?>
					</td>
					<td>
					</td>
				</tr>
				<tr style="background-color:rgba(0,0,0,0.5)">
					<td id="itemAccueil" class="menuItem"><a href="action.php?action=goToHome&focus1=itemAccueil&focus2=&" style="text-decoration:none;color:inherit;">Accueil</a></td>
					<td id="itemSupport" class="menuItem"><a href="action.php?action=goToSupport&focus1=itemSupport&focus2=&" style="text-decoration:none;color:inherit;">Support</a></td>
					<td id='itemLogo' ><a href="../index.php" style="text-decoration:none;color:inherit;"></a></td>
					<td id='itemEspacePerso'class="menuItem"><a href="action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&" style="text-decoration:none;color:inherit;">Espace personnel</a></td>
					<td id='itemDeco'class="menuItemDeco">
						<form action="../Controleur/logout.php">
							<button class="deconnexion" type="submit">
								<img src="../img/deconnexionBlanc.png" alt="fr" style="height:40px;max-width:auto;" />
							</button>
						</form>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<a class="logoTagA" id="logoMaison" href="../Controleur/action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&">
							<img class="logoSub" src="../img/logoMaisonBlanc.png">
						</a>
						<a class="logoTagA" id="logoReglages" href="../Controleur/action.php?action=goToParametre&focus1=itemEspacePerso&focus2=logoReglages">
							<img class="logoSub" src="../img/reglageBlanc.png">
						</a>
						<a class="logoTagA" id="logoStats" href="../Controleur/action.php?action=goToStatistiques&focus1=itemEspacePerso&focus2=logoStats">
							<img class="logoSub" src="../img/logoStats.png">
						</a>
					</td>
					<td>
					</td>
				</tr>
				<tr id="ligneServices" style="display:none">
					<td>
					</td>
					<td id="levelSupport">
					</td>
				</tr>
			</table>
	</header>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script>
	var focus1 = <?php echo json_encode($_GET['focus1']); ?>;
	$('#' + focus1).addClass("menuItemSelected");
	<?php if(isset($_GET['focus2']) && $_GET['focus2']!="")
	{
		echo "var focus2 =" . json_encode($_GET['focus2']) . ";
		document.getElementById(focus2).style.borderColor='white'";
	}
	?>

	</script>
