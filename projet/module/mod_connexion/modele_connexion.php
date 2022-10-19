<?php
    require_once('module/mod_joueurs/connection.php'); 
    class ModeleConnexion extends connection{ 
        public function __construct() {
         
           
        }
        public  function inscrire_dans_la_BD($login,$mdp,$email){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(login) from Utilisateurs where login=?");
            $sth->execute(array($login));
            $row = $sth->fetch();
            if($row["count(login)"]==1)
             echo"changer de nom d'utilisateur il est déja utiliser";
             else{
                $sth = $bdd->prepare("INSERT INTO utilisateurs (login, motDePasse,email) VALUES (?,?,?)");
                echo $login;
                $sth->execute(array($login,password_hash($mdp, PASSWORD_ARGON2I),$email));
                
             }
           
       
         } 


         public  function connexion_dans_la_BD($login,$mdp){
        
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(login) from Utilisateurs where login=?");
            $sth->execute(array($login));
            $row = $sth->fetch();
            if($row["count(login)"]==0)
             echo"changer de nom d'utilisateur inexistant";
             else{
            $sth = $bdd->prepare("SELECT * FROM utilisateurs where login=? ");
            $sth->execute(array($login));
            
            $row = $sth->fetch();
          
            
                if(password_verify($mdp, $row['motDePasse'])){
                    $_SESSION['login']=$row['login'];
                    echo 'connexion réeussi '.$row['login'].'';
                  
                }else{
                
                    echo"mdp incorretc";
                }         
            }
        }
            
       
        
    }
?>