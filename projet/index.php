<?php
#module
require_once('module/mod_connexion/mod_connexion.php');
require_once('module/mod_recette/mod_recette.php');
require_once('module/mod_recherche/mod_recherche.php');
require_once('module/mod_profil/mod_profil.php');
require_once('module/mod_admin/mod_admin.php');
#composant
require_once('composants/menu/comp_menu.php');
require_once('composants/logo/comp_logo.php');
#connexion
require_once('connexion.php');

$compMenu = new CompMenu();
$compLogo = new CompLogo();
session_start();
$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$affiche;
$ListIngredient;
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
      case "profil" :
        new ModProfil();
        break;
      case "admin" :
        new ModAdmin();
        break;
     case "rien":
      header("index.php?module=connexion&action=bienvenue");
      break;
}
$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : null;


include_once('template.php');
?>
<!----------------
Version 1.0 - 2022/12/5
GNU GPL Copyleft © 2022-2032 
Initiated by Emilio & Priyank
Web Site = <https://Recette5>
------------------>