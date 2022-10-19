<?php
require_once('connexion.php');

session_start();
$affiche;
$connexion = new Connexion();
$connexion->initConnexion();
require_once('module/mod_connexion/mod_connexion.php');
$co = new ModConnexion();
echo '<a href="index.php?module=connexion&action=AfficherFormulaireInscription">Inscription</a>';
include_once('template.php');
?>