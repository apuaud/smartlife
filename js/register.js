var tableauFormulaire=document.getElementById('login');
var slogans = document.getElementsByClassName('slogan');
var formulaire = document.getElementById('formulaire');
var firstInput = document.getElementById('firstNameInput');

function stopSlogansAnimations()
{
  for (var slogan = 0 ; slogan < slogans.length ; slogan++)
  {
    slogans[slogan].style.animation="none";
  }
}

(function()
{
  formulaire.style.display="block";
  firstInput.focus();
  stopSlogansAnimations();

})();

function display(object)
{
  object.style.display="block";
}

function hide(object)
{
  object.style.display="none";
}

function comparePasswordAndPasswordConfirm()
{
  for(var i = 0 ; i < inputs.length ; i++)
  {
    var inputPassword;
    var inputPasswordConfirm;
    if(inputs[i]['name']=="passwordInput")
    {
      inputPassword = inputs[i];
    }
    if(inputs[i]['name']=="passwordConfirmInput")
    {
      inputPasswordConfirm = inputs[i];
    }
  }
  if(inputPassword['input'].value != inputPasswordConfirm['input'].value || inputPasswordConfirm['input'].value=="")
  {
    inputPasswordConfirm['correct']=false;
    display(inputPasswordConfirm['errorIconeDiv']);
  }
  else {
    inputPasswordConfirm['correct']=true;
    hide(inputPasswordConfirm['errorIconeDiv']);
  }
}

function pwAndpwcEquals()
{
  var passwordInputValue = document.getElementById('passwordInputValue').value;
  var passwordConfirmInputValue = document.getElementById('passwordConfirmInputValue').value;

  if(passwordInputValue == passwordConfirmInputValue)
  {
    return true;
  }
  else {
    alert("Les mots de passes ne sont pas identiques.")
    return false;
  }
}
