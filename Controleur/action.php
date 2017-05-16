<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];
  $device = $_GET['device'];

  switch($action)
  {
    case "connexion" :
      include("connexion.php");
      break;

    case "goToOublieMotDePasse" :
      include("../Vue/" . $device . "/ModDePasseOublie.php");
      break;

    case "goToInscription" :
      include("register.php");
      break;

    case "validerInscription" :
      include("inscription.php");
      break;

    case "goToLanguefr" :
      include("../Vue/" . $device . "/Index/languefr.php");
      break;

    case "goToLangueen" :
      include("../Vue/" . $device . "/Index/langueen.php");
      break;

    case "goToSupport" :
      include("../Vue/" . $device . "/Support/support.php");
      break;

    case "goToAjoutMaison" :
      include("../Vue/" . $device . "/EspacePerso/add_house.php");
      break;

    case "validerAjoutMaison" :
      include("ajouter_maison.php");
      break;

    case "goToAjoutPiece" :
      include("../Vue/" . $device . "/EspacePerso/add_room.php");
      break;

    case "validerAjoutPiece" :
      include("ajouter_piece.php");
      break;

    case "goToAjoutCapteur" :
      include("../Vue/" . $device . "/EspacePerso/add_capteur.php");
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
