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
?>