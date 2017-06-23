<?php
session_start();
include("../db_connect.php");
include('../Modele/modele.php');
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="../Styles/styleespaceperso.css"/>
			<title>Mon espace personnel</title>
		</head>

		<body class="manonbody" onload="resizeLists()" onresize="resizeLists()">

			<div class='formulaire' id='formulaireAjoutMaison'>
				<form action="action.php?action=validerAjoutMaison" method='post'>
				<table id='login' align='center'>
					<tr >
						<td id='closeForm' onclick='hideFormulaire()'><img id='cross' src='http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png' alt='Fermer'  /></td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" name="nom-maison" pattern=".{1,}" title="Doit contenir au moins un caractère" placeholder="Nom de la maison"  />
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" name="adresse" pattern=".{1,}" title="Doit contenir au moins un caractère" placeholder="Adresse"  />
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" pattern="[0-9]{5}" title="5 chiffres"name="codepostal" placeholder="Code postal"  />
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" pattern="[a-zA-Z]{1,}" title="Ne peut conternir que des lettres" name="ville" placeholder="Ville"  />
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" name="pays" pattern="[a-zA-Z]{1,}" title="Ne peut conternir que des lettres" placeholder="Pays"  />
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonenombre" type="number" name="superficie" placeholder="Superficie"  />
							<input required class="zonenombre" type="number" name="nbhab" placeholder="Nb habitants"  />
						</td>
					</tr>
					<tr>
						<td style="text-align:center">
							<button class='buttonsubmit' type="submit"> Ajouter </button>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<div class='formulaire' id='formulaireAjoutPiece'>
			<form action="action.php?action=validerAjoutPiece&maison=<?php echo $_GET['maison'] ?>" method="post"/>
				<table id='login' align='center'>
					<tr >
						<td id='closeForm' onclick='hideFormulaire()'><img id='cross' src='http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png' alt='Fermer'  /></td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonetexte" type="text" name="nom-piece" placeholder="Nom de la pièce"/>
						</td>
					</tr>
					<tr>
						<td class = "border-bottom">
							<input required class="zonenombre" type="number" name="etage" placeholder="Etage"/>
							<input required class="zonenombre" type="number" name="superficie" placeholder="Superficie"/>
						</td>
					</tr>
					<tr>
						<td style="text-align:center">
							<button class='buttonsubmit' type="submit"> Ajouter </button>
						</td>
					</tr>
				</table>
			</form>
		</div>

			<?php
			if(isset($_GET['maison']))
			{
				$houseBelongsToUser = houseBelongsToUser($_SESSION['id'], $_GET['maison'], $dbh);
			}
			if(isset($_GET['piece']))
			{
				$roomBelongsToHouse = roomBelongsToHouse($_GET['maison'],$_GET['piece'],$dbh);
			}
			if(isset($_GET['maison']) && isset($_GET['piece']) && $houseBelongsToUser && $roomBelongsToHouse)
			{
				$listeCapteurPiece = recupererLesCapteursDeLaPiece($_GET['piece'], $dbh);
				$listeEffecteurPiece = recupererLesEffecteursDeLaPiece($_GET['piece'], $dbh);

				echo "<div class='formulaire scroll-verti'>
				<table id='login' align='center'>
					<tr>
						<td id='closeForm' onclick='hideFormulaire()''><img id='cross' src='http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png' alt='Fermer'  /></td>
					</tr>
					<form action='action.php?action=updateCaptors&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "' method='post'>
					";

						while($capteur = $listeCapteurPiece -> fetch())
						{
							if($capteur['nom']=="Température"){$unite=" °C";}else if($capteur['nom']=="Humidité"){$unite=" %";}else{$unite="";}
							echo "<tr>
								<td class='nomCapteur'>" . $capteur['nom'] . "</td>";

							echo "<td style='font-size:30px;'>" . $capteur['etatActuel'] . "
											<span style='font-size:30px'>". $unite ."
											<a class='floatRight' href='supprimer_capteurpiece.php?id=".$capteur['id']."&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "'><img src='../img/croix.png'
											alt='Supprimer'  width=20px height=auto /></a>
											<a class='floatRight' href='action.php?action=goToStatistiques&idCapteur=" . $capteur['id'] . "'><img src='https://www.alterjustice.org/images/ico/icone_web-statistiques-coul.svg'
											alt='Statistique' style='margin-left:10px' width=20px height=auto /></a>
										</td>";
						}

						while($effecteur = $listeEffecteurPiece -> fetch())
						{
							echo "<tr>
								<td class='nomCapteur'>" . $effecteur['nom'] . "</td>";
								if($effecteur['type_input'] == "number" AND $effecteur['nom'] == "Climatiseur")
								{
									echo "<td><input type='" . $effecteur['type_input'] ."' name='" . $effecteur['nom'] . "' value = '" . $effecteur['etatActuel'] ."' min='15' max='30' placeholder='30' size='30'/><span style='font-size:30px'>°C</span>
														<a class='floatRight' href='supprimer_capteurpiece.php?id=".$effecteur['id']."&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "'><img src='../img/croix.png'
														alt='Supprimer'  width=20px height=auto /></a>
												</td>
							</tr>";
								}
								else if($effecteur['type_input'] == "number")
								{
									echo "<td><input type='" . $effecteur['type_input'] ."' name='" . $effecteur['nom'] . "' value = '" . $effecteur['etatActuel'] ."' min='0' max='100' placeholder='30' size='30'/><span style='font-size:30px'>%</span>
												<a class='floatRight' href='supprimer_capteurpiece.php?id=".$effecteur['id']."&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "'><img src='../img/croix.png'
												alt='Supprimer'  width=20px height=auto /></a>
												</td></tr>";
								}
								else
								{
									if($effecteur['etatActuel']=='true')
									{
										echo "<td><input type='" . $effecteur['type_input'] ."' name='" . $effecteur['nom'] . "' checked = '" . $effecteur['etatActuel'] ."' placeholder='30' size='30'/>
													<a class='floatRight' href='supprimer_capteurpiece.php?id=".$effecteur['id']."&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "'><img src='../img/croix.png'
														alt='Supprimer'  width=20px height=auto /></a>
													</td></tr>";
									}
									else
									{
										echo "<td><input type='" . $effecteur['type_input'] ."' name='" . $effecteur['nom'] . "' placeholder='30' size='30'/>
													<a class='floatRight' href='supprimer_capteurpiece.php?id=".$effecteur['id']."&maison=" . $_GET['maison'] . "&piece=" . $_GET['piece'] . "'><img src='../img/croix.png'
													alt='Supprimer'  width=20px height=auto /></a>
													</td></tr>";
									}
								}
						}
						if(isset($_GET['ajoutCapteur']))
						{
							echo "
							<tr>
								<td>
								<SELECT name='nomcapteur' id='selectAjoutCapteur' dir='rtl'>";
										echo "<OPTION value=''>Type appareil";
										$reponse = $dbh->query('SELECT ALL id,nom,numeroModele,type_input
												FROM type_appareil');
										while($donnees = $reponse->fetch())
										{
											if(isset($_GET['idAppareil'])&&($donnees['id']==$_GET['idAppareil']))
											{
												echo "<OPTION selected value=" . $donnees['id']. ">" . $donnees['nom'];
											}
											else {
												echo "<OPTION value=" . $donnees['id']. ">" . $donnees['nom'] ;
											}
										}
										$reponse->closeCursor();
							$numeroSerie = (isset($_GET['numeroSerie'])&&($_GET['numeroSerie']!='')) ? $_GET['numeroSerie'] : 'Numéro de série';
							echo "
									</SELECT>
								</td>
								<td>
									<input required id='numeroSerieInput' class='zonetexte2'type='text' name='numeroserie' placeholder='" . $numeroSerie . "' size=70/>
									<a id='addCapteur' class='floatRight'>
										<img src='../img/plus.png' alt='Ajouter' width=20px height=auto />
									</a>
								</td></tr>";
						}

						echo
						"
						<tr>
							<td style='text-align:center'><button class='buttonsubmit' type='submit' href='action.php?action=updateCaptors&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "'>Envoyer</button></td>
							<td style='text-align:right'><a href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&ajoutCapteur=true&piece=" . $_GET['piece'] . "&maison=" .$_GET['maison'] . "'><div class='divsubmit'>Ajouter Capteur</div></a></td>
						</tr>
					</table>
					</form>
				</div>";
			}
			else if (isset($_GET['maison']) && $houseBelongsToUser==false)
			{
				echo "<script> document.location.href='action.php?action=error&error=notYourHouse';</script>";
			}
			else if (isset($_GET['maison'])&& isset($_GET['piece']) && $roomBelongsToHouse==false)
			{
				echo "<script> document.location.href='action.php?action=error&error=notYourRoom';</script>";
			}
			?>
		<?php

		if(isset($_SESSION['id']))
		{
			if($_SESSION['type']==1 || $_SESSION['type']==3 || $_SESSION['type']==4)
			{
				include("../Vue/Header/headerUser.php");
			}
			else if($_SESSION['type']==2)
			{

				include("../Vue/Header/headerAdmin.php");
			}
		}

		if(!isset($_SESSION['id']) || $_SESSION['type']==0)
		{
			echo "<script> document.location.href='action.php?action=error&error=notConnected';</script>";
		}

		include_once("../analyticstracking.php"); ?>

		<div class='textbox fixed' onclick="display('formulaireAjoutMaison')">+</div>

		<div class='spaceForPlus' id='ScrollZone1'>
			<div class='flecheGauche fixed' onmouseover="ScrollLeft(5, 1)" onmouseout="clearScroll(SL)"><</span>
			</div>
			<table class="listepiece">
				<tr>
				<?php
				$maisonSelectionnee = recupererLesMaisonsDeLUtilisateur($_SESSION['id'], $dbh);

				while($donnees = $maisonSelectionnee->fetch())
				{
					if(isset($_GET['maison']) && ($_GET['maison']==$donnees['id']))
					{
						$selectedHouse = "selectedHouse";
						echo "<td><a href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison="
						. $donnees['id'] . "'><div class=" . $selectedHouse . ">" . $donnees['nom'] . "</div></a></td>";
					}

				}

				$maisonsNonSelectionnees = recupererLesMaisonsDeLUtilisateur($_SESSION['id'], $dbh);

				while($donnees = $maisonsNonSelectionnees->fetch())
				{
					if(!isset($_GET['maison']) || ($_GET['maison']!=$donnees['id']))
					{
						$selectedHouse = "textbox";
						echo "<td><a href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison="
						. $donnees['id'] . "'><div class=" . $selectedHouse . ">" . $donnees['nom'] . "</div></a></td>";
					}

				}

				?>
				</tr>
			</table>

		</div>
		<div class='flecheDroite'  onmouseover="ScrollRight(5, 1)" onmouseout="clearScroll(SR)">></span>
		</div>

			<?php $maisonsNonSelectionnees->closeCursor();
						$maisonSelectionnee->closeCursor();?>

		<?php
		if(isset($_GET['maison']) && $houseBelongsToUser){
			echo "<div class='textbox fixed' onclick=\"display('formulaireAjoutPiece')\">+</div>
						<div class='spaceForPlus' id='ScrollZone2'><table class='listepiece'><tr>
						<div class='flecheGauche fixed' onmouseover='ScrollLeft(5, 2)' onmouseout='clearScroll(SL)'><</div>";
				$reponse = recupererLesPiecesDeLaMaison($_GET['maison'], $dbh);

				while($donnees = $reponse->fetch())
				{
					echo "<td><div class='room dropdown' onmouseover='setPositionAndSize.call(this, event)'>
					<span>" . $donnees['nom'] ."</span>
					<div class='dropdown-content'><ul>
							<div class='liste-left'>";

					$reponse2 = recupererLesCapteursDeLaPiece($donnees['id'], $dbh);
					while($donnees2 = $reponse2->fetch())
					{
						echo "<li>".$donnees2['nom']."</li>";
					}

					$reponse3 = recupererLesEffecteursDeLaPiece($donnees['id'], $dbh);
					while($donnees3 = $reponse3->fetch())
					{
						echo "<li>".$donnees3['nom']."</li>";
					}

					echo "</div><div class='liste-right'>";

					$reponse4 = recupererLEtatDesCapteursDeLaPiece($donnees['id'], $dbh);
					while($donnees4 = $reponse4->fetch())
					{
						if($donnees4['nom']=="Mouvement")
						{
							if($donnees4['etatActuel']==0)
							{
								echo "<li>X</li>";
							}
							else {
								echo "<li>✓</li>";
							}
						}
						else
						{
							echo "<li>" . $donnees4['etatActuel'] . "</li>";
						}
					}

					$reponse5 = recupererLEtatDesEffecteursDeLaPiece($donnees['id'], $dbh);
					while($donnees5 = $reponse5->fetch())
					{
						if($donnees5['nom']=="Volets")
						{
							if($donnees5['etatActuel']=="false")
							{
								echo "<li>X</li>";
							}
							else {
								echo "<li>✓</li>";
							}
						}
						else {
							echo "<li>" . $donnees5['etatActuel'] . "</li>";
						}
					}
					echo "</div><li style='text-align:right;'><a href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison=". $_GET['maison'] ."&piece=" . $donnees['id'] . "'>
					<img class='minilogo' src='../img/reglage.png' onclick='displaySetCaptors()'></a></li>
						</ul></div>
					</div>
					</td>";
				}
				echo"</tr></table></div><div class='flecheDroite' onmouseover='ScrollRight(5, 2)' onmouseout='clearScroll(SR)'>></span>
				</div>";
			}
		else if(isset($_GET['maison']) && !$houseBelongsToUser)
		{
			header('Location: ../Vue/Error/error.php?error=notYourHouse');
		} ?>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

			<?php
				if(isset($_GET['maison'])&&isset($_GET['piece'])&&isset($_GET['ajoutCapteur']))
				{
					include("listenToTypeAppareilJS.php");
				}
				if(isset($_GET['maison'])&&isset($_GET['piece'])&&isset($_GET['ajoutCapteur'])&&isset($_GET['idAppareil']))
				{
					include("listenToNumeroSerieJS.php");
				}
			 ?>
			<script>

				function resizeLists()
				{
					var lists = document.getElementsByClassName('spaceForPlus');
					var widthWindow = $(window).width();
					var spaceForPlus = 240;
					var spaceForFlecheDroite = 20;
					var flechesDroite = document.getElementsByClassName('flecheDroite');
					var widthOfDiv = widthWindow-spaceForPlus-spaceForFlecheDroite;
					var marginLeftOfArrow = (widthWindow-spaceForPlus-spaceForFlecheDroite+10);

					for(var i = 0 ; i < lists.length ; i++)
					{
						lists[i].style.width = widthOfDiv+"px";
						$(".flecheDroite").css('display', 'inline-block');
					}
				}

				function setPositionAndSize(e)
				{
					var affichageCapteur = this.getElementsByClassName('dropdown-content')[0];
					affichageCapteur.style.width = (this.offsetWidth-10) + 'px';
					affichageCapteur.style.height = (this.offsetHeight-10) + 'px';
				}
				var formulaires = document.getElementsByClassName('formulaire');

				function hideFormulaire()
				{
					for(var i = 0 ; i < formulaires.length ; i++)
					{
						formulaires[i].style.display="none";
					}
				}

				var SR;
				var SL;

				function display(id)
				{
					document.getElementById(id).style.display = 'block';
				}
				function SRight(numero)
				{
					document.getElementById('ScrollZone' + numero).scrollLeft+=2;
				}

				function SLeft(numero){
				document.getElementById('ScrollZone' + numero).scrollLeft-=2;
				}

				function ScrollRight(Speed,numero){
				SR = setInterval('SRight(' + numero + ')',Speed);
				}

				function ScrollLeft(Speed, numero){
				SL = setInterval('SLeft(' + numero + ')',Speed);
				}

				function clearScroll(way){
				clearInterval(way)}

			</script>
	</body>
</html>
