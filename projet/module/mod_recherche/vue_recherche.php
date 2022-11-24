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