<?php
require_once('module/mod_connexion/mod_connexion.php');
require_once('module/mod_recette/mod_recette.php');
require_once('module/mod_recherche/mod_recherche.php');
require_once('module/mod_profil/mod_profil.php');
require_once('composants/menu/comp_menu.php');
require_once('composants/logo/comp_logo.php');
require_once('connexion.php');
$compMenu = new CompMenu();
$compLogo = new CompLogo();
session_start();
$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$affiche;
$connexionBd = new Connexion();
$connexionBd->initConnexion();


$module = isset($_GET['module']) ? $_GET['module'] : 'rien' ;
switch ($module) {
  case "connexion":
    new ModConnexion();
    break;
  case "recette":
    new ModRecette();
    break;
  case "recherche":
    new ModRecherche();
    break;
  case "profil":
    new ModProfil();
    break;  
  case "rien":
    break;
}
$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : null;


include_once('template.php');
?>