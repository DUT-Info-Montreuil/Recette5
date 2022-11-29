<?php
    require_once('connexion.php'); 
    class ModeleRecette extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function ajouter_recette_dans_la_BD($titre,$tpsPrepa,$description,$annexe,$vegan,$nbingr){

            $bdd=parent::$bdd;
            $sth2 = $bdd->prepare("INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`, ) VALUES (NULL, ?,?, now(),?, ?, ?, ?)");
            $sth2->execute(array($titre,$tpsPrepa,$description,$annexe,$vegan,$_SESSION['id']));
                echo 'La recette est bien ajouté';
          
           
       
         } 


         public function ajouterPhotoDansLaRecette($photo){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT MAX(idRecette) FROM Recette ");
            $sth->execute();
            $row = $sth->fetch();
            
            $sth2 = $bdd->prepare("SELECT MAX(idRecette) FROM photo");
            $sth2->execute();
            $row2 = $sth2->fetch();

            if($row['MAX(idRecette)'] == $row2['MAX(idRecette)']){
               echo 'cette recette possède déjà une photo';
            }else{

            $sthh=$bdd->prepare("INSERT INTO `photo` (`idRecette`, `photo`) VALUES (?, ?)");
            $sthh->execute(array($row['MAX(idRecette)'],$photo));
            }

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
            $sthh = parent::$bdd->prepare("SELECT * from Recette natural join photo where idUtilisateur=?") ;
            $sthh->execute(array($_SESSION['id']));
            $rows= $sthh->fetchAll();
            return $rows;
          
         } 

       public function  afficherMaRecette($idRecette){
         
        $bdd=parent::$bdd;
        $sthh = $bdd->prepare('SELECT * from Recette NATURAL join photo where idRecette=?') ;
            $sthh->execute(array($idRecette));
            $rows= $sthh->fetch();
            return $rows;
       }


       public function  afficherIngredientDeMaRecette($idRecette){
        $bdd=parent::$bdd;
        $sth=$bdd->prepare("SELECT nomIngredient,unite,Quantite FROM Utiliser NATURAL JOIN Ingredient WHERE idRecette=? ORDER BY idIngredient");
        $sth->execute(array($idRecette));
        $rows= $sth->fetchAll();
        return $rows;
       }


         public function recupererListeIngredient(){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT * from Ingredient");
            $sth->execute();
            $rows = $sth->fetchAll();

           global $ListIngredient;
           $ListIngredient=$rows;
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


      public function CommenterRecette($idRecette){
         $bdd=parent::$bdd;
         $row=$this->verifierSiUnAvisExiste($idRecette);
       
      }

      public function recetteLiker(){
         $bdd = parent::$bdd;

         $sth2 = $bdd->prepare("select Recette.idRecette ,titre,description,photo,datePublication,vegan,tpsPreparration from DonnerAvis inner join Recette on DonnerAvis.idRecette = Recette.idRecette inner join photo on DonnerAvis.idRecette = photo.idRecette where aime = 1 and DonnerAvis.idUtilisateur = ?");
         $sth2->execute(array($_SESSION['id']));
         $rows = $sth2->fetchAll();

         return $rows;

      }
   }

?>