<?php

function verifierDoubleCompte($pseudo,$dbh)
{

// On vérifie que personne détient déjà un compte avec ce pseudo
	$reponse = $dbh->query('SELECT COUNT(*) AS nbPseudo FROM users WHERE pseudo=\'' . $pseudo . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbPseudo']>=1)
	{
		echo "<script>alert('Ce pseudo ne peut pas être utilisé !');history.back();</script>";
		exit;
	}

// On fait le même test avec l'adresse email
	$reponse = $dbh->query('SELECT COUNT(*) AS nbEmail FROM users WHERE email=\'' . $email . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
	if($donnees['nbEmail']>=1)
	{
		echo "<script>alert('Cet email a déjà un compte associé !');history.back();</script>";
		exit;
	}
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

function cleAleatoire($pseudo,$dbh)
{
// On génère une clé aléatoire pour le mail de confirmation
	$cle = md5(microtime(TRUE)*100000);
	$stmt = $dbh->prepare("UPDATE users SET cle=:cle WHERE pseudo like :pseudo");
	$stmt->bindParam(':cle', $cle);
	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->execute();
}

function envoiMailConfirmation($email,$dbh)
{
// Préparation du mail de confirmation
	$destinataire = $email;
	$sujet = "Activer votre compte sur SmartLife";
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= "From: noreply@puaud.eu";
	$message = 'Bienvenue sur SmartLife,

Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
ou le copier/coller dans votre navigateur internet.

http://puaud.eu/app/activation.php?log='.urlencode($pseudo).'&cle='.urlencode($cle).'

---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

// Envoi du mail de confirmation
	mail($destinataire, $sujet, $message, $headers);
}

function getCle($pseudo,$dbh)
{
	// Récupération de la clé correspondant au $pseudo dans la base de données
	$stmt = $dbh->prepare("SELECT cle,type FROM users WHERE pseudo like :pseudo ");
	if($stmt->execute(array(':pseudo' => $pseudo)) && $row = $stmt->fetch())
	{
	  {
	    $clebdd = $row['cle'];	// Récupération de la clé
	    $actif = $row['type']; // $actif contiendra alors 0 ou 1
	  }
	}
	return $row;
}

function activationCompte($row,$pseudo,$cle,$dbh)
{
// On teste la valeur de la variable $actif récupéré dans la BDD
if($row['type'] >= 1) // Si le compte est déjà actif on prévient
  {
     echo "<script>alert('Votre compte est déjà actif !');document.location.href='http://puaud.eu/app/';</script>";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $row['cle']) // On compare nos deux clés
       {
          // Si elles correspondent on active le compte !
          echo "<script>alert('Votre compte a bien été activé !');
          document.location.href='http://puaud.eu/app/';</script>";

          // La requête qui va passer notre champ actif de 0 à 1
          $stmt = $dbh->prepare("UPDATE users SET type = 1 WHERE pseudo like :pseudo ");
          $stmt->bindParam(':pseudo', $pseudo);
          $stmt->execute();
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          echo "<script>alert('Erreur lors de l'activation, merci de nous contacter');
          document.location.href='http://puaud.eu/app/';</script>";
       }
  }
}

function ajouterCapteur($typecapteur,$numeroserie,$piece,$dbh)
{
	$reponse = $dbh->query('SELECT id
		FROM type_appareil
		WHERE numeroModele =\'' . $typecapteur . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();

	$req = $dbh->prepare('INSERT INTO capteur(id_type_appareil, numeroSerie, id_piece)
		VALUES(:id_type_appareil, :numeroSerie, :id_piece)');
	$req->execute(array(
		'id_type_appareil' => $typecapteur,
		'numeroSerie' => $numeroserie,
		'id_piece' => $piece
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

function ajouterPiece($piece,$etage,$superficie,$dbh)
{
	$req = $dbh->prepare('INSERT INTO piece(nom, etage, superficie, id_logement)
		VALUES(:nom, :etage, :superficie, :id_logement)');
	$req->execute(array(
		'nom' => $piece,
    	'etage' => $etage,
		'superficie' => $superficie,
		'id_logement' => 2
		));
	echo "<script>alert('Pièce ajoutée !');document.location.href='http://puaud.eu/app/account.php';</script>";
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

http://puaud.eu/app/reinitialiser.php?log='.urlencode($donnees2['pseudo']).'&cle='.urlencode($cle).'

---------------
Ceci est un mail automatique, merci de ne pas y répondre.';
		mail($destinataire, $sujet, $message, $headers);
		echo "<script>alert('Un email vient de vous être envoyé !');document.location.href='http://puaud.eu/app/';</script>";
}

function reinitialisationMDP($pseudo,$dbh)
{
	$reponse = $dbh->query('SELECT cle FROM users WHERE pseudo=\'' . $pseudo . '\'');
	$donnees = $reponse->fetch();
	$reponse->closeCursor();
}

function changementMDP($pw,$pseudo,$dbh)
{
	$stmt = $dbh->prepare("UPDATE users SET password=:password WHERE pseudo like :pseudo");
	$stmt->bindParam(':password', sha1($pw));
	$stmt->bindParam(':pseudo', htmlspecialchars($pseudo));
	$stmt->execute();
	echo "<script>alert('Mot de passe modifié !' );document.location.href='http://puaud.eu/app/';</script>";
}

function connexion($pseudo,$dbh)
{
	$req = $dbh->prepare("SELECT id,password,type,nom,prenom FROM users WHERE pseudo like :pseudo ");
	if($req->execute(array(':pseudo' => $pseudo)) && $row = $req->fetch())
	{
		$id = $row['id'];
	    $mdp = $row['password'];
	    $type = $row['type'];
	    $nom = $row['nom'];
	    $prenom = $row['prenom'];
	}
	return $row;
}
?>