<?php
    require_once('connexion.php'); 
    class ModeleAdmin extends Connexion{ 
        public function __construct() {
         
           
        }

        public function RecupererTousLesUtilisateurs(){
            $sthh = parent::$bdd->prepare("
            SELECT Utilisateurs.idUtilisateur,Utilisateurs.banni,Utilisateurs.login,Utilisateurs.photo,Utilisateurs.email,COUNT(Recette.idRecette),COUNT(commentaire.idCommentaire) 
            from Utilisateurs left JOIN Recette ON Utilisateurs.idUtilisateur=Recette.idUtilisateur 
            left join commentaire ON Utilisateurs.idUtilisateur=commentaire.idUtilisateur 
             GROUP BY Utilisateurs.idUtilisateur
             ") ;
            $sthh->execute();
            $listeUtilisateur= $sthh->fetchAll();
            return $listeUtilisateur;
        }


        public function RecupererTousLesCommentaires(){
            $sthh = parent::$bdd->prepare(" SELECT c.idCommentaire,c.commentaire,c.idUtilisateur,c.dateAjout,c.heureAjout,u.login,u.photo  FROM commentaire c NATURAL JOIN Utilisateurs u;") ;
            $sthh->execute();
            $listeCommentaire= $sthh->fetchAll();
            return $listeCommentaire;
        }
    
    }
?>