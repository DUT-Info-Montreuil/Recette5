<?php
require_once('connexion.php');

session_start();
$affiche;
$connexion = new Connexion();
$connexion->initConnexion();

include_once('template.php');
?>