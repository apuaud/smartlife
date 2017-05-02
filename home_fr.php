<?php
session_start();
setcookie('langue', 'fr', time() + 365*24*3600, null, null, false, true);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css"  />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<?php include_once("analyticstracking.php") ?>
		<div id="formulaire">
			<form action="connexion.php" method="post">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
				</tr>
				<tr>
					<td id="itemID" ><input id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword"><input id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="#" style="color:white" >Mot de passe oublié ?</a></td>
				</tr>

				<tr>
					<td id='itemRegister'><button class="buttonsubmit" onclick="window.location.href='register.html'">S'inscrire</button></a></td>
				</tr>
			</table>
			</form>
		</div>
		<p class="langueselect">
			<a href="languefr.php">
				<button class="buttonlangue" name="fr">
					<img src="http://www.oneturf.fr/images/fr.gif" alt="fr" style="height:15px;max-width:auto;" />
			</a>
				</button> | 
			<a href="langueen.php">
				<button class="buttonlangue" name="en">
					<img src="http://www.oneturf.fr/images/gb.gif" alt="en" style="height:15px;max-width:auto;" />
				</button>
			</a>
		</p>
		<div class="container" id="accueil" >
			<p class = "slogan">Your Home | Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="img/accueil_logo.png"></p>

			<img class ="imgBackground"src="img/accueil.png" style="position:relative; z-index=4;">

			<table id = "barreAccueil" class="caption">
				<tr>
					<td id="itemAccueil" class="menuItem">Accueil</td>
					<td id="itemPresentation" class="menuItem">Présentation</td>
					<td id='itemLogo' ></td>
					<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Espace personnel</td>
					<td id='itemAide'class="menuItem"><a href="/app/contact.php" style="text-decoration:none;color:inherit;">Support</a></td>
				</tr>
				<tr id="ligneServices">
					<td></td>
					<td id="levelServices"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>

		<div class="container " id="presentation">
			<p class = "slogan">Your Home | Your Future</p>
			<img class ="imgBackground"  src="img/presentation1.jpg">

		</div>


		<div class="container" id="presentation2">
			<img class ="imgBackground" src="img/presentation2MindFuckRogne.png">
		</div>

		<div class="container" id="presentation3">
			<img class ="imgBackground" src="img/presentation3.jpg">
		</div>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script>

			var imgs = document.getElementsByClassName("imgBackground");
			var scroll=true;
			var imgId;
			var lastImgId;
			var levelServices = document.getElementById("levelServices");
			var formulaire = document.getElementById('formulaire');
			var ligneServices=document.getElementById('ligneServices').getElementsByTagName('td');

			function onLoadFunction()
			{
				for(var i = 0 ; i < imgs.length ; i ++)
				{
					imgs[i].classList.remove('zoom');
				}
				imgs[0].classList.add('zoom');
				imgId=0;
				lastImgId=0;
				ligneServices[0].style.backgroundColor="white";
				$('html, body').animate(
				{
						scrollTop: $("#accueil").offset().top
				},1);
				return;
			}


			function zoom(imgNum)
			{
				setTimeout(function()
				{
					for(var i= 0 ; i < imgs.length ; i++)
					{
						if(imgNum==i)
						{
							imgs[i].classList.add('zoom');
						}
						else
						{
							imgs[i].classList.remove('zoom');
						}
					}
				},500);

			}

			function changeToWhite(imgId)
			{

				for(var i = 0 ; i < ligneServices.length ; i++)
				{
					if(i==imgId)
					{
						ligneServices[i].style.backgroundColor="white";
					}
					else
					{
						ligneServices[i].style.backgroundColor="transparent";
					}
				}

			}
			$(document).ready(function ()
			{
          $("#itemPresentation").click(function ()
          {
          	changeToWhite(1);
          	zoom(1);
						imgId=1;
              $('html, body').animate(
              {
                  scrollTop: $("#presentation").offset().top
              }, 500);
              setTimeout(function(){imgId=1;},500);
          });
          $("#logo2").click(function ()
          {
          	zoom(0);
          	changeToWhite(0);
						imgId=0;
              $('html, body').animate(
              {
                  scrollTop: $("#accueil").offset().top
              }, 500);
              setTimeout(function(){imgId=0;},500);
          });

          $("#itemAccueil").click(function ()
          {
          	zoom(0);
          	changeToWhite(0);
						imgId=0;
          	levelServices.style.backgroundColor='transparent';
              $('html, body').animate(
              {
                  scrollTop: $("#accueil").offset().top
              }, 500);
              setTimeout(function(){imgId=0;},500);
          });

          $("#itemLogo").click(function ()
          {
          	zoom(0);
          	changeToWhite(0);
						imgId=0;
              $('html, body').animate(
              {
                  scrollTop: $("#accueil").offset().top
              }, 500);
              setTimeout(function(){imgId=0;},500);
          });

          $("#itemAccount").click(function ()
          {
						lastImgId=imgId;
          	changeToWhite(3);
              setTimeout(function(){imgId=0;},500);
          });
      });

			var scrollToId;
			var lastTime=0;

      var body = document.getElementsByTagName('body')[0];

      window.addEventListener("wheel",function(e){myFunction(e)});


     	function myFunction(e)
      {
				if(scroll==true)
				{
					var now = new Date().getTime();
	      	if(now-lastTime<1000)
	      	{
	      		return;
	      	}
	      	else
	      	{
	      		lastTime=now;
	      		if(imgId==0)
	        	{
	        		if(e.deltaY>0)
	        		{

	        			zoom(1);
	        			changeToWhite(1);
								imgId=1;
	        			scrollToId="#presentation";
	        			setTimeout(function(){imgId=1;},500);
	        		}
							else {
								return;
							}
	        	}
	        	else if(imgId==1)
	        	{

	        		if(e.deltaY>0)
	        		{
	        			zoom(2);
	        			changeToWhite(1);
								imgId=2;
	        			scrollToId="#presentation2";
	        			setTimeout(function(){imgId=2;},500);
	        		}
	        		else
	        		{
	        			zoom(0);
	        			changeToWhite(0);
	        			scrollToId="#accueil";
								imgId=0;
	        			setTimeout(function(){imgId=0;},500);
	        		}
	        	}
	        	else if(imgId==2)
	        	{
	        		if(e.deltaY>0)
	        		{
	        			zoom(3);
								imgId=3;
	        			changeToWhite(1);
	        			scrollToId="#presentation3";
	        			setTimeout(function(){imgId=3;},500);
	        		}
	        		else
	        		{
	        			zoom(1);
								imgId=1;
	        			changeToWhite(1);
	        			scrollToId="#presentation";
	        			setTimeout(function(){imgId=1;},500);
	        		}
	        	}
	        	else
	        	{
	        		if(e.deltaY<0)
	        		{
	        			zoom(2);
								imgId=2;
	        			changeToWhite(1);
	        			scrollToId="#presentation2";
	        			setTimeout(function(){imgId=2;},500);
	        		}

	        	}
	        	$('html, body').animate(
	              {
	                  scrollTop: $(scrollToId).offset().top
	              }, 500);
	      	}
	      }
				else {
					return;
				}
			}


      function displayFormulaire()
      {
				scroll=false;
      	formulaire.style.display="block";
				document.getElementById('idInput').focus();
      }
      function hideFormulaire()
      {
				scroll=true;
				imgId=lastImgId;
      	formulaire.style.display="none";
				idInput.value="";
				passwordInput.value="";
				if(lastImgId==0)
				{
					changeToWhite(0);
				}
				else
				{
					changeToWhite(1);
				}
      }

			$(document).keyup(function(e)
			{
			     if (e.keyCode == 27)
					 {
						 hideFormulaire();
					 }
			});


		</script>

	</body>
</html>
