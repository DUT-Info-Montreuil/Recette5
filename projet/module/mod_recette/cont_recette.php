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


   public function gerer_ajout_photo($photo,$modif){

      if($modif==1){
         
     $anciennePhoto=$this->modele->afficherPhoto($_GET['idRecette']);
     
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
        
               $this->modele->modifierPhotoDansLaRecette($file,$anciennePhoto['photo']);
               unlink('./image_recette/'.$anciennePhoto['photo']);
                echo "<br> Image enregistrée";
            }
            else{ 
               echo "<br>";
   
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
   else{
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
            
            echo "<br>";

            if(!in_array($extension, $extensions)){
               echo'mauvaise extension';
            }else if($size <= $maxSize){
               echo "fichier trop grand";
            }else{
               echo "Une erreur est survenue";
            }
            echo "<br>";
            echo "une image de base a été ajouter vous pourrez la modifier plus tard";


            $uniqueName = uniqid('', true);
            $file = $uniqueName.".png";
            $source = './image_recette/vide.png';
            $destination = './image_recette/'.$file.'';
            copy($source, $destination);
            $this->modele->ajouterPhotoDansLaRecette($file);
               echo "Image enregistrée remp";


            }
            
         }

      }
     
     }
   
    
   

       
   public function ajouterRecetteDansLaBD(){
      $titre=$_POST['titre'];
      $tpsPrepa=$_POST['tpsPreparration'];
      $description=$_POST['description'];
      $annexe=$_POST['annexe'];
      
      if(isset($_POST['vegan'])){
         $vegan='1';
      }else{
         $vegan='0';
      }
     $this->modele->ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan,$this->nbingr);
  
      for ($i=0; $i<$_GET['nbIngr']; $i++) {
       $this->modele->ajouter_Ingredient_dans_recette($_POST['ingredient'.$i.''],$_POST['quantite'.$i.''],$_POST['unite'.$i.'']);
      }

     $this->gerer_ajout_photo(($_FILES),0);
   }


   public function choisirNbIngredient(){
      $this->vue->afficherChoixNbIngredient();
   }

   public function afficherMesRecettes(){
      $this->vue->afficherMesRecette($this->modele->afficherMesRecette());
   }
   public function afficherMaRecette(){
      $this->vue->afficherPhoto($this->modele->afficherPhoto($_GET['idRecette']));
      $this->vue->afficherMaRecette($this->modele->afficherMaRecette($_GET['idRecette']),$this->modele->verifierLike($_GET['idRecette']));
      $this->vue->afficherIngredientDeMaRecette($this->modele->afficherIngredientDeMaRecette($_GET['idRecette']));
      $this->vue->afficherNbLikes($this->modele->reccupererNbLike($_GET['idRecette']));
   
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


   public function likerLaRecette($idRecette){
      $this->modele->likerLaRecette($idRecette);
   }

   public function RetirerLikeRecette($idRecette){
      $this->modele->RetirerLikeRecette($idRecette);
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

          case "AffichermodifierMaRecette":
              $this->AffichermodifierMaRecette();
            break;

         case "modifierMaRecette":
            $this->modifierMaRecette();
            break;
         

         case "likerLaRecette":
            $this->likerLaRecette($_GET['idRecette']);
         break;

         case "RetirerLikeRecette":
            $this->RetirerLikeRecette($_GET['idRecette']);
            break;

      }
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>