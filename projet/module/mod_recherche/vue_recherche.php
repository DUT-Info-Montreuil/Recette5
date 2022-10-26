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
                '<div class="recette">
                    <h1>'.$value['titre'].'</h1>
                    '.$value['description'].'
                </div>';
            }
        }
    }
}


?>