<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();  

        }
       
        public function afficherMesRecette($recette){
            if($recette == null){
                echo 'Aucune recette';
            }
            foreach($recette as $value){
                echo'id recette:'.$value['idRecette'].'  titre '.$value['titre'].' description '.$value['description'].' <br>';
            }
        }

        public function afficher_form_Recette($tabIngr){
            echo '</br>Ajouter une nouvelle Recette';
       
            echo'<form method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD">
            Nom : <input type="text" name="titre">
            <br />
            Préparation : <input type="text" name="tpsPreparration"> minutes    
            <br />
            Description: <input type="textArea" name="description">
            <br />
            Note annexe: <input type="textArea" name="annexe" >
            <br />
            Vegan: <input type="checkbox" name="vegan" >
            <br />';
            for ($i=0; $i<1; $i++) {
                echo'<br>';
                echo' Ingredient '.($i+1).'  <select> name="ingredient'.$i.'"';
                foreach( $tabIngr as $value ){  
                    echo'   <option value="'.$value['nomIngredient'].' ">'.$value['nomIngredient'].'</option>';
                }
                echo' </select>';
                echo' quantite <input type="texte" name"quantite"<br>';
                echo'Unite :' ; 
                echo'<select> name="" ';   
                echo'<option value="kg">kg</option>';
                echo'<option value="g">g</option>';
                echo'<option value="mg">mg</option>';
                echo'<option value="nb">nb</option>';
                echo'<option value="l">l</option>';
                echo'<option value="ml">ml</option>';
                echo'</select><br><br>';
            }
            echo '<input type="submit" value="envoyer"> ';    
            echo '<input type="submit" value="ajouter" name="button1"></form>' ;      
            echo $_POST['button1'];
        }
    }
?>