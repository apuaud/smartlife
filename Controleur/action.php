<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "connexion" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/connexion.php");
      break;

    case "goToOublieMotDePasse" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/lostpassword.php");
      break;

    case "goToInscription" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/register.php");
      break;

    case "validerInscription" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/inscription.php");
      break;

    case "goToLanguefr" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Index/languefr.php");
      break;

    case "goToLangueen" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Index/langueen.php");
      break;

    case "goToSupport" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/Support/support.php");
      break;

    case "goToAjoutMaison" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/EsapcePerso/add_house.php");
      break;

    case "validerAjoutMaison" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/ajouter_maison.php");
      break;

    case "goToAjoutPiece" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/EspacePerso/add_room.php");
      break;

    case "validerAjoutPiece" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/ajouter_piece.php");
      break;

    case "goToAjoutCapteur" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/Vue/EspacePerso/add_capteur.php");
      break;

    case "validerAjoutCapteur" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/ajouter_capteur.php");
      break;

    case "goToParametre" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/parametre.php");
      break;

    case "sendMail" :
      $doc_root = $_SERVER['DOCUMENT_ROOT'];include("$doc_root/app/mail.php");
      break;
  }
?>
