<?php
session_start();
include('http://puaud.eu/app/db_connect.php');
include('http://puaud.eu/app/Modele/modele.php');

$pseudo = $_GET['log'];
$cle = $_GET['cle'];

$row = getCle($pseudo);

activationCompte($row,$pseudo,$cle,$dbh);
