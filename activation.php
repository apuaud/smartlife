<?php
$dsn = 'mysql:dbname=u111859621_slife;host=mysql.hostinger.fr';
$user = 'u111859621_admin';
$password = 'ISEP2019';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$pseudo = $_GET['log'];
$cle = $_GET['cle'];
 
// Récupération de la clé correspondant au $pseudo dans la base de données
$stmt = $dbh->prepare("SELECT cle,type FROM users WHERE pseudo like :pseudo ");
if($stmt->execute(array(':pseudo' => $pseudo)) && $row = $stmt->fetch())
  {
    $clebdd = $row['cle'];	// Récupération de la clé
    $actif = $row['type']; // $actif contiendra alors 0 ou 1
  }
 
 
// On teste la valeur de la variable $actif récupéré dans la BDD
if($actif >= 1) // Si le compte est déjà actif on prévient
  {
     echo "<script>alert('Votre compte est déjà actif !');document.location.href='http://www.puaud.eu/app/';</script>";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $clebdd) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !	
          echo "<script>alert('Votre compte a bien été activé !');document.location.href='http://www.puaud.eu/app/';</script>";
 
          // La requête qui va passer notre champ actif de 0 à 1
          $stmt = $dbh->prepare("UPDATE users SET type = 1 WHERE pseudo like :pseudo ");
          $stmt->bindParam(':pseudo', $pseudo);
          $stmt->execute();
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          echo "<script>alert('Erreur lors de l'activation, merci de nous contacter');document.location.href='http://www.puaud.eu/app/';</script>";
       }
  }