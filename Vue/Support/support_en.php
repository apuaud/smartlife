<?php
if(isset($_SESSION['id']))
{
	$functionCalledOnAccountClick = "callAccount()";
}
else
{
	$functionCalledOnAccountClick ="displayFormulaire()";
} ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://puaud.eu/appmvc/Styles/support.css" />
        <title>FAQ</title>
    </head>
    <body onload="onLoadFunction()" onresize="setFontSize()">
			<div id="formulaire">
				<form action="http://puaud.eu/appmvc/Controleur/action.php?action=connexion" method="post">
				<table class="login" align="center">
					<tr>
						<td id="closeForm" onclick="hideFormulaire()"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer"  /></td>
					</tr>
					<tr>
						<td id="itemID" ><input required id="idInput" type="text" name="login" placeholder="ID" size="30"/></td>
					</tr>
					<tr>
						<td id="itemPassword"><input required id="passwordInput" type="password" name="motdepasse" placeholder="Password" size="30" /></td>
					</tr>
					<tr>
						<td id='buttonConnexion'><button class="buttonsubmit" type="submit">Connexion</button></td>
					</tr>
					<tr>
						<td id='itemLostPassword'  align="center"><a href="http://puaud.eu/appmvc/Controleur/action.php?action=goToOublieMotDePasse" style="color:white" >Mot de passe oublié ?</td>
					</tr>

					<tr>
						<td id='itemRegister' style="text-align:center"><div class="buttonsubmit" onclick="callRegistration()">Inscription</div></td>
					</tr>
				</table>
				</form>
			</div>
      <b class="question slogan" onclick="displayDescriptionNum(this, 0)">How do I create an account ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 1)">How do I login ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 2)">How do I change my personal information ?  </b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 3)">How do I add a house to my account ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 4)"> How do I add a room to my house ?</b>
    	<b class="question slogan" onclick="displayDescriptionNum(this, 5)"> How do I add a sensor to a part ?  </b>


      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 0)"/>
          <p class="sloganDescriptionP">Click on "Personal space" then click "create an account".<br/> Then please fill in the required information.<br/> To complete your registration, click on "register". You will receive a confirmation e-mail  which will have to be opened to finalize your registration.</p>
        </div>
      </div>

      <div class="sloganDescription">
        <div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 1)"/>
          <p class="sloganDescriptionP">Click on "Personal space" and enter your username and password. Then click on "Enter".</p>
        </div>
      </div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 2)"/>
					<p class="sloganDescriptionP">Click on the "Personal Area" section and click on "Settings". You will find all your personal information and you can modify it as you wish.</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 3)"/>
					<p class="sloganDescriptionP">Click on "Personal space" and then you can directly <br/>add a house by clicking on "Add a house". Then you are <br/>redirected to the page of your new house and you can complete the information requested.</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 4)"/>
					<p class="sloganDescriptionP">Click on the "Personal Area" section and click on "My Home". You are then redirected to the home page where you can see all of your pieces. Now click on "Add a part".</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 5)"/>
					<p class="sloganDescriptionP">Click on the "Personal Area" section, then click on the room or the place where you want to add a sensor. Once on this page you have the possibility to add a sensor by the drop-down menu.</p>
				</div>
			</div>

      <div class="sloganDescription">
				<div class="sloganDescriptionInnerContainer">
          <p class="sloganDescriptionP" style="text-align:left"><img id="cross" src="http://image.noelshack.com/fichiers/2017/13/1490697237-whitecross.png" alt="Fermer" width="15px" onclick="hideDescriptionNum(this, 6)"/>
          <form action="http://puaud.eu/appmvc/Controleur/action.php?action=sendMail" method="post">
            <table id="login" align="center">
            	<tr>
            		<td id="itemEmail" class="menuMail"><input required type="text" name="email" placeholder="Votre email" size="41"/></td>
            	</tr>
            	<tr>
            		<td id="itemSubject" class="menuMail"><input required type="text" name="subject" placeholder="Sujet de votre email" size="41"/></td>
            	</tr>
            	<tr>
            		<td id="itemPassword" class="menuMail"><textarea class="textarea"name="message" rows="10" cols="70" placeholder="Ecrivez votre message ici"></textarea></td>
            	</tr>
            	<tr>
                <td id='buttonConnexion'><button class="buttonsubmit" type="submit">Send</button></td>
            	</tr>
            </table>
          </form>
				</div>
			</div>

    	<?php include ("../Vue/Support/header.php") ?>

  		<div style="margin:0;padding:0;cursor:pointer;">
      	<p class = "slogan" onclick="displayDescriptionNum(this,6)"><b>Contact us</b></p>
  		</div>

      </body>

  		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="http://puaud.eu/appmvc/Vue/Support/support.js"></script>
</html>
