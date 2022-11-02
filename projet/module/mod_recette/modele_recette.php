<?php
    require_once('connexion.php'); 
    class ModeleRecette extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan,$nbingr){
            $bdd=parent::$bdd;
      
            
            $sth = $bdd->prepare("SELECT idUtilisateur from Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            
            $sth = $bdd->prepare("INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`) VALUES (NULL, ?,?, now(),?, ?, ?, ?)");
            $sth->execute(array($titre,$tpsPrepa,$description,$annexe,$vegan,$row['idUtilisateur']));
        

                echo 'La recette est bien ajouté';
          
           
       
         } 


         public function ajouterPhotoDansLaRecette($photo){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT MAX(idRecette) FROM Recette ");
            $sth->execute();
            $row = $sth->fetch();


            $sthh=$bdd->prepare("INSERT INTO `photo` (`idRecette`, `photo`) VALUES (?, ?)");
            $sthh->execute(array($row['MAX(idRecette)'],$photo));


         }


         public function afficherPhoto($recette){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT photo FROM photo where idRecette=? ");
            $sth->execute(array($recette));
            $row = $sth->fetch();
            return $row;

         }

         
         public function reccupererNbLike($recette){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(aime) FROM DonnerAvis where idRecette=? and aime=true ");
            $sth->execute(array($recette));
            $row = $sth->fetch();
            return $row;

         }

         public function ajouter_Ingredient_dans_recette($ingr,$quantite,$unite){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT MAX(idRecette) FROM Recette ");
            $sth->execute();
            $row = $sth->fetch();
        
             $sthh=$bdd->prepare("INSERT INTO `Utiliser` (`idRecette`, `idIngredient`, `Quantite`, `unite`) VALUES (?, ?, ?, ?)");
             $sthh->execute(array($row['MAX(idRecette)'],$ingr,$quantite,$unite));
        }



         public  function afficherMesrecette(){
            
        
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT idUtilisateur from Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            $sthh = $bdd->prepare('SELECT * from Recette natural join photo where idUtilisateur=?') ;
            $sthh->execute(array($row['idUtilisateur']));
            $rows= $sthh->fetchAll();
            return $rows;
          
         } 

       public function  afficherMaRecette($idRecette){
        $bdd=parent::$bdd;
        $sthh = $bdd->prepare('SELECT * from Recette where idRecette=?') ;
            $sthh->execute(array($idRecette));
            $rows= $sthh->fetch();
            return $rows;
       }


       public function  afficherIngredientDeMaRecette($idRecette){
        $bdd=parent::$bdd;
        $sth=$bdd->prepare("SELECT nomIngredient,unite,Quantite FROM Utiliser NATURAL JOIN Ingredient WHERE idRecette=?");
        $sth->execute(array($idRecette));
        $rows= $sth->fetchAll();
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