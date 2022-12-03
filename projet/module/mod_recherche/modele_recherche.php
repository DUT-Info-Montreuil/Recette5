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

        public function touteRecetteCat($cat){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT * from Recette natural join photo natural join Appartenir where idCategorie=?') ;
            $sthh->execute(array($cat));
            $rows= $sthh->fetchAll();
            return $rows;
        }

        public function touteRecetteSousCat($sousCat){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT * from Recette natural join photo natural join Appartenir where idSousCategorie=?') ;
            $sthh->execute(array($sousCat));
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