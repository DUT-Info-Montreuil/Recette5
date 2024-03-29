<?php
class VueRecherche extends VueGenerique{

    public function __construct(){
        parent::__construct(); 
    }

    public function afficherRecette($tabR){

      echo'<div width=100% align="center">
      <a href="index.php?module=recherche&action=toute&vegan=1&page=1">
      <button class="btn btn-success" type="button" >Vegan</button></a>
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Selectionner categorie</button>
      <a href="index.php?module=recherche&action=toute&page=1">
      <button class="btn btn-secondary" type="button" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
    </svg></button></a>
      </div>

      <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        
        <div class="offcanvas-body" id="selectionnerCategories" style="color:black;">
          
        </div>
      </div>';

        if($tabR == NULL){
            echo '<div align="center"><p class="text-muted">Aucune recette</p></div> ';
        }else{
            
            foreach($tabR as $value){
              if($value['photo'] != NULL){
                $photo= $value['photo'];
                
             }
             else{
                $photo = 'plat.png';
             }
                echo '
              <div class="col" >     
               <div class="card shadow-sm">         
                  <img src="image/image_recette/'.$photo.'"  width="100%" height="225">         
                 <div class="card-body">
                 <h1 class="card-text">'.substr($value['titre'],0,15).'</h1>';
                 if(strlen($value['titre']) > 15)
                    echo '...';
                 echo '<p class="card-text">'.substr($value['description'],0,39);
                   
                   if(strlen($value['description']) > 39)
                    echo '...';
                   echo '</p>
                   
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="btn-group">
                      <a href="index.php?module=recette&action=afficherMaRecette&idRecette='.htmlspecialchars($value['idRecette']).'"><button type="button" class="btn btn-sm btn-outline-secondary">Détails</button></a>';
                      if($value['vegan'] == 1){
                        echo '<button type="button" class="btn btn-sm btn-success" disabled>Vegan</button>';
                     }   
                        
                       echo '</div>
                     <div class="text-group">
                      <small class="text-muted">';
                      if(floor((htmlspecialchars($value['tpsPreparration'])/60)) != 0)
                        echo floor((htmlspecialchars($value['tpsPreparration'])/60)).'h';
                      echo (htmlspecialchars($value['tpsPreparration'])%60).'min</small>
                      
                     </div>
                     <small class="text-muted">'.htmlspecialchars($value['datePublication']).'</small>
                   </div>
                 </div>
               </div>
             </div> 
            
             
             ';
             
            }
            
        }
    }

    public function nbPage($nbPage, $url){
    echo '<nav aria-label="Page navigation example">
             <ul class="pagination" id="page">';
             for($n=0 ;$n<$nbPage ; $n++){
              echo '<li class="page-item"><a class="page-link" href="'.$url.'&page='.($n+1).'">'.($n+1).'</a></li>';
             }
            echo '</ul></nav>';

            }
}


?>