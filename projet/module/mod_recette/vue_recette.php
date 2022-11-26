<?php
    require_once('vue_generique.php');
  
    class VueRecette extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
         
         /*------------afficher toutes les recettes-------------*/
         public function afficherMesRecette($tabR){    
            if($tabR == NULL){
               echo 'Aucune recette ';
           }else{
               foreach($tabR as $value){
                 if($value['photo'] != NULL){
                   $photo= $value['photo'];   
                }
                else{
                   $photo = 'plat.png';
                }
                   echo'
                 <div class="col"> 
                  <div class="card shadow-sm">            
                     <img src="image/image_recette/'.$photo.'"  width="100%" height="225">          
                    <div class="card-body">
                      <p class="card-text">'.$value['description'].'</p>                
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                         <a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>          
                          </div>
                        <div class="text-group">
                         <small class="text-muted">'.$value['tpsPreparration'].' mins</small>';
                         if($value['vegan'] == 1){
                         echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                         <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6ZM6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13Z"/>
                       </svg>';
                       }
                        echo '</div>
                        <small class="text-muted">'.$value['datePublication'].'</small>
                      </div>
                    </div>
                  </div>
                </div> ';
               }       
           }
         }

         /*-----------------------afficher les détails d'une recette-----------------------*/
         public function afficherMaRecette($recette, $photo, $Ingredient){
         
               echo'
         <section class="py-5">
         <div class="container px-4 px-lg-5 my-5">
         <div class="row gx-4 gx-lg-5 align-items-center">
             <div class="col-md-6">';

             if($photo['photo'] == NULL)
             echo '<img class="card-img-top mb-5 mb-md-0" src="image/image_recette/plat.png" alt="photo de la recette">';
             else
             echo '<img class="card-img-top mb-5 mb-md-0" src="image/image_recette/'.$photo['photo'].'" alt="photo de la recette">';
             echo '</div>
             <div class="col-md-6">
                 <h1 class="display-5 fw-bolder">'.htmlspecialchars($recette['titre']).'</h1>
                 <p class="lead">'.htmlspecialchars($recette['tpsPreparration']).' mins</p>
                 <div class="fs-5 mb-5">';
                 if($_SESSION['id']==$recette['idUtilisateur'])
                 echo '<a href="index.php?module=recette&action=AffichermodifierMaRecette&idRecette='.htmlspecialchars($recette['idRecette']).'">modifier recette </a>';
                  else
                 echo '<a href="index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur='.$recette['idUtilisateur'].'" ><input type="submit" value="voir profil"/></a>';
              
                 echo '</div>
                 <p class="lead">'.htmlspecialchars($recette['description']).'</p>';
                  if($recette['noteAnnexe'] != NULL){
                 echo '<hr class="my-4"><p class="lead">'.htmlspecialchars($recette['noteAnnexe']).'</p>';
                  }
                 echo '<h2>voici la liste des ingrédients</h2>';
                 foreach( $Ingredient as $value ){
                    echo '<br> '.htmlspecialchars($value['nomIngredient']).' : '.htmlspecialchars($value['Quantite']).' '.htmlspecialchars($value['unite']).'';
                 }
                  echo '

                 <div class="d-flex">';
                 if(isset($_SESSION['login'])){
                  echo'<div id="divBoutonDeLike">
                      </div>';
                 }
                 echo '<div id="nbLike">
           
                 </div>
                 
                     </button>
                 </div>
                 date de publication : '.$recette['datePublication'].'
             </div>
         </div>
     </div>
      </section>';
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
                  <form class="needs-validation" novalidate method="post" action="index.php?module=recette&action=ajouterRecetteDansLaBD&nbIngr='.$nbIngr.'" enctype="multipart/form-data">
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
                    <div id="divIngr">';
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
                    echo '</div>
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