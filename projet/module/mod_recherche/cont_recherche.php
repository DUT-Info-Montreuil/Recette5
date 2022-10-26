<?php

   require_once('vue_recherche.php');
   require_once('modele_recherche.php');
      class ContRecherche{
         private $vue; 
         private $modele;
         private $action; 
      public function __construct() {
         $this->vue=new VueRecherche();
         $this->modele=new ModeleRecherche();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
        

         
      }


    public function exec(){     
        switch ($this->action) {
        
           case "bienvenue":
              echo 'bienvenue';
           break;  
           case "toute":
             $this->afficherRecette();
           break;
        }      
        global $affiche; 
        $affiche=$this->vue->getAffichage();   
    } 

    public function afficherRecette(){
        $this->vue->afficherRecette($this->modele->touteRecette());
    }
}
?>