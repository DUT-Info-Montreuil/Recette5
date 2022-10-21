<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
         public function afficherMesRecette($recette){
       
            foreach( $recette as $value ){
            //    echo'id recette:'.$value['idRecette'].'  titre '.$value['titre'].' description '.$value['description'].' <br>';
            echo '<br><a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'">id recette:'.$value['idRecette'].' '.$value['titre'].'</a>';

            }
         }


         public function afficherMaRecette($recette){
       
            
           echo'id recette:'.$recette['idRecette'].'  titre '.$recette['titre'].' description '.$recette['description'].' <br>';
          
            
         }

         public function afficherIngredientDeMaRecette($Ingredient){
       
            echo 'voici la liste des ingrédients';
            foreach( $Ingredient as $value ){
               echo '<br> '.$value['nomIngredient'].' : '.$value['Quantite'].''.$value['unite'].'';
                
            }
             
          }

         public function afficherChoixNbIngredient(){
            echo '</br>Ajouter une nouvelle Recette
       
             <form method="post" action="index.php?module=recette&action=AfficherFormAjoutRecette">
             Entrez le nombre d ingredient: <input type="text" name="nbIngr">
            <input type="submit" value="envoyer"> </form>';
                     
             
         }

        public function afficher_form_Recette($tabIngr,$nbIngr){
            echo '</br>Ajouter une nouvelle Recette';
       
            echo'  <form method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD&nbIngr='.$nbIngr.'">
                nom Recette : <input type="text" name="titre">
                <br />
                temps de préparation : <input type="text" name="tpsPreparration">
                <br />
                Description: <input type="textArea" name="description">
                <br />

                note annexe: <input type="textArea" name="annexe">
                <br />
                vegan: <input type="checkbox" name="vegan">
                <br />'
            ;
            for ($i=0; $i<$nbIngr; $i++) {
                echo'<br>';
                echo' Ingredient '.($i+1).'  <select name="ingredient'.$i.'">';
            
                foreach( $tabIngr as $value ){
                echo'   <option value="'.$value['idIngredient'].' ">'.$value['nomIngredient'].'</option>';
                
                }
            
        
        echo' </select>';
    
         echo'  quantite : <input type="text" name="quantite'.$i.'">';   
        echo'  unite : <input type="text" name="unite'.$i.'">';   
        echo'<br>';
        
}

          
       echo ' <input type="submit" value="envoyer"> </form>';
                     
        }



        public function menu(){
    
        }
    }
?>