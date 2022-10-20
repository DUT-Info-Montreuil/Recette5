<?php
    require_once('connexion.php'); 
    class ModeleRecette extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan){
        
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT idUtilisateur from Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            
             $sthh = $bdd->prepare("INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`) VALUES (NULL, ?,?, now(),?, ?, NULL, ?)");
             $sthh->execute(array($titre,$tpsPrepa,$description,$annexe,$row['idUtilisateur']));
        

                echo 'La recette est bien ajouté';
          
           
       
         } 

         public  function afficherMesrecette(){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT idUtilisateur from Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            $sthh = $bdd->prepare('SELECT * from Recette where idUtilisateur=?') ;
            $sthh->execute(array($row['idUtilisateur']));
            $rows= $sthh->fetchAll();
            return $rows;
         } 


         public function recupererListeIngredient(){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT * from Ingredient");
            $sth->execute();
            $rows = $sth->fetchAll();
            return $rows;
        }
        
    }
?>