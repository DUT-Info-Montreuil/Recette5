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
         public function modifierPhotoDansLaRecette($photo,$anciennePhoto){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("UPDATE photo SET photo=?  where photo=? ");
            $sth->execute(array($photo,$anciennePhoto));
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
    
        public function modifierMaRecette($idRecette,$titre,$tpsPrepa,$description,$annexe,$vegan){
         $bdd=parent::$bdd;
         $sth = $bdd->prepare("UPDATE `Recette` SET `titre` = ?, `tpsPreparration` = ?, `description` = ?, `noteAnnexe` = ?,`vegan` = ?  WHERE `Recette`.`idRecette` = ?;");
         $sth->execute(array($titre,$tpsPrepa,$description,$annexe,$vegan,$idRecette));
         echo 'La recette a bien été modifier';
        }


        public function recupererIdDuPropietaireDeLaRecette($idRecette){
         $bdd=parent::$bdd;
         $sth = $bdd->prepare("SELECT idUtilisateur from Recette  where idRecette=?");
         $sth->execute(array($idRecette));
         $row=$sth->fetch();
         return $row['idUtilisateur'];
        }

        public function verifierSiRecetteExiste($idRecette){
         $bdd=parent::$bdd;
         $sth = $bdd->prepare("SELECT * from Recette  where idRecette=?");
         $sth->execute(array($idRecette));
         $row=$sth->fetch();
         if($row==null){
            return 0;
         }else{
            return 1;
         }
        
        }

        public function verifierSiUnAvisExiste($idRecette){
         $bdd=parent::$bdd;
   
         $sth=$bdd->prepare("SELECT * FROM DonnerAvis WHERE idUtilisateur=?AND idRecette=?");
         $sth->execute(array($_SESSION['id'],$idRecette));
         $row = $sth->fetch();
         return $row;
      }
    

      public function likerLaRecette($idRecette){
         $bdd=parent::$bdd;
         $row=$this->verifierSiUnAvisExiste($idRecette);
         if($row==null){
            $sth=$bdd->prepare("INSERT INTO `DonnerAvis` (`idUtilisateur`, `aime`, `idRecette`) VALUES (?,1,?);");
            $sth->execute(array($_SESSION['id'],$idRecette));
         }
         
         else{

            $sth=$bdd->prepare("UPDATE `DonnerAvis` SET `aime` = '1' WHERE `DonnerAvis`.`idUtilisateur` = ? AND `DonnerAvis`.`idRecette` = ?;");
            $sth->execute(array($_SESSION['id'],$idRecette));
         }
         header('location:index.php?module=recette&action=afficherMaRecette&idRecette='.$idRecette.'');
      }

      public function RetirerLikeRecette($idRecette){
         $bdd=parent::$bdd;
         $sth=$bdd->prepare("UPDATE `DonnerAvis` SET `aime` = '0' WHERE `DonnerAvis`.`idUtilisateur` = ? AND `DonnerAvis`.`idRecette` = ?;");
         $sth->execute(array($_SESSION['id'],$idRecette));
         header('location:index.php?module=recette&action=afficherMaRecette&idRecette='.$idRecette.''); 
      }

   

      public function verifierLike($idRecette){
         
         $row=$this->verifierSiUnAvisExiste($idRecette);

         if($row==null){
            return 0;
         }else{
            if($row['aime']==1){
               return 1;
            }else{
               return 0;
            }
         }
      }


      public function CommenterRecette($idRecette){
         $bdd=parent::$bdd;
         $row=$this->verifierSiUnAvisExiste($idRecette);
       
      }
   }

?>