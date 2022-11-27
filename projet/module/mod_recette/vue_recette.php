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
                       <h1>'.htmlspecialchars($value['titre']).'</h1>
                       <p>'.htmlspecialchars($value['description']).'</p>
                   </div>
               </div></a>';
            }
         }


         public function afficherMaRecette($recette){
            if($recette['photo']==null)
               $recette['photo']="vide.png";
            echo '<img src="image/image_recette/'.$recette['photo'].'" width="200" height="200">';    
            echo '<h1> '.htmlspecialchars($recette['titre']).'</h1>';   
            echo' description  : <br>'.htmlspecialchars($recette['description']).' <br>';  
            
            if(isset($_SESSION['login'])){
           echo'<div id="divBoutonDeLike">
               </div>'
            ;
               if($_SESSION['id']==$recette['idUtilisateur'])
               echo '<a href="index.php?module=recette&action=AffichermodifierMaRecette&idRecette='.htmlspecialchars($recette['idRecette']).'">modifier recette </a>';

               echo '<form action= "index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur='.$recette['idUtilisateur'].'" method="POST">
                  <input type="submit" value="voir profil"/>
               </form>';
            }
          }
          public function afficherRecetteNonConnecter($recette){
            echo '<h1> '.htmlspecialchars($recette['titre']).'</h1>';   
            echo' description  : <br>'.htmlspecialchars($recette['description']).' <br>';  

               
           
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
               echo '<br> '.htmlspecialchars($value['nomIngredient']).' : '.htmlspecialchars($value['Quantite']).' '.htmlspecialchars($value['unite']).'';
            }
          }

         public function afficherNbLikes(){
            echo"<div id='nbLike'>";
           
            echo"</div>";
            
  
         }
 
         public function afficherChoixNbIngredient(){
            echo '
               <form method="post" action="index.php?module=recette&action=AfficherFormAjoutRecette">
                  Entrez le nombre d\'ingredient: <input type="text" name="nbIngr">
                  <input type="submit" value="envoyer">
               </form>
               ';  
          }

         public function afficher_form_Recette($tabIngr){   
            global $ListIngredient;
            
         
      
            echo'
            
            <form action="#" method="post" onsubmit="return false" id="formcom">
            <div id="errorRecette"></div>
               <div id="validerAjout"></div>
            <div id="formulaireRecette">
               
         
            
               <label for="titre"> nom Recette :</label>
               <input type="text" name="titre">
               <br />
               <label for="file">Photo de la recette</label>
               <input type="file" name="file_photoRecette" id="id_file_photo_Recette" />
               <label for="tpsPreparrration">temps de préparation : </label>
               <input type="text" name="tpsPreparration">
               <br />
               Description: <input type="textArea" name="description">
               <br />
               note annexe: <input type="textArea" name="annexe">
               <br />
               vegan: <input type="checkbox" id="vegan">
               <br />

               <div id=divIngredient1"> 
               
                  ingredient :<select name="ingredient1" id="ingredient1" form="formcom">  ';
                  foreach( $tabIngr as $value ){
                           echo'  <option value="'.htmlspecialchars($value['idIngredient']).' ">'.htmlspecialchars($value['nomIngredient']).'</option>';
                  }  
                  echo' </select>
               quantite : <input type="text" name="quantite1">   
               <select name="unite1" form="formcom">   
                           <option value="kg">kg</option>
                           <option value="g">g</option>
                           <option value="mg">mg</option>
                           <option value="nb">nb</option>
                           <option value="l">l</option>
                           <option value="ml">ml</option>
               </select>

                  
                  </div>
               <div id="divContenantLesIngredient"> 
            
               </div>';


            echo'
               <button type="button" id="ajtIngredient" targetId="divContenantLesIngredient" value="ajouter ingr"/>ajt ingredient </button>
               <button type="button" id="suppIngredient"  />supprimer ingredient </button>
               <input id="boutonvaliderAJout" type="submit" value="Valider"/>
            </div>
            ';
          
           
            
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