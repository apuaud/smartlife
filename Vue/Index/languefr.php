<?php
session_start();
setcookie('langue', 'fr', time() + 365*24*3600, "/", null, false, true);
header('Location:http://puaud.eu/appmvc/index.php');
?>
