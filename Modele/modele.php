<?php

function verifierDoubleComptePseudo($pseudo,$dbh)
{

// On vérifie que personne détient déjà un compte avec ce pseudo
	$reponse = $dbh->query('SELECT COUNT(*) AS nbPseudo FROM users WHERE pseudo=\'' . $pseudo . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	return $donnees['nbPseudo'];
}

function verifierDoubleCompteEmail($email,$dbh)
{
// On fait le même test avec l'adresse email
	$reponse = $dbh->query('SELECT COUNT(*) AS nbEmail FROM users WHERE email=\'' . $email . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	return $donnees['nbEmail'];
}

function ajouterUtilisateur($prenom,$nom,$pseudo,$email,$password,$dbh)
{

// On ajoute l'utilisateur dans la BDD
	$req = $dbh->prepare('INSERT INTO users(prenom, nom, pseudo, email, password, type) VALUES(:prenom, :nom, :pseudo, :email, :password, :type)');
	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'pseudo' => $pseudo,
		'email' => $email,
		'password' => sha1($password),
		'type' => 0
		));
}

function ajouterUtilisateurSecondaire($prenom,$nom,$pseudo,$email,$password,$type,$cptPrincipal,$dbh)
{

// On ajoute l'utilisateur dans la BDD
	$req = $dbh->prepare('INSERT INTO users(prenom, nom, pseudo, email, password, type, id_comptePrincipal)
		VALUES(:prenom, :nom, :pseudo, :email, :password, :type, :id_comptePrincipal)');
	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'pseudo' => $pseudo,
		'email' => $email,
		'password' => sha1($password),
		'type' => $type,
		'id_comptePrincipal' => $cptPrincipal
		));
}

function cleAleatoire($pseudo,$dbh)
{
// On génère une clé aléatoire pour le mail de confirmation
	$cle = md5(microtime(TRUE)*100000);
	$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
	$stmt->bindParam(':cle', $cle);
	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->execute();
	return $cle;
}

function envoiMailConfirmation($pseudo,$cle,$email,$dbh)
{
// Préparation du mail de confirmation
	$destinataire = $email;
	$sujet = "Activer votre compte sur SmartLife";
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= "From: noreply@puaud.eu";
	$message = 'Bienvenue sur SmartLife,

Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
ou le copier/coller dans votre navigateur internet.

http://smartlife.puaud.eu/Controleur/action.php?action=activation&log='.urlencode($pseudo).'&cle='.urlencode($cle).'

---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

// Envoi du mail de confirmation
	mail($destinataire, $sujet, $message, $headers);
}

function envoiMailConfirmationSecondaire($pseudo,$email,$dbh)
{
// Préparation du mail de confirmation
	$destinataire = $email;
	$sujet = "Nouveau compte sur SmartLife";
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= "From: noreply@puaud.eu";
	$message = "Bienvenue sur SmartLife, ". $pseudo ."

Un nouveau compte secondaire a été créé avec votre adresse email !
Vous pouvez désormais vous connecter.

---------------
Ceci est un mail automatique, Merci de ne pas y répondre.";

// Envoi du mail de confirmation
	mail($destinataire, $sujet, $message, $headers);
}

function getCle($pseudo,$dbh)
{
	// Récupération de la clé correspondant au $pseudo dans la base de données
	$stmt = $dbh->prepare("SELECT cle,type FROM users WHERE pseudo like :pseudo ");
	if($stmt->execute(array(':pseudo' => $pseudo)) && $row = $stmt->fetch())
	{
	    $clebdd = $row['cle'];	// Récupération de la clé
	    $actif = $row['type']; // $actif contiendra alors 0 ou 1
	}
	return $row;
}

function activationCompte($pseudo,$dbh)
{
    // La requête qui va passer notre champ actif de 0 à 1
    $stmt = $dbh->prepare("UPDATE users SET type = 1 WHERE pseudo like :pseudo ");
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
}

function verifierTypeInput($nomcapteur,$dbh)
{
	$reponse = $dbh->query('SELECT type_input
		FROM type_appareil
		WHERE nom =\'' . $nomcapteur . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
}

function ajouterCapteur($typecapteur,$numeroserie,$piece,$dbh)
{
	$req = $dbh->prepare('INSERT INTO capteur(id_type_appareil, numeroSerie, id_piece, etatActuel)
		VALUES(:id_type_appareil, :numeroSerie, :id_piece, :etatActuel)');
	$req->execute(array(
		'id_type_appareil' => $typecapteur,
		'numeroSerie' => $numeroserie,
		'id_piece' => $piece,
		'etatActuel' => '0'
		));
}

function ajouterMaison($maison,$adresse,$ville,$codepostal,$pays,$superficie,$nbhab,$dbh)
{
	$req = $dbh->prepare('INSERT INTO logement(nom, adresse, ville, codePostal, pays, superficie, nombreHabitants)
		VALUES(:nom, :adresse, :ville, :codepostal, :pays, :superficie, :nbhab)');
	$req->execute(array(
		'nom' => $maison,
		'adresse' => $adresse,
		'ville' => $ville,
		'codepostal' => $codepostal,
		'pays' => $pays,
		'superficie' => $superficie,
		'nbhab' => $nbhab
		));
}

function lienUtilisateurLogement($id,$dbh)
{
	$reponse = $dbh->query('SELECT MAX(id) AS idlogement FROM logement');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();

	$req = $dbh->prepare('INSERT INTO users_logement(id_user,id_logement)
		VALUES(:id_user,:id_logement)');
	$req->execute(array(
		'id_user' => $_SESSION['id'],
		'id_logement' => $donnees['idlogement']
		));
}

function ajouterPiece($piece,$etage,$superficie,$maison,$dbh)
{
	$req = $dbh->prepare('INSERT INTO piece(nom, etage, superficie, id_logement)
		VALUES(:nom, :etage, :superficie, :id_logement)');
	$req->execute(array(
		'nom' => $piece,
    	'etage' => $etage,
		'superficie' => $superficie,
		'id_logement' => $maison
		));
}

function motDePasseOublie($email,$dbh)
{
	// On vérifie qu'un compte existe avec ce mail
	$reponse = $dbh->query('SELECT COUNT(*) AS nbEmail FROM users WHERE email=\'' . $email . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbEmail']==1)
	{
		// On récupère le pseudo associé
		$reponse2 = $dbh->query('SELECT pseudo FROM users WHERE email=\'' . $email . '\'');
		$donnees2 = $reponse2->fetch();
		$reponse2->closeCursor();

		// On génère une clé aléatoire pour le mail de réinitialisation
		$cle = md5(microtime(TRUE)*100000);
		$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
		$stmt->bindParam(':cle', $cle);
		$stmt->bindParam(':pseudo', $donnees2['pseudo']);
		$stmt->execute();

		// On envoie un mail
		$destinataire = $email;
		$sujet = "Réinitialiser votre mot de passe sur SmartLife";
		$headers  = 'MIME-Version: 1.0' . "\n";
		$headers .= "From: noreply@puaud.eu";
		$message = 'Bonjour,

Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous
ou le copier/coller dans votre navigateur internet.

http://smartlife.puaud.eu/Controleur/action.php?action=reinitialiser&log='.urlencode($donnees2['pseudo']).'&cle='.urlencode($cle).'

---------------
Ceci est un mail automatique, merci de ne pas y répondre.';
		mail($destinataire, $sujet, $message, $headers);
		return true;
	}
	else
	{
		return false;
	}
}

function reinitialisationMDP($pseudo,$dbh)
{
	$reponse = $dbh->query('SELECT cle FROM users WHERE pseudo=\'' . $pseudo . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	return $donnees;
}

function changementMDP($pw,$pseudo,$dbh)
{
	$stmt = $dbh->prepare("UPDATE users SET password=:password WHERE pseudo like :pseudo");
	$stmt->bindParam(':password', sha1($pw));
	$stmt->bindParam(':pseudo', htmlspecialchars($pseudo));
	$stmt->execute();

}

function connexion($pseudo,$dbh)
{
	$req = $dbh->prepare("SELECT id,password,type,nom,prenom,id_comptePrincipal FROM users WHERE pseudo like :pseudo ");
	if($req->execute(array(':pseudo' => $pseudo)) && $row = $req->fetch())
	{
		$id = $row['id'];
	    $mdp = $row['password'];
	    $type = $row['type'];
	    $nom = $row['nom'];
	    $prenom = $row['prenom'];
	    $id_comptePrincipal = $row['id_comptePrincipal'];
	}
	return $row;
}

function promouvoir($id,$dbh)
{
	$req = $dbh->prepare('UPDATE users SET type=:type WHERE id like :id');
	$req->execute(array(
		'type' => 2,
    	'id' => $id
		));
}

function depromouvoir($id,$dbh)
{
	$req = $dbh->prepare('UPDATE users SET type=:type WHERE id like :id');
	$req->execute(array(
		'type' => 1,
    	'id' => $id
		));
}

function supprimer($id,$dbh)
{
	$req = $dbh->prepare('DELETE FROM users WHERE id like :id');
	$req->execute(array(
    	'id' => $id
		));
}

function houseBelongsToUser($idUtilisateur, $idMaison, $dbh)
{
	$req = $dbh->prepare('SELECT id_logement FROM users_logement WHERE id_user LIKE :id');
	$req->execute(array(
    	'id' => $idUtilisateur
		));
	while($reponse = $req->fetch())
	{
		if($reponse['id_logement'] == $idMaison)
		{
			return true;
		}
	}
	return false;
}


function roomBelongsToHouse($idMaison, $idPiece, $dbh)
{
	$req = $dbh->prepare('SELECT piece.id FROM piece WHERE id_logement LIKE :id');
	$req->execute(array(
    	'id' => $idMaison
		));
	while($reponse = $req->fetch())
	{
		if($reponse['id'] == $idPiece)
		{
			return true;
		}
	}
	return false;
}

function recupererLesUtilisateurs($dbh)
{
	$reponse = $dbh->query('SELECT id,pseudo,nom,prenom,email,type
							FROM users');
	return $reponse;
}

function recupererLesCapteurs($dbh)
{
	$reponse = $dbh->query('SELECT id,nom,numeroModele
							FROM type_appareil
							LIMIT 0 , 50');
	return $reponse;
}

function ajouterTypeAppareil($type, $numeroModele, $typeinput, $dbh)
{
	$req = $dbh->prepare('INSERT INTO type_appareil(nom,numeroModele,type_input) VALUES(:nom, :numeroModele, :type_input)');
	$req->execute(array(
		'nom' => $type,
		'numeroModele' => $numeroModele,
		'type_input' => $typeinput
		));
}

function recupererLesMaisonsDeLUtilisateur($idUtilisateur, $dbh)
{
	$reponse = $dbh->query('SELECT logement.id,nom
		FROM logement,users_logement
		WHERE users_logement.id_user=\'' . $idUtilisateur . '\'
		AND logement.id=users_logement.id_logement');
	return $reponse;
}

function recupererLesPiecesDeLaMaison($idMaison, $dbh)
{
	$reponse = $dbh->query('SELECT piece.nom,piece.id
		FROM logement,piece
		WHERE logement.id=\'' . $idMaison . '\'
		AND piece.id_logement=logement.id');
	return $reponse;
}

function recupererLesCapteursDeLaPiece($idPiece, $dbh)
{
	$reponse = $dbh->query('SELECT type_appareil.nom, capteur.etatActuel, type_appareil.type_input, capteur.id
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id
	AND type_appareil.type_input = "0"');

	return $reponse;
}
function recupererLesCapteursEtEffecteursDeLaPiece($idPiece, $dbh)
{
	$reponse = $dbh->query('SELECT type_appareil.nom, capteur.etatActuel, type_appareil.type_input, capteur.id
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id');

	return $reponse;
}

function recupererLesEffecteursDeLaPiece($idPiece, $dbh)
{
	$reponse = $dbh->query('SELECT type_appareil.nom, capteur.etatActuel, type_appareil.type_input, capteur.id
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id
	AND type_appareil.type_input <> "0"');
	return $reponse;
}

function recupererLEtatDesCapteursDeLaPiece($idPiece, $dbh)
{
	$reponse3 = $dbh->query('SELECT capteur.etatActuel, type_appareil.nom
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id
	AND type_appareil.type_input = "0"');
	return $reponse3;
}

function recupererLEtatDesEffecteursDeLaPiece($idPiece, $dbh)
{
	$reponse3 = $dbh->query('SELECT capteur.etatActuel, type_appareil.nom
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id
	AND type_appareil.type_input <> "0"');
	return $reponse3;
}

function recupererLEtatDesCapteursEtEffecteursDeLaPiece($idPiece, $dbh)
{
	$reponse3 = $dbh->query('SELECT capteur.etatActuel
	FROM type_appareil,capteur
	WHERE capteur.id_piece=\'' . $idPiece . '\'
	AND capteur.id_type_appareil=type_appareil.id');
	return $reponse3;
}

function mettreAJourLesEffecteursDeLaPiece($idPiece, $nouvelleListeEffecteur, $dbh)
{
	$listeEffecteursDeLaPiece = recupererLesEffecteursDeLaPiece($idPiece, $dbh);
	while ($effecteur = $listeEffecteursDeLaPiece->fetch())
	{
		$req = $dbh->prepare('UPDATE capteur
								SET etatActuel=:etatActuel
								WHERE capteur.id_piece=\'' . $idPiece . '\'
								AND capteur.id = \'' . $effecteur['id'] . '\'');
		if($effecteur['nom']=='Volets')
		{
			if(isset($nouvelleListeEffecteur['Volets']))
			{
				$req->execute(array(
			'etatActuel' => 'true'
			));
			}
			else
			{
				$req->execute(array(
			'etatActuel' => 'false'
			));
			}
		}
		else
		{

		$req->execute(array(
			'etatActuel' => $nouvelleListeEffecteur[$effecteur['nom']]
			));
		}

	}
}

function modifierPseudo($idUtilisateur, $nouveauPseudo, $dbh)
{
	$req = $dbh->prepare('UPDATE users SET pseudo=:pseudo WHERE id like :id');
	$req->execute(array(
		'pseudo' => $nouveauPseudo,
    	'id' => $idUtilisateur
		));
}

function getMDPactuel($idUtilisateur, $dbh)
{
	$reponse = $dbh->query('SELECT users.password
	FROM users
	WHERE users.id=\'' . $idUtilisateur . '\'');
	$donnee = $reponse->fetch();
	return $donnee['password'];
}

function getEmailActuel($idUtilisateur, $dbh)
{
	$reponse = $dbh->query('SELECT users.email
	FROM users
	WHERE users.id=\'' . $idUtilisateur . '\'');
	return $reponse->fetch()['email'];
}

function modifierMDP($idUtilisateur, $nouveauMDP, $dbh)
{
	$req = $dbh->prepare('UPDATE users SET password=:password WHERE id like :id');
	$req->execute(array(
		'password' => sha1($nouveauMDP),
    	'id' => $idUtilisateur
		));
}

function supprimerMaison($idMaison,$dbh)
{
	$req = $dbh->prepare('DELETE FROM logement WHERE id like :id');
	$req->execute(array(
    	'id' => $idMaison
		));
}
function supprimerPiece($idPiece,$dbh)
{
	$req = $dbh->prepare('DELETE FROM piece WHERE id like :id');
	$req->execute(array(
    	'id' => $idPiece
		));
}

function supprimerCapteur($id,$dbh)
{
	$req = $dbh->prepare('DELETE FROM type_appareil WHERE id like :id');
	$req->execute(array(
    	'id' => $id
		));
}

function modifierEmail($idUtilisateur, $nouveauMail, $dbh)
{
	$req = $dbh->prepare('UPDATE users SET email=:email WHERE id like :id');
	$req->execute(array(
		'email' => $nouveauMail,
    	'id' => $idUtilisateur
		));
}

function supprimerCapteurPiece($id,$dbh)
{
	$req = $dbh->prepare('DELETE FROM capteur WHERE id like :id');
	$req->execute(array(
    	'id' => $id
		));
}

function getNewId($dbh)
{
	$id=0;
	$reponse = $dbh->query('SELECT logement.id
	FROM logement');
	while($donnee = $reponse->fetch())
	{
		$id = $donnee['id'];
	}
	return $id;
}

function getIdPiece($dbh)
{
	$id=0;
	$reponse = $dbh->query('SELECT piece.id
	FROM piece');
	while($donnee = $reponse->fetch())
	{
		$id = $donnee['id'];
	}
	return $id;
}

function getHomesOfUser($dbh, $idUser)
{
	$reponse = $dbh->query('SELECT users_logement.id_logement, users_logement.id_user, logement.id, logement.nom
			FROM users_logement, logement
			WHERE id_user = \''.$idUser .'\'
			AND users_logement.id_logement=logement.id');

	return $reponse;
}

function getRoomsOfHome($dbh, $idMaison)
{
	$reponse = $dbh->query(
		'SELECT piece.id , piece.nom
		 FROM piece
		 WHERE piece.id_logement=\''. $idMaison .'\'');
	return $reponse;
}

function recupererCapteurDunePiece($idPiece, $dbh)
{
		$reponse = $dbh->query(
		'SELECT capteur.id , type_appareil.nom
		 FROM capteur, type_appareil
		 WHERE capteur.id_piece=\''. $idPiece .'\'
		 AND capteur.id_type_appareil = type_appareil.id
		 AND type_appareil.type_input = "0"');
	return $reponse;
}

function getHomeInformation($idHome, $dbh)
{
	$reponse = $dbh->query(
		'SELECT logement.nom , logement.adresse, logement.ville, logement.codePostal, logement.pays, logement.superficie, logement.nombreHabitants
		 FROM logement
		 WHERE logement.id=\''. $idHome .'\'');
	return $reponse->fetch();
}

function modifierMaison($idMaison, $nomMaison,$adresse,$ville,$codepostal,$pays,$superficie,$nbhab,$dbh)
{
	$req = $dbh->prepare('UPDATE logement SET nom=:nomMaison, adresse=:adresse, ville=:ville, codePostal=:codepostal, pays=:pays, superficie=:superficie, nombreHabitants=:nbhab  WHERE id like :idMaison');
	$req->execute(array(
		'nomMaison' => $nomMaison,
		'adresse' => $adresse,
		'ville' => $ville,
		'codepostal' => $codepostal,
		'pays' => $pays,
		'superficie' => $superficie,
		'nbhab' => $nbhab,
		'idMaison' => $idMaison
		));
}

function getUsersPseudo($idUser, $dbh)
{
	$reponse = $dbh->query(
		'SELECT users.pseudo
		 FROM users
		 WHERE users.id=\''. $idUser .'\'');
	return $reponse->fetch()['pseudo'];
}
function getNameOfHouse($idHouse, $dbh)
{
	$reponse = $dbh->query(
		'SELECT logement.nom
		 FROM logement
		 WHERE logement.id=\''. $idHouse .'\'');
	return $reponse->fetch()['nom'];
}

function getNameOfRoom($idRoom, $dbh)
{
	$reponse = $dbh->query(
		'SELECT piece.nom
		 FROM piece
		 WHERE piece.id=\''. $idRoom .'\'');
	return $reponse->fetch()['nom'];
}

function recupererCompteSecondaireAssocie($idPrincipal, $dbh)
{
	$reponse = $dbh->query('SELECT users.pseudo, users.nom, users.prenom, users.id
		FROM users
		WHERE users.id_comptePrincipal = \''.$idPrincipal .'\'');
	return $reponse;
}

function getCGU($dbh)
{
	$reponse = $dbh->query('SELECT ml_cgu.cgu
		FROM ml_cgu');
	return $reponse->fetch()['cgu'];
}

function getML($dbh)
{
	$reponse = $dbh->query('SELECT ml_cgu.ml
		FROM ml_cgu');
	return $reponse->fetch()['ml'];
}

function setML($mlText, $dbh)
{
	$req = $dbh->prepare('UPDATE ml_cgu SET ml=:mlText');
	$req->execute(array(
		'mlText' => $mlText
		));
}

function setCGU($cguText, $dbh)
{
	$req = $dbh->prepare('UPDATE ml_cgu SET cgu=:cguText');
	$req->execute(array(
		'cguText' => $cguText
		));
}
?>
