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
      $this->vue-> afficher_form_Recette($this->modele->recupererListeIngredient());
   }

       
   public function ajouterRecetteDansLaBD(){
      $titre=$_POST['titre'];
      $tpsPrepa=$_POST['tpsPreparration'];
      $description=$_POST['description'];
      $annexe=$_POST['annexe'];
      $vegan=$_POST['vegan'];


      $this->modele->ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan);
   }

   public function afficherMesRecettes(){


      $this->vue->afficherMesRecette($this->modele->afficherMesRecette());
   }
      public function exec(){     
         switch ($this->action) {
         
            case "bienvenue":
               echo 'bienvenue';
            break;  
            case "AfficherFormAjoutRecette":
              $this->afficher_form_Recette();
            break;
            case "ajouterRecetteDansLaBD":
               echo'test';
               $this->ajouterRecetteDansLaBD();
            
            break;
            case "afficherMesRecette":
       
               $this->afficherMesRecettes();
            
            break;
         }      
         $this->vue->menu();
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>