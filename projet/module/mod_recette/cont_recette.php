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


   public function gerer_ajout_photo($photo){
     
      if(isset($photo['file'])){
         $tmpName = $photo['file']['tmp_name'];
         $name = $photo['file']['name'];
         $size = $photo['file']['size'];
         $error = $photo['file']['error'];
     
         $tabExtension = explode('.', $name);
         $extension = strtolower(end($tabExtension));
     
         $extensions = ['jpg', 'png', 'jpeg', 'gif'];
         $maxSize = 4000000000;
    
   
         if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
     
             $uniqueName = uniqid('', true);
             $file = $uniqueName.".".$extension;
             move_uploaded_file($tmpName, './image_recette/'.$file);
     
            $this->modele->ajouterPhotoDansLaRecette($file);
             echo "Image enregistrée";
         }
         else{

            if(!in_array($extension, $extensions)){
               echo'mauvaise extension';
            }else if($size <= $maxSize){
               echo "fichier trop grand";
            }else{
               echo "Une erreur est survenue";
            }
               
            }
            
         }
        
     }
   
    
   

       
   public function ajouterRecetteDansLaBD(){
     

      $titre=$_POST['titre'];
      $tpsPrepa=$_POST['tpsPreparration'];
      $description=$_POST['description'];
      $annexe=$_POST['annexe'];
      $vegan=$_POST['vegan'];


     $this->modele->ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan,$this->nbingr);

      for ($i=0; $i<$_GET['nbIngr']; $i++) {
       $this->modele->ajouter_Ingredient_dans_recette($_POST['ingredient'.$i.''],$_POST['quantite'.$i.''],$_POST['unite'.$i.'']);
      }


      
     $this->gerer_ajout_photo(($_FILES));
   }

   public function choisirNbIngredient(){
      $this->vue->afficherChoixNbIngredient();
   }

   public function afficherMesRecettes(){
      $this->vue->afficherMesRecette($this->modele->afficherMesRecette());
   }
   public function afficherMaRecette(){
      
      $this->vue->afficherPhoto($this->modele->afficherPhoto($_GET['idRecette']));
      $this->vue->afficherMaRecette($this->modele->afficherMaRecette($_GET['idRecette']));
      $this->vue->afficherIngredientDeMaRecette($this->modele->afficherIngredientDeMaRecette($_GET['idRecette']));
      $this->vue->afficherNbLikes($this->modele->reccupererNbLike($_GET['idRecette']));
   
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
            case "afficherMaRecette":
       
               $this->afficherMaRecette();
            
            break;
         }      
         $this->vue->menu();
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>