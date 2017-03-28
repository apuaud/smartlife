<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css"  />

	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<table id="login" align="center">
				<tr>
					<td id="closeForm" onclick="hideFormulaire()"><img src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" /></td>
				</tr>
				<tr>
					<td id="itemID" ><input type="text" name="login" placeholder="Identifiant" size="30"/></td>
				</tr>
				<tr>
					<td id="itemPassword" ><input type="password" name="motdepasse" placeholder="Mot de passe" size="30" /></td>
				</tr>
				<tr>
					<td id='buttonConnexion'><a href="#"><img src="https://puu.sh/uZXbq/764f87f8b1.png" border="0" alt="Connexion" title="Connexion" width="190px"/></a></td>
				</tr>
				<tr>
					<td id='itemLostPassword'  align="center"><a href="#" style="color:inherit;">Mot de passe oublié</a></td>
				</tr>
				<tr>
					<td id='itemRegister'><a href="#"><img src="https://puu.sh/uZXgE/0068185a12.png" border="0" alt="Inscription" title="Inscription" width="190px" /></a></td>
				</tr>
			</table>
		</div>

		<div class="container" id="accueil" >
			<p class = "slogan">Your Home | Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="img/accueil_logo.png"></p>

			<img class ="imgBackground"src="img/accueil.png" style="position:relative; z-index=4;">

			<table id = "barreAccueil" class="caption">
				<tr>
					<td id="itemAccueil" class="menuItem">Home</td>
					<td id="itemPresentation" class="menuItem">Services</td>
					<td id='itemLogo' ></td>
					<td id='itemAccount'class="menuItem" onclick="displayFormulaire()">Account</td>
					<td id='itemAide'class="menuItem"><a href="/app/contact.php" style="text-decoration:none;color:inherit;">Help</a></td>
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
			<img class ="imgBackground" src="img/presentation1.jpg">

		</div>


		<div class="container" id="presentation2">
			<img class ="imgBackground" src="img/presentation2MindFuck.png">
		</div>

		<div class="container" id="presentation3">
			<img class ="imgBackground" src="img/presentation3bis.png">
		</div>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
		</script>
		<script>

			var imgs = document.getElementsByClassName("imgBackground");
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

      function displayFormulaire()
      {

      	formulaire.style.display="block";
      }

      function hideFormulaire()
      {
				imgId=lastImgId;
      	formulaire.style.display="none";
				if(lastImgId==0)
				{
					changeToWhite(0);
				}
				else
				{
					changeToWhite(1);
				}
      }

		</script>

	</body>
</html>
