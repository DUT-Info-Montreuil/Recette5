<?php
    require_once('connexion.php'); 
    class ModeleRecherche extends Connexion{ 
        private $nbRecette;
        public function __construct() {
            $this->nbRecette = 8;
        }

        public function touteRecette($nbR){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare("SELECT * from Recette natural join photo LIMIT :debut, $this->nbRecette") ;
            $sthh->bindParam(':debut', $nbR, PDO::PARAM_INT);
            $sthh->execute();
            $rows= $sthh->fetchAll();
            return $rows;
        }

        public function touteRecetteCat($cat,$nbR){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare("SELECT * from Recette natural join photo natural join Appartenir where idCategorie=:cat LIMIT :debut, $this->nbRecette") ;
            $sthh->bindParam(':cat', $cat, PDO::PARAM_INT);
            $sthh->bindParam(':debut', $nbR, PDO::PARAM_INT);
            $sthh->execute();
            $rows= $sthh->fetchAll();
            return $rows;
        }

        public function touteRecetteVegan($nbR){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare("SELECT * from Recette natural join photo where vegan=1 LIMIT :debut, $this->nbRecette") ;
            $sthh->bindParam(':debut', $nbR, PDO::PARAM_INT);
            $sthh->execute();
            $rows= $sthh->fetchAll();
            return $rows;
        }

        public function touteRecetteSousCat($sousCat,$nbR){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare("SELECT * from Recette natural join photo natural join Appartenir where idSousCategorie=:sousCat LIMIT :debut, $this->nbRecette") ;
            $sthh->bindParam(':sousCat', $sousCat, PDO::PARAM_INT);
            $sthh->bindParam(':debut', $nbR, PDO::PARAM_INT);
            $sthh->execute();
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

        public function nbPage(){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare('SELECT count(*) from Recette');
            $sth->execute();
            $row = $sth->fetch();
            return ceil($row['count(*)']/$this->nbRecette);
        }

        public function nbPageVegan(){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare('SELECT count(*) from Recette where vegan=1');
            $sth->execute();
            $row = $sth->fetch();
            return ceil($row['count(*)']/$this->nbRecette);
        }

        public function nbPageCat($cat){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT count(*) from Recette natural join Appartenir where idCategorie=?') ;
            $sthh->execute(array($cat));
            $rows= $sthh->fetch();
            return ceil($rows['count(*)']/$this->nbRecette);
        }

        public function nbPageSousCat($sousCat){
            $bdd=parent::$bdd;
            $sthh = $bdd->prepare('SELECT count(*) from Recette natural join Appartenir where idSousCategorie=?') ;
            $sthh->execute(array($sousCat));
            $rows= $sthh->fetch();
            return ceil($rows['count(*)']/$this->nbRecette);
        }
    }
?>