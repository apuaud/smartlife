<?php

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "connexion" :
      include("connexion.php");
      break;

    case "goToOublieMotDePasse" :
      include("../Vue/MotDePasseOublie/lostpassword.php");
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

    case "validerAjoutMaison" :
      include("ajouter_maison.php");
      break;

    case "validerAjoutPiece" :
      include("ajouter_piece.php");
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

    case "ajouterCompteSecondaire":
      include("inscription_secondaire.php");
      break;

    case "modifierPseudo":
      include("modifier_pseudo.php");
      break;

    case "modifierMDP":
      include("modifier_mdp.php");
      break;

    case "depromouvoir":
      include("depromouvoir.php");
      break;

    case "error":
      include("../Vue/Error/error.php");
      break;

    case "supprimerMaison":
      include("supprimer_maison.php");
      break;

    case "supprimerPiece":
      include("supprimer_piece.php");
      break;

    case "modifierEmail":
      include("modifier_email.php");
      break;
  }
?>
