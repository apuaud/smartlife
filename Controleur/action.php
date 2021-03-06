<?php

include("../Modele/modele.php");
include('../db_connect.php');

if(ISSET($_GET['action']))
  $action = $_GET['action'];

  switch($action)
  {
    case "goToHome":
      include("../Vue/Index/home_fr.php");
      break;

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

    case "promouvoir":
      include("promouvoir.php");
      break;


    case "depromouvoir":
      include("depromouvoir.php");
      break;

    case "promouvoir":
      include("promouvoir.php");
      break;

    case "error":
      include("../Vue/Error/error.php");
      break;

    case "supprimerMaison":
      include("supprimer_maison.php");
      break;

    case "supprimerCompte":
      include("supprimer_compte_utilisateur.php");
      break;

    case "supprimerPiece":
      include("supprimer_piece.php");
      break;

    case "modifierEmail":
      include("modifier_email.php");
      break;

    case "goToAdministration":
      include("../Vue/Admin/admin.php");
      break;

    case "goToStatistiques":
      include("../Vue/EspacePerso/statistique.php");
      break;

    case "goToAccount":
      include("../Vue/EspacePerso/account.php");
      break;

    case "modifierInformationsMaison":
      include("modifier_maison.php");
      break;

    case "supprimerCapteurPiece":
      include("supprimer_capteurpiece.php");
      break;

    case "goToML":
      include("../Vue/ML/mentionsLegales.php");
      break;

    case "goToCGU":
      include("../Vue/ML/conditionsUtilisation.php");
      break;

    case "goToCGUAdmin":
      include("../Vue/ML/conditionsUtilisationAdmin.php");
      break;

    case "goToMLAdmin":
      include("../Vue/ML/mentionsLegalesAdmin.php");
      break;

    case "modifierML":
      include("modifier_ml.php");
      break;

    case "modifierCGU":
      include("modifier_cgu.php");
      break;

    case"seDeconnecter";
      include("logout.php");
      break;

    case"supprimerCompteSecondaire":
      include("supprimer_compte_secondaire.php");
      break;

    case"supprimerComptePrincipale":
      include("suppression.php");
      break;

    case"supprimerCompteUtilisateur":
      include("supprimer_compte_utilisateur.php");
      break;

    case"supprimerTypeAppareil":
      include("supprimer_capteur.php");
      break;

    case "activation":
      include("activation.php");
      break;

    case "reinitialiser":
      include("reinitialiser.php");
      break;

    case "mdpoublie":
      include("mdpoublie.php");
      break;

    case "changemdp":
      include("changemdp.php");
      break;
  }
?>
