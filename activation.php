<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/db_connect.php');
$doc_root = $_SERVER['DOCUMENT_ROOT'];include('$doc_root/app/Modele/modele.php');

$pseudo = $_GET['log'];
$cle = $_GET['cle'];

$row = getCle($pseudo);

activationCompte($row,$pseudo,$cle,$dbh);
