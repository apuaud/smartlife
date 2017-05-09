<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SmartLife</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="margin0" onload="onLoadFunction()">
		<div id="formulaire">
			<form action="inscription.php" method="post" onsubmit="return verifyInputs();">
			<table id="login" align="center" >
				<tr>
					<td id="firstNameInputFalse"><p align="right" class="border-right"> Votre prénom ne peut contenir que des lettres, espaces et tirets</p></td>
					<td id="itemFirstNames" >
						<input id="firstNameInput" type="text" name="firstName" placeholder="Prénom" size="13"/>
						<input id="lastNameInput" type="text" name="lastName" placeholder="Nom" size="12"/>
					</td>
					<td id="lastNameInputFalse"><p align="left" class="border-left"> Votre nom ne peut contenir que des lettres, espaces et tirets</p></td>
				</tr>
				<tr>
					<td id = "idInputFalse"><p align="right" class="border-right">Votre pseudo ne peut contenir que des lettres, chiffres et tirets</p></td>
					<td id="itemID">
						<input id="idInput" type="text" name="id" placeholder="Pseudo" size="20"/>
						<input id="emailInput" type="text" name="email" placeholder="Email" size="20" />
					</td>
					<td id="emailInputFalse"><p align="left" class="border-left">Votre email n'est pas valide</p></td>
				</tr>
				<tr>
					<td id = "passwordInputFalse"><p align="right" class="border-right">Votre mot de passe doit contenir au moins 8 caractères dont 1 majuscule, 1 minuscule et 1 chiffre</p></td>
					<td id="itemPassword">
						<input id="passwordInput" type="password" name="pw" placeholder="Mot de passe" size="20" />
						<input id="passwordConfirmInput" type="password" name="pw2" placeholder="Recopier le MDP" size="20" />
					</td>
					<td id = "passwordConfirmInputFalse"><p align="left" class="border-left">Must be the same as password</p></td>
				</tr>

				<tr>
					<td></td>
					<td id='itemRegister'><button onclick="verifyInputs()">Register</button></a></td>
					<td></td>
				</tr>

			</table>
			</form>

		</div>

		<div class="container" id="accueil" >
			<p class = "slogan">Your Home | Your Future</p>
			<p id="logoContainer"><img align="middle"id="logo2" src="img/logo_sansFond.png"></p>

			<img class ="imgBackground"src="img/leveSoleilTest.jpg" style="position:relative; z-index=4;">
		</div>
	</body>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript">
	var divFormulaire=document.getElementById('formulaire');
	var firstNameInput=document.getElementById('firstNameInput');
	var lignesFormulaire = document.getElementsByTagName('tr');
	var colonne;
	var colonneWidth;
	var tableauFormulaire=document.getElementById('login');
	var inputsInTd;

	formulaire.style.display="block";
	firstNameInput.focus();





	for (var numLigne = 0 ; numLigne < lignesFormulaire.length ; numLigne++)
	{
		colonne=lignesFormulaire[numLigne].getElementsByTagName('td')[1];
		colonneWidth=570;
		colonne.style.width=colonneWidth+"px";
		inputsInTd = lignesFormulaire[numLigne].getElementsByTagName('td')[1].getElementsByTagName('input');
		for (var input = 0 ; input <  inputsInTd.length ; input++)
		{
			inputsInTd[input].style.width=colonneWidth/inputsInTd.length-10+"px";
		}
	}

	var inputs=document.getElementsByTagName('input');
	var inputsCorrect = new Array(false, false, false, false, false, false);
	var input;
	var cellulesFalse = new Array("firstNameInputFalse",
																"lastNameInputFalse",
																"idInputFalse",
																"emailInputFalse",
																"passwordInputFalse",
																"passwordConfirmInputFalse");
	displayCorrection(document.getElementById("firstNameInputFalse"));

	(function()
	{
		for(var i = 0 ; i < inputs.length ; i ++)
		{
			inputs[i].addEventListener('focusout', function(e){check(e.target.id)});
			inputs[i].addEventListener('focusin', function(e){displayCorrection(document.getElementById(e.target.id+"False"))});
		}


	})();

	function check(id)
	{

		input = document.getElementById(id);
		inputValue= input.value;
		celluleFalse = document.getElementById(id+"False");

		if (id=='firstNameInput')
		{

			if(/^[a-zA-Z -]+$/.test(inputValue))
			{
				hideCorrection(celluleFalse);
				inputsCorrect[0]=true;
			}
			else
			{

				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[0]=false;
			}
		}

		else if (id=='lastNameInput')
		{

			if(/^[a-zA-Z -]+$/.test(inputValue))
			{
				hideCorrection(celluleFalse);
				inputsCorrect[1]=true;
			}
			else
			{
				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[1]=false;
			}
		}
		else if (id=="idInput")
		{
			if(/^[0-9a-zA-Z_-]+$/.test(inputValue))
			{
				hideCorrection(celluleFalse);
				inputsCorrect[2]=true;
			}
			else {
				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[2]=false;
			}
		}

		else if(id=='emailInput')
		{
			if(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(inputValue))
			{
				hideCorrection(celluleFalse);
				inputsCorrect[3]=true;
			}
			else {
				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[3]=false;
			}
		}

		else if(id=="passwordInput")
		{
			if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(inputValue))
			{
				hideCorrection(celluleFalse);
				inputsCorrect[4]=true;
			}
			else
			{
				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[4]=false;
			}
			if(inputValue!=document.getElementById('passwordConfirmInput').value)
			{
				inputsCorrect[5]=false;
			}
		}

		else if (id=="passwordConfirmInput")
		{
			if(inputValue==document.getElementById('passwordInput').value)
			{
				hideCorrection(celluleFalse);
				inputsCorrect[5]=true;
			}
			else
			{
				displayCorrection(celluleFalse);
				blink(id+"False");
				inputsCorrect[5]=false;
			}
		}
	}

	function verifyInputs()
	{
		var submit = true;
		for(var i = 0 ; i < inputsCorrect.length ; i++)
		{
			celluleFalse = document.getElementById(cellulesFalse[i]);
			if(inputsCorrect[i]==false)
			{
				submit=false;
				displayCorrection(celluleFalse);
			}
		}
		return submit;
	}


	function displayCorrection(cellule)
	{
		cellule.getElementsByTagName('p')[0].style.display="block";
	}

	function hideCorrection(cellule)
	{
		cellule.getElementsByTagName('p')[0].style.display="none";
	}

	function blink(id)
	{
   $(document.getElementById(id).getElementsByTagName('p')[0]).animate({opacity:0.2},1000).animate({opacity:1}, 1000).animate({opacity:1}, 1000);
	 blink(id);
	}

	</script>
</html>