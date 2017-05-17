var sloganDescriptionPs = document.getElementsByClassName('sloganDescriptionP');
var questions = document.getElementsByClassName('question');
var questionBottomSpace = 130;
var spaceBetweenQuestions = 80;
var spaceBetweenHeaderAndFooter = $(window).height()-66-80-40-50;

function onLoadFunction()
{
  setFontSize();
}

function stopSlogansAnimations()
{
  for (var slogan = 0 ; slogan < slogans.length ; slogan++)
  {
    questions[slogan].style.animation="none";
  }
}

function hideDescriptionNum(slogan, num)
{
  slogan.parentNode.parentNode.parentNode.style.display="none";
}

function displayDescriptionNum(slogan, num)
{
  document.getElementsByClassName('sloganDescription')[num].style.display="table";
}

function setFontSize()
{
  questionBottomSpace = 130;
  spaceBetweenHeaderAndFooter = $(window).height()-66-80-questionBottomSpace;
  spaceBetweenQuestions = spaceBetweenHeaderAndFooter/7;
  for(var questionNum = questions.length-1 ; questionNum >= 0  ; questionNum--)
  {
    questions[questionNum].style.fontSize=40*$(window).width()/1440 + "px";
    questions[questionNum].style.bottom = questionBottomSpace +"px";
    questionBottomSpace+=spaceBetweenQuestions;
  }
  for(var sloganNum = 0; sloganNum < sloganDescriptionPs.length ; sloganNum++)
  {
    sloganDescriptionPs[sloganNum].style.fontSize = 50*$(window).width()/1440 + "px";
  }
}
