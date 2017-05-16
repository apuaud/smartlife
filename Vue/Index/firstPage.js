var imgs = document.getElementsByClassName("imgBackground");
var scroll=true;
var imgId;
var lastImgId;
var levelServices = document.getElementById("levelServices");
var formulaire = document.getElementById('formulaire');
var ligneServices=document.getElementById('ligneServices').getElementsByTagName('td');
var sloganDescriptionPs = document.getElementsByClassName('sloganDescriptionP');


function displayDescription(slogan)
{
  slogan.parentNode.getElementsByClassName('sloganDescription')[0].style.display="table";
}

function hideDescription(slogan)
{
  slogan.parentNode.getElementsByClassName('sloganDescription')[0].style.display="none";
}


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
  restartSlogansAnimation();

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

function stopSlogansAnimations()
{
  $( ".slogan" ).addClass('zoomAnimation');

}
function startSlogansAnimations()
{
  $( ".slogan" ).remove('zoomAnimation');
}

function restartSlogansAnimation()
{
   $( ".slogan" ).removeClass('zoomAnimation');
   $( ".slogan" ).removeClass('zoomAnimation');
   setTimeout("$( \".slogan\" ).addClass('zoomAnimation');",100);
}

function displayFormulaire()
{
  scroll=false;
  formulaire.style.display="block";
  document.getElementById('idInput').focus();
  stopSlogansAnimations();
}
function hideFormulaire()
{
  startSlogansAnimations();
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

function callRegistration()
{
  window.location="http://localhost:8888/SmartLife/Controleur/action.php?action=goToInscription";
}
