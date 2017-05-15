<?php
session_start();
include('db_connect.php');
include('Modele/modele.php');

$pseudo = $_GET['log'];
$cle = $_GET['cle'];

$row = getCle($pseudo);

activationCompte($row,$pseudo,$cle,$dbh);
