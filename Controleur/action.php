<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "connexion" :
      include("http://puaud.eu/app/connexion.php");
      break;

    case "goToOublieMotDePasse" :
      include("http://puaud.eu/app/lostpassword.php");
      break;

    case "goToInscription" :
      include("http://puaud.eu/app/register.php");
      break;

    case "validerInscription" :
      include("http://puaud.eu/app/inscription.php");
      break;

    case "goToLanguefr" :
      include("http://puaud.eu/app/Vue/Index/languefr.php");
      break;

    case "goToLangueen" :
      include("http://puaud.eu/app/Vue/Index/langueen.php");
      break;

    case "goToSupport" :
      include("http://puaud.eu/app/Vue/Support/support.php");
      break;

    case "goToAjoutMaison" :
      include("http://puaud.eu/app/Vue/EsapcePerso/add_house.php");
      break;

    case "validerAjoutMaison" :
      include("http://puaud.eu/app/ajouter_maison.php");
      break;

    case "goToAjoutPiece" :
      include("http://puaud.eu/app/Vue/EspacePerso/add_room.php");
      break;

    case "validerAjoutPiece" :
      include("http://puaud.eu/app/ajouter_piece.php");
      break;

    case "goToAjoutCapteur" :
      include("http://puaud.eu/app/Vue/EspacePerso/add_capteur.php");
      break;

    case "validerAjoutCapteur" :
      include("http://puaud.eu/app/ajouter_capteur.php");
      break;

    case "goToParametre" :
      include("http://puaud.eu/app/parametre.php");
      break;

    case "sendMail" :
      include("http://puaud.eu/app/mail.php");
      break;
  }
?>
