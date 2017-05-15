<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

$pseudo = $_GET['log'];
$cle = $_GET['cle'];

$row = getCle($pseudo,$dbh);

activationCompte($row,$pseudo,$cle,$dbh);
