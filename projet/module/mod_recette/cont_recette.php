<?php

   require_once('vue_recette.php');
   require_once('modele_recette.php');
      class ContRecette{
         private $vue; 
         private $modele;
         private $action; 
         private $nbingr;
         public function __construct() {
         $this->vue=new VueRecette();
         $this->modele=new ModeleRecette();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
        
      }


   public function afficher_form_Recette(){
   
      $this->vue-> afficher_form_Recette($this->modele->recupererListeIngredient(),$_POST['nbIngr']);
     
   }

       
   public function ajouterRecetteDansLaBD(){
      $titre=$_POST['titre'];
      $tpsPrepa=$_POST['tpsPreparration'];
      $description=$_POST['description'];
      $annexe=$_POST['annexe'];
     $vegan=$_POST['vegan'];


     $this->modele->ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan,$this->nbingr);

      for ($i=0; $i<$_GET['nbIngr']; $i++) {
         echo 'quantite :'.$_POST['quantite'.$i.''];
       echo 'unite :'.$_POST['unite'.$i.''];
       echo 'ingredient : '.$_POST['ingredient'.$i.'']; 

       $this->modele->ajouter_Ingredient_dans_recette($_POST['ingredient'.$i.''],$_POST['quantite'.$i.''],$_POST['unite'.$i.'']);
      }
   }

   public function choisirNbIngredient(){
      $this->vue->afficherChoixNbIngredient();
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
            case "choisirNbIngredient":
                  $this->choisirNbIngredient();
               break;
            case "ajouterRecetteDansLaBD":
             
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