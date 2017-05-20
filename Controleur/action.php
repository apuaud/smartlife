<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "connexion" :
      include("connexion.php");
      break;

    case "goToOublieMotDePasse" :
      include("../Vue/ModDePasseOublie.php");
      break;

    case "goToInscription" :
      include("register.php");
      break;

    case "validerInscription" :
      include("inscription.php");
      break;

    case "goToLanguefr" :
      include("../Vue/Index/languefr.php");
      break;

    case "goToLangueen" :
      include("../Vue/Index/langueen.php");
      break;

    case "goToSupport" :
      include("support.php");
      break;

    case "goToAjoutMaison" :
      include("../Vue/EspacePerso/add_house.php");
      break;

    case "validerAjoutMaison" :
      include("ajouter_maison.php");
      break;

    case "goToAjoutPiece" :
      include("../Vue/EspacePerso/add_room.php");
      break;

    case "validerAjoutPiece" :
      include("ajouter_piece.php");
      break;

    case "goToAjoutCapteur" :
      include("../Vue/EspacePerso/add_capteur.php");
      break;

    case "validerAjoutCapteur" :
      include("ajouter_capteur.php");
      break;

    case "sendMail" :
      include("mail.php");
      break;

    case "validerAjoutTypeAppareil" :
      include("ajouter_typeappareil.php");
      break;

    case "goToParametre" :
      include("../Vue/Parametre/parametre.php");
      break;

    case "updateCaptors" :
      include("mettre_a_jour_capteurs.php");
      break;
  }
?>
