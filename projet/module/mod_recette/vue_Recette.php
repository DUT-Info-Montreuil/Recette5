<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
         public function afficherMesRecette($recette){
       
            foreach( $recette as $value ){
                echo'id recette:'.$value['idRecette'].'  titre '.$value['titre'].' description '.$value['description'].' <br>';
            
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
       
            echo'  <form method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD">
            nom Recette : <input type="text" name="titre">
            <br />
            temps de préparation : <input type="text" name="tpsPreparration">
            <br />
            Description: <input type="textArea" name="description">
            <br />

            note annexe: <input type="textArea" name="annexe">
            <br />
            vegan: <input type="checkbox" name="vegan">
            <br />
';for ($i=0; $i<$nbIngr; $i++) {
    echo'<br>';
    echo' Ingredient '.($i+1).'  <select> name="ingredient'.$i.'"';
   
    foreach( $tabIngr as $value ){
      echo'   <option value="'.$value['nomIngredient'].' ">'.$value['nomIngredient'].'</option>';
    
    }
   
   
   echo' </select>';
  
   echo' quantite <input type="texte" name"quantite"<br>';
echo' unite <input type="texte" name"unite"';   
echo'<br>';
}

          
       echo ' <input type="submit" value="envoyer"> </form>';
                     
        }



        public function menu(){
    
        }
    }
?>