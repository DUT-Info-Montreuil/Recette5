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
        public function afficher_form_Recette($tabIngr){
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
';for ($i=0; $i<10; $i++) {
    echo'<br>';
    echo' Ingredient '.($i+1).'  <select> name="ingredient'.$i.'"';
   
    foreach( $tabIngr as $value ){
      echo'   <option value="'.$value['nomIngredient'].' ">'.$value['nomIngredient'].'</option>';
    
    }
   
   
    echo' </select>';
    echo' quantite <input type="texte" name"quantite"<br>';
    echo'Unite :  <select> name="" ';   
    echo'   <option value="kg">kg</option>';
    echo'   <option value="g">g</option>';
    echo'   <option value="mg">mg</option>';
    echo'   <option value="nb">nb</option>';
    echo'   <option value="l">l</option>';
    echo'   <option value="ml">ml</option>';
    echo' </select>';
    echo'<br>';
}

          
       echo ' <input type="submit" value="envoyer"> </form>';
                     
        }



        public function menu(){
    
        }
    }
?>