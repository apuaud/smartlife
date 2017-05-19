<?php
include('../../db_connect.php');

ajouterTypeAppareil($_POST['type'], $_POST['numeromodele'], $dbh);

?>
