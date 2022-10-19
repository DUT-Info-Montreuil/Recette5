<?php

   require_once('vue_recette.php');
   require_once('modele_recette.php');
      class ContRecette{
         private $vue; 
         private $modele;
         private $action; 
      public function __construct() {
         $this->vue=new VueRecette();
         $this->modele=new ModeleRecette();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
      }


   public function afficher_form_Recette(){
      $this->vue-> afficher_form_Recette();
   }

       
      public function exec(){     
         switch ($this->action) {
         
            case "bienvenue":
               echo 'bienvenue';
            break;  
            case "AfficherFormAjoutRecette":
              $this->afficher_form_Recette();
            break;
         }      
         $this->vue->menu();
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>