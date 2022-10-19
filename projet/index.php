<?php
require_once('composants/menu/comp_menu.php');
require_once('connexion.php');
$compMenu = new CompMenu();
session_start();
$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$affiche;
$connexionBd = new Connexion();
$connexionBd->initConnexion();
require_once('module/mod_connexion/mod_connexion.php');
$connexionSite = new ModConnexion();

include_once('template.php');
?>