<?php
class VueRecherche extends VueGenerique{

    public function __construct(){
        parent::__construct(); 
    }

    public function afficherRecette($tabR){
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
}


?>