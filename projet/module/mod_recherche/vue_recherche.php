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
               
                echo 

                '<a href="index.php?module=recette&action=afficherMaRecette&idRecette='.$value['idRecette'].'"><div id="recette"><div class="photo">
                <img id="pho" alt="photo de la recette" src="image_recette/'.$value['photo'].'" >
                    </div>
                    <div class="info">
                        <h1>'.$value['titre'].'</h1>
                        <p>'.$value['description'].'</p>
                    </div>
                </div></a>';
             
            }
            
        }
    }
}


?>