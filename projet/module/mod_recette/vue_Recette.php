<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
  
       
        public function afficher_form_Recette(){
            echo '</br>Ajouter une nouvelle Recette';
            
            echo'   <form method="post" action="index.php?module=connexion&action=inscription">
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
            <input type="submit" value="envoyer">
        </form>';
                     
        }



        public function menu(){
    
        }
    }
?>