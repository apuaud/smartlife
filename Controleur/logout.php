<?php
session_start();
session_unset();
header('Location:action.php?action=goToHome');
?>
