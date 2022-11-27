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
      $this->vue->afficherMaRecette($this->modele->afficherMaRecette($_GET['idRecette']), $this->modele->afficherPhoto($_GET['idRecette']) , $this->modele->afficherIngredientDeMaRecette($_GET['idRecette']));
   }

   public function AffichermodifierMaRecette(){
      $this->vue->afficherFormModifRecette($this->modele->afficherMaRecette($_GET['idRecette']));
   }


   public function modifierMaRecette(){

      $titre=$_POST['titre'];
      $tpsPrepa=$_POST['tpsPreparration'];
      $description=$_POST['description'];
      $annexe=$_POST['annexe'];
     
     
      if(isset($_POST['vegan'])){
         $vegan='1';
      }else{
         $vegan='0';
      }

      
     $this->modele->modifierMaRecette($_GET['idRecette'],$titre,$tpsPrepa,$description,$annexe,$vegan,$this->nbingr);
      

     $this->gerer_ajout_photo(($_FILES),1);

   }



      public function exec(){     
         switch ($this->action) {
            case "bienvenue":
               echo 'bienvenue';
               break;  

            case "AfficherFormAjoutRecette":
               $this->afficher_form_Recette();
               break;

           

               
            case "afficherMesRecettes":
               $this->afficherMesRecettes();
               break;
            case "afficherMaRecette":

              if($this->modele->verifierSiRecetteExiste($_GET['idRecette'])==1)
                  $this->afficherMaRecette();
               else
                  echo"recette inexistante";
               
            break;

          case "AffichermodifierMaRecette":
               
            if($this->modele->verifierSiRecetteExiste($_GET['idRecette'])!=1){
               echo"recette inexistante";
            }
            elseif($_SESSION['id']==$this->modele->recupererIdDuPropietaireDeLaRecette($_GET['idRecette'])){
               $this->AffichermodifierMaRecette();
            }else{
               echo"cette recette ne vous appartient pas";
            }
            break;

         case "modifierMaRecette":
            
            if($_SESSION['id']==$this->modele->recupererIdDuPropietaireDeLaRecette($_GET['idRecette'])){
               $this->modifierMaRecette();
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