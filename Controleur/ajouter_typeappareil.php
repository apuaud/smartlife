<?php
include('../db_connect.php');
include('../Modele/modele.php');

ajouterTypeAppareil($_POST['type'], $_POST['numeromodele'], $_POST['typeinput'], $dbh);
	echo "<script>document.location.href='http://puaud.eu/appmvc/Vue/Admin/admin.php'</script>";


?>
