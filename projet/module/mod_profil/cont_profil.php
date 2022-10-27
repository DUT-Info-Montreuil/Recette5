<?php
    require_once('vue_profil.php');
    require_once('modele_profil.php');
    class ContProfil{
        private $vue; 
        private $modele;
        private $action; 
    public function __construct() {
        $this->vue=new VueProfil();
        $this->modele=new ModeleProfil();
        $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
    }
       
    public function exec(){     
        switch ($this->action) {
            case "AfficherMonProfil": 
               $this->afficher_profil();
               break;
        }      
        global $affiche; 
        $affiche=$this->vue->getAffichage();   
    } 

    public function afficher_profil(){
        $this->vue->afficherProfil($this->modele->profil());
    }
}
?>