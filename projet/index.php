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


$module = isset($_GET['module']) ? $_GET['module'] : 'rien' ;
switch ($module) {
     case "connexion":
        new ModConnexion();
      break;
     case "rien":
      break;
}


include_once('template.php');
?>