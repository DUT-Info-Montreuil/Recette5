<?php
    require_once('connexion.php'); 
    class ModeleRecherche extends Connexion{ 
        public function __construct() {
        
           
        }

        public function touteRecette(){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT * from Recette natural join photo') ;
            $sthh->execute(array());
            $rows= $sthh->fetchAll();
            return $rows;
        }

        public function trouverPhoto($idR){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare('SELECT photo from photo where idRecette = ?');
            $sth->execute(array($idR));
            $row = $sth->fetch();
            return $row;
        }
    }
?>