var inputs=document.getElementsByTagName('input');
function verifyInputs()
{
  var submit = true;

  for(var i = 0 ; i < inputs.length ; i++)
  {
    if(inputs[i].value=="")
    {
      submit=false;
    }
  }
  if(!submit)
  {
    alert('Tous les champs doivent être remplis');
  }
  return submit;
}
