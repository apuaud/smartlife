<?php

ajouterTypeAppareil($_POST['type'], $_POST['numeromodele'], $_POST['typeinput'], $dbh);
header('Location:action.php?action=goToAdministration&focus1=itemAdministration&focus2=&');


?>
