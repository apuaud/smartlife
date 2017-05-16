<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

$pseudo = $_GET['log'];
$cle = $_GET['cle'];

$row = getCle($pseudo,$dbh);

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
		activationCompte($pseudo,$dbh);
	}
	else // Si les deux clés sont différentes on provoque une erreur...
    {
          echo "<script>alert('Erreur lors de l'activation, merci de nous contacter');
          document.location.href='http://puaud.eu/app/';</script>";
    }
}
