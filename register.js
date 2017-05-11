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
