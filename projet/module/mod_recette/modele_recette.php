<?php
    require_once('connexion.php'); 
    class ModeleRecette extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function ajouter_recette_dans_la_BD($login,$mdp,$email){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(login) from Utilisateurs where login=?");
            $sth->execute(array($login));
            $row = $sth->fetch();
            if($row["count(login)"]==1)
             echo"changer de nom d'utilisateur il est déja utiliser";
             else{
                $sth = $bdd->prepare("INSERT INTO Utilisateurs (login,mdp,email,idRole) VALUES (?,?,?,?)");
                echo $login;
                $sth->execute(array($login,password_hash($mdp, PASSWORD_ARGON2I),$email,NULL));
                echo 'vous ete bien inscrit';
             }
           
       
         } 

        
    }
?>