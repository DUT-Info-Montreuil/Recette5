<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
         public function afficherMesRecette($recette){    
            foreach( $recette as $value ){
               echo 
               '<a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'"><div id="recette"><div class="photo">
               <img id="pho" alt="photo de la recette" src="image/image_recette/'.$value['photo'].'" >
                   </div>
                   <div class="info">
                       <h1>'.$value['titre'].'</h1>
                       <p>'.$value['description'].'</p>
                   </div>
               </div></a>';
            }
         }


         public function afficherMaRecette($recette){
            echo '<h1> '.$recette['titre'].'</h1>';   
            echo' description  : <br>'.$recette['description'].' <br>';     
         }

         public function afficherPhoto($photo){
         if(!isset($photo['photo']))
            echo '<img src="image/index.jpeg" width="200" height="200">';
         else
            echo '<img src="image/image_recette/'.$photo['photo'].'" width="200" height="200">';          
         }

         public function afficherIngredientDeMaRecette($Ingredient){
            echo '<h2>voici la liste des ingrédients</h2>';
            foreach( $Ingredient as $value ){
               echo '<br> '.$value['nomIngredient'].' : '.$value['Quantite'].' '.$value['unite'].'';
            }
          }

         public function afficherNbLikes($nbLike){
            echo "nb de likes : ".$nbLike['count(aime)']; 
         }

         public function afficherChoixNbIngredient(){
            echo '
            <form method="post" action="index.php?module=recette&action=AfficherFormAjoutRecette">
               Entrez le nombre d\'ingredient: <input type="text" name="nbIngr">
               <input type="submit" value="envoyer">
            </form>';   
         }

        public function afficher_form_Recette($tabIngr,$nbIngr){   
            echo'
            <form method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD&nbIngr='.$nbIngr.'" enctype="multipart/form-data">
               <label for="file">Photo de la recette</label>
               <input type="file" name="file"><br />
               <label for="titre"> nom Recette :</label>
               <input type="text" name="titre">
               <br />
               <label for="tpsPreparrration">temps de préparation : </label>
               <input type="text" name="tpsPreparration">
               <br />
               Description: <input type="textArea" name="description">
               <br />
               note annexe: <input type="textArea" name="annexe">
               <br />
               vegan: <input type="checkbox" name="vegan">
               <br />' ;
               for ($i=0; $i<$nbIngr; $i++) {
                  echo'<br>';
                  echo' Ingredient '.($i+1).'  <select name="ingredient'.$i.'">';
                  foreach( $tabIngr as $value ){
                      echo'   <option value="'.$value['idIngredient'].' ">'.$value['nomIngredient'].'</option>';
                  }     
                  echo'</select>';
                  echo'quantite : <input type="text" name="quantite'.$i.'">';   
                  echo'<select name="unite'.$i.'">';   
                  echo'<option value="kg">kg</option>';
                  echo'<option value="g">g</option>';
                  echo'<option value="mg">mg</option>';
                  echo'<option value="nb">nb</option>';
                  echo'<option value="l">l</option>';
                  echo'<option value="ml">ml</option>';
                  echo'</select><br><br>';
                  echo'<br>';  
               }
            echo'<input type="submit" value="envoyer"> </form>';
        }
        
    }
?>