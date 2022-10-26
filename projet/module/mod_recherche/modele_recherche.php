<?php
    require_once('connexion.php'); 
    class ModeleRecherche extends Connexion{ 
        public function __construct() {
        
           
        }

        public function touteRecette(){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT * from Recette') ;
            $sthh->execute(array());
            $rows= $sthh->fetchAll();
            return $rows;
        }
    }
?>