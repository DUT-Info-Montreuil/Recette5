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
       
    }
?>