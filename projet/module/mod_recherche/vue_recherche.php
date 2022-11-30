<?php
class VueRecherche extends VueGenerique{

    public function __construct(){
        parent::__construct(); 
    }

    public function afficherRecette($tabR){
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
                 <h1 class="card-text">'.substr($value['titre'], 0, 15);
                 if(strlen($value['titre']) > 15)
                    echo '...';
                 echo '</h1><p class="card-text">'.substr($value['description'],0,39);
                   
                   if(strlen($value['description']) > 39)
                    echo '...';
                   echo '</p>
                   
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="btn-group">
                      <a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'"><button type="button" class="btn btn-sm btn-outline-secondary">Détails</button></a>';
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
                     <small class="text-muted">'.$value['datePublication'].'</small>
                   </div>
                 </div>
               </div>
             </div> ';
             
            }
            
        }
    }
}


?>