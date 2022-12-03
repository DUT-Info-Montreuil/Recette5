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
      $ingr=$this->modele->recupererListeIngredient();
      $this->vue-> afficher_form_Recette($ingr);

   }

   public function afficherMesRecettes(){
      $this->vue->afficherMesRecette($this->modele->afficherMesRecette());
   }
   public function afficherMaRecette(){
      $this->vue->afficherMaRecette($this->modele->afficherMaRecette($_GET['idRecette']), $this->modele->afficherPhoto($_GET['idRecette']) , $this->modele->afficherIngredientDeMaRecette($_GET['idRecette']), $this->modele->afficherCategories($_GET['idRecette']) );
   }

   public function AffichermodifierMaRecette(){
      $this->vue->afficherFormModifRecette($this->modele->afficherMaRecette($_GET['idRecette']),$this->modele->recupererListeIngredient(),$this->modele->afficherIngredientDeMaRecette($_GET['idRecette']));
   }






      public function exec(){     
         switch ($this->action) {
            case "bienvenue":
               echo 'bienvenue';
               break;  

            case "AfficherFormAjoutRecette":
                  
                   $this->afficher_form_Recette();
                   include('module/mod_recette/ajax/ajoutRecette/fonctionAjaxAjoutRecette.php') ;
                   include('module/mod_recette/ajax/ajouterCategorie/fonctionCategorie.php') ;
            break;

           

               
            case "afficherMesRecettes":
               $this->afficherMesRecettes();
               break;
            case "afficherMaRecette":

              if($this->modele->verifierSiRecetteExiste($_GET['idRecette'])==1){
                  $this->afficherMaRecette();
                  include('module/mod_recette/ajax/likerRecette/fonctionAjaxLike.php');
              }
                
               else
                  echo"recette inexistante";
               
            break;

          case "AffichermodifierMaRecette":
               
            if($this->modele->verifierSiRecetteExiste($_GET['idRecette'])!=1){
               echo"recette inexistante";
            }
            elseif($_SESSION['id']==$this->modele->recupererIdDuPropietaireDeLaRecette($_GET['idRecette'])){
              
               $this->AffichermodifierMaRecette();
               include('module/mod_recette/ajax/ajouterCategorie/fonctionCategorie.php') ;
               include('module/mod_recette/ajax/modifierRecette/fonctionAjaxModifierRecette.php') ;
            }else{
               echo"cette recette ne vous appartient pas";
            }
            break;


         case "afficherLiker" :
            $this->vue->afficherMesRecette($this->modele->recetteLiker());
            break;
         


      }
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>