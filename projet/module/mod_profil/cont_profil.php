<?php
require_once("vue_profil.php");
require_once("modele_profil.php");
class ContProfil{
    private $vue;
    private $modele;
    private $action;

public function __construct(){
    $this->vue = new VueProfil();
    $this->modele = new ModeleProfil();
    $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
}  

public function afficherProfil(){
    $this->vue->afficherProfil($this->modele->profil());
}

public function exec(){
    switch ($this->action){
        case "afficherProfil" :
            $this->afficherProfil();
            break;
        case "bienvenue" : 
            echo 'bienvenue';
            break;
    }
    global $affiche; 
    $affiche=$this->vue->getAffichage(); 
}

}

?>
