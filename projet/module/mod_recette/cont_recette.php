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


   public function gerer_ajout_photo($photo){

      if(isset($photo['file'])){
         $tmpName = $photo['file']['tmp_name'];
         $name = $photo['file']['name'];
         $size = $photo['file']['size'];
         $error = $photo['file']['error'];
         $tabExtension = explode('.', $name);
         $extension = strtolower(end($tabExtension));
         $extensions = ['jpg', 'png', 'jpeg', 'gif'];
         $maxSize = 9000000000000000;
    
   

         if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
     
             $uniqueName = uniqid('', true);
             $file = $uniqueName.".".$extension;
             move_uploaded_file($tmpName, './image/image_recette/'.$file);
     
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
            $source = './image/image_recette/vide.png';
            $destination = './image/image_recette/'.$file.'';
            copy($source, $destination);
            $this->modele->ajouterPhotoDansLaRecette($file);
               echo "Image enregistrée remp";


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
         if($_FILES['file']['name']==null){
            $this->modele->ajouterPhotoDansLaRecette(null);
         }else{
            $this->gerer_ajout_photo(($_FILES));
         }

   }



   public function afficherMesRecettes(){
      $this->vue->afficherMesRecette($this->modele->afficherMesRecette());
   }
   public function afficherMaRecette(){
     
      if(!isset($_SESSION['id'])){
         $this->vue->afficherRecetteNonConnecter($this->modele->afficherMaRecette($_GET['idRecette']));
      }else{
         $this->vue->afficherMaRecette($this->modele->afficherMaRecette($_GET['idRecette']));
      }
    
      $this->vue->afficherIngredientDeMaRecette($this->modele->afficherIngredientDeMaRecette($_GET['idRecette']));
      $this->vue->afficherNbLikes();
   
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

           

               
            case "afficherMesRecette":
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
         


      }
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>