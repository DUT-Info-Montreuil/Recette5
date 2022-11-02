<?php
    require_once('connexion.php'); 
    class ModeleProfil extends Connexion{ 
        public function __construct() {
  
        }  

        public function profil(){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("SELECT * from Utilisateurs where login = ?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            return $row;
        }

        public function modifierPhoto($photo){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("UPDATE Utilisateurs SET photo=? where login=?");
            $sth->execute(array($photo, $_SESSION['login']));
        }

        public function recupererPhotoActuelle(){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("SELECT photo FROM Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            return $row;
        }
       
    }
?>