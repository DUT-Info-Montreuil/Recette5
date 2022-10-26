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

                '<div id="recette">
                    <div class="photo">
                        <img id=pho alt="photo de la recette" src="image/index.jpeg" >
                    </div>
                    <div class="info">
                        <h1>'.$value['titre'].'</h1>
                        <p>'.$value['description'].'</p>
                    </div>
                </div>';
            }
        }
    }
}


?>