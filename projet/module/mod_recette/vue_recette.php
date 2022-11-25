<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
         
         /*------------afficher toutes les recettes-------------*/
         public function afficherMesRecette($recette){    
            foreach( $recette as $value ){
               if($value['photo'] != NULL){
                  $photo= $value['photo'];
                  
               }
               else{
                  $photo = 'plat.png';
               }
                  
               echo 
               '
               <div class="col">
               <div class="card shadow-sm">
                 
                  <img src="image/image_recette/'.$photo.'"  width="100%" height="225">
                 <div class="card-body">
                   <p class="card-text">'.$value['description'].'</p>
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="btn-group">
                      <a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                     </div>
                     <small class="text-muted">'.$value['datePublication'].'</small>
                   </div>
                 </div>
               </div>
             </div> ';
            }
         }

         /*-----------------------afficher les détails d'une recette-----------------------*/
         public function afficherMaRecette($recette){
            
            
               if($_SESSION['id']==$recette['idUtilisateur'])
               echo '<a href="index.php?module=recette&action=AffichermodifierMaRecette&idRecette='.htmlspecialchars($recette['idRecette']).'">modifier recette </a>';

               echo '<form action= "index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur='.$recette['idUtilisateur'].'" method="POST">
                  <input type="submit" value="voir profil"/>
               </form>';
            
  
         
               echo'
         <section class="py-5">
         <div class="container px-4 px-lg-5 my-5">
         <div class="row gx-4 gx-lg-5 align-items-center">
             <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..."></div>
             <div class="col-md-6">
                 <div class="small mb-1">SKU: BST-498</div>
                 <h1 class="display-5 fw-bolder">'.htmlspecialchars($recette['titre']).'</h1>
                 <div class="fs-5 mb-5">
                     <span class="text-decoration-line-through">$45.00</span>
                     <span>$40.00</span>
                 </div>
                 <p class="lead">'.htmlspecialchars($recette['description']).'</p>
                 <div class="d-flex">';
                 if(isset($_SESSION['login'])){
                  echo'<div id="divBoutonDeLike">
                      </div>';
                 }
                 echo '<div id="nbLike">
           
                 </div>
                     </button>
                 </div>
             </div>
         </div>
     </div>
      </section>';
          }

         public function afficherPhoto($photo){
         if(isset($photo['photo']))
            echo '<img src="image/image_recette/'.$photo['photo'].'" width="200" height="200" >';         
         }
            

         public function afficherIngredientDeMaRecette($Ingredient){
            echo '<h2>voici la liste des ingrédients</h2>';
            foreach( $Ingredient as $value ){
               echo '<br> '.htmlspecialchars($value['nomIngredient']).' : '.htmlspecialchars($value['Quantite']).' '.htmlspecialchars($value['unite']).'';
            }
          }

         public function afficherNbLikes(){
         
   }
         /*--------------supprimer-----------------*/
         public function afficherChoixNbIngredient(){
            echo '
               <form method="post" action="index.php?module=recette&action=AfficherFormAjoutRecette">
                  Entrez le nombre d\'ingredient: <input type="text" name="nbIngr">
                  <input type="submit" value="envoyer">
               </form>
               ';  
          }

          /*----------------afficher le formulaire de la recette---------------------*/
         public function afficher_form_Recette($tabIngr,$nbIngr){   
               echo '
            <div class="container">
                <div class="col-md-7 col-lg-8">
                  <h4 class="mb-3">Ajouter une Recette</h4>
                  <hr class="my-4">
                  <form class="needs-validation" novalidate method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD&nbIngr='.$nbIngr.'" enctype="multipart/form-data">';
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
                     echo'
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="firstName" name="titre" required>
                      </div>
                  
                      <div class=" col-12">
                        <label for="formFile" class="form-label">Photo de la recette<span class="text-muted">(Optional)</span></label>
                        <input class="form-control" name="file" type="file" id="formFile">
                     </div>
          
                      <div class="col-md-3">
                      <label for="country" class="form-label">Heure</label>
                      <select class="form-select" id="country" name="heure" required>
                        <option value="0">Choose...</option>
                        ';
                        for($i=0 ; $i<10 ; $i++){
                           echo'<option>'.$i.'</option>';
                        };
                        echo '
                      </select>
                    </div>
        
                    <div class="col-md-3">
                      <label for="state" class="form-label">Minutes</label>
                      <select class="form-select" id="state" name="min" required>
                        <option value="10">Choose...</option>
                        ';
                        for($i=10 ; $i<60 ; $i=$i+10){
                           echo'<option>'.$i.'</option>';
                        };
                        echo '
                      </select>
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>
          
                      <div class="col-12 l-12">
                        <label for="address2" class="form-label">Description<span class="text-muted"></span></label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                     </div>
          
                     <div class="col-12">
                        <label for="email" class="form-label">Annexe <span class="text-muted">(Optional)</span></label>
                        <input type="text" name="annexe" class="form-control" id="email" >
                      </div>
                      
                      <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="vegan" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Vegan</label>
                    </div>
   
                    <hr class="my-4">     
                    <div id="divIngr"></div>
                   <hr class="my-4">
                    
                    
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Ajouter la recette</button>
                  </form>
                </div>
              </div>
          </div>
          <div id="igr"></div>';
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