var tableauFormulaire=document.getElementById('login');
var slogans = document.getElementsByClassName('slogan');
var formulaire = document.getElementById('formulaire');

var firstNameInput = new function(){
  this.name = 'firstNameInput';
  this.td =  document.getElementById('firstNameTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^[a-zA-Z -]+$/;
  this.correct = false;
}


var lastNameInput = new function(){
  this.name= "lastNameInput";
  this.td = document.getElementById('lastNameTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^[a-zA-Z -]+$/;
  this.correct = false;
}

var idInput = new function(){
  this.name="idInput";
  this.td = document.getElementById('idTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^[0-9a-zA-Z_-]+$/;
  this.correct = false;
}

var emailInput = new function(){
  this.name = "emailInput";
  this.td = document.getElementById('emailTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  this.correct = false;
}

var passwordInput = new function(){
  this.name = "passwordInput";
  this.td = document.getElementById('passwordTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  this.correct = false;
}

var passwordConfirmInput = new function(){
  this.name = "passwordConfirmInput";
  this.td = document.getElementById('passwordConfirmTd');
  this.input = this.td.getElementsByTagName('input')[0];
  this.errorMessageDiv = this.td.getElementsByClassName('messageCorrection')[0];
  this.errorIcone = this.td.getElementsByClassName('iconeError')[0];
  this.errorIconeDiv = this.td.getElementsByClassName('iconeErrorDiv')[0];
  this.regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  this.correct = false;
}

var inputs = [
  firstNameInput,
  lastNameInput,
  idInput,
  emailInput,
  passwordInput,
  passwordConfirmInput
]

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
  firstNameInput['input'].focus();
  stopSlogansAnimations();

  for(var i = 0 ; i < inputs.length ; i ++)
  {
    (function(i) {
      var input=inputs[i];
      input['input'].addEventListener('focusout', function(){checkInput(input);}, false);
      input['errorIcone'].addEventListener('mouseover', function(){display(input['errorMessageDiv']);},false);
      input['errorIconeDiv'].addEventListener('mouseover', function(){input['input'].select();},false);
      input['errorIcone'].addEventListener('mouseout', function(){
        hide(input['errorMessageDiv']);
        input['input'].select();
        },false);
    }(i));
  }

})();

function checkInput(input)
{
  if(input['name']=="passwordConfirmInput")
  {
    comparePasswordAndPasswordConfirm();
  }
  else if(input['regEx'].test(input['input'].value))
  {
    input['correct'] = true;
    hide(input['errorIconeDiv']);
  }
  else
  {
    input['correct'] = false;
    if(input['input'].value!="")
    {
      display(input['errorIconeDiv']);
    }
  }
}

function verifyInputs()
{
  var submit = true;
  var inputPassword;
  var inputPasswordConfirm;

  for(var i = 0 ; i < inputs.length ; i++)
  {
    if(inputs[i]['correct']==false)
    {
      submit=false;
      display(inputs[i]['errorIconeDiv']);
    }
  }
  if(!submit)
  {
    alert('Nous ne pouvons pas donner suite à votre inscription, au moins un des champs n\'est pas correctement rempli.');
  }
  return submit;
}

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
