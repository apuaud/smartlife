<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "connexion" :
      include("../connexion.php");
      break;

    case "goToOublieMotDePasse" :
      include("../lostpassword.php");
      break;

    case "goToInscription" :
      include("../register.php");
      break;

    case "validerInscription" :
      include("../inscription.php");
      break;

    case "goToLanguefr" :
      include("../Vue/Index/languefr.php");
      break;

    case "goToLangueen" :
      include("../Vue/Index/langueen.php");
      break;

    case "goToSupport" :
      include("../Vue/Support/support.php");
      break;

    case "goToAjoutMaison" :
      include("Vue/EsapcePerso/add_house.php");
      break;

    case "validerAjoutMaison" :
      include("ajouter_maison.php");
      break;

    case "goToAjoutPiece" :
      include("Vue/EspacePerso/add_room.php");
      break;

    case "validerAjoutPiece" :
      include("ajouter_piece.php");
      break;

    case "goToAjoutCapteur" :
      include("Vue/EspacePerso/add_capteur.php");
      break;

    case "validerAjoutCapteur" :
      include("ajouter_capteur.php");
      break;

    case "goToParametre" :
      include("parametre.php");
      break;

    case "sendMail" :
      include("mail.php");
      break;
  }
?>
