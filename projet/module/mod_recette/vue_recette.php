<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
         public function afficherMesRecette($recette){    
            foreach( $recette as $value ){
               echo 
               '<a href="index.php?module=recette&action=afficherMaRecette&idRecette='.htmlspecialchars($value['idRecette']).'"><div id="recette"><div class="photo">
               <img id="pho" alt="photo de la recette" src="image_recette/'.htmlspecialchars($value['photo']).'" >
                   </div>
                   <div class="info">
                       <h1>'.htmlspecialchars($value['titre']).'</h1>
                       <p>'.htmlspecialchars($value['description']).'</p>
                   </div>
               </div></a>';
            }
         }


         public function afficherMaRecette($recette){
            echo '<h1> '.htmlspecialchars($recette['titre']).'</h1>';   
            echo' description  : <br>'.htmlspecialchars($recette['description']).' <br>';     
            if($_SESSION['id']==$recette['idUtilisateur'])
            echo '<a href="index.php?module=recette&action=AffichermodifierMaRecette&idRecette='.htmlspecialchars($recette['idRecette']).'">modifier recette </a>';
         }

         public function afficherPhoto($photo){
            if(!isset($photo['photo']))
               echo '<img src="image/index.jpeg" width="200" height="200">';
            else
               echo '<img src="image_recette/'.htmlspecialchars($photo['photo']).'" width="200" height="200">';          
            }

         public function afficherIngredientDeMaRecette($Ingredient){
            echo '<h2>voici la liste des ingrédients</h2>';
            foreach( $Ingredient as $value ){
               echo '<br> '.htmlspecialchars($value['nomIngredient']).' : '.htmlspecialchars($value['Quantite']).' '.htmlspecialchars($value['unite']).'';
            }
          }

         public function afficherNbLikes($nbLike){
            echo "nb de likes : ".htmlspecialchars($nbLike['count(aime)']); 
         }

         public function afficherChoixNbIngredient(){
            echo '
               <form method="post" action="index.php?module=recette&action=AfficherFormAjoutRecette">
                  Entrez le nombre d\'ingredient: <input type="text" name="nbIngr">
                  <input type="submit" value="envoyer">
               </form>
               ';  
          }

         public function afficher_form_Recette($tabIngr,$nbIngr){   
            echo'
            <form method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD&nbIngr='.htmlspecialchars($nbIngr).'" enctype="multipart/form-data">
               <label for="file">Fichier</label>
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
                      echo'   <option value="'.htmlspecialchars($value['idIngredient']).' ">'.htmlspecialchars($value['nomIngredient']).'</option>';
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

        public function afficherFormModifRecette($recette){
    
    
         echo'
         <form method="post" action="index.php?module=recette&action=modifierMaRecette&idRecette='.htmlspecialchars($recette['idRecette']).'" enctype="multipart/form-data">
            <label for="file">photo</label>
            <input type="file" name="file"><br />
            <label for="titre"> nom Recette :</label>
            <input type="text" name="titre" value="'.htmlspecialchars($recette['titre']).'">
            <br />
            <label for="tpsPreparrration">temps de préparation : </label>
            <input type="text" name="tpsPreparration" value="'.htmlspecialchars($recette['tpsPreparration']).'">
            <br />
            Description: <input type="textArea" name="description" value="'.htmlspecialchars($recette['description']).'">
            <br />
            note annexe: <input type="textArea" name="annexe" value="'.htmlspecialchars($recette['noteAnnexe']).'">
            <br />' ;

            if($recette['vegan']==1){
               echo '  vegan: <input type="checkbox" name="vegan" checked="checked">
               <br />';
            }else{
               echo '  vegan: <input type="checkbox" name="vegan" >
               <br />';
            }
          
           
         echo'<input type="submit" value="envoyer"> </form>';
        }
        
    }
?>