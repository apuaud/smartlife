<?php
session_start();

if(isset($_POST['idMaison']) AND isset($_POST['nom-maison']) AND isset($_POST['adresse']) AND isset($_POST['codepostal']) AND isset($_POST['ville'])
	AND isset($_POST['pays']) AND isset($_POST['superficie']) AND isset($_POST['nbhab']) AND isset($_SESSION['id']))
{
  $idMaison = htmlspecialchars($_POST['idMaison']);
	$nomMaison = htmlspecialchars($_POST["nom-maison"]);
	$adresse = htmlspecialchars($_POST["adresse"]);
	$codepostal = htmlspecialchars($_POST["codepostal"]);
	$ville = htmlspecialchars($_POST["ville"]);
	$pays = htmlspecialchars($_POST["pays"]);
	$superficie = htmlspecialchars($_POST["superficie"]);
	$nbhab = htmlspecialchars($_POST["nbhab"]);

	modifierMaison($idMaison, $nomMaison,$adresse,$ville,$codepostal,$pays,$superficie,$nbhab,$dbh);

	echo "<script>
          alert('Votre maison a bien été modifiée !');
          document.location.href='action.php?action=goToAccount&focus1=itemEspacePerso&focus2=logoMaison&maison=" . $idMaison . "';</script>";
}

else
{
	echo "<script>alert('Un des champs n'a pas été rempli');</script>";
}
?>
