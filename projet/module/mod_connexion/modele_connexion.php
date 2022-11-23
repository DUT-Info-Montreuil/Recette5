<?php
    require_once('connexion.php'); 
    class ModeleConnexion extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function inscrire_dans_la_BD($login,$mdp,$email){
            $tro = parent::$bdd->prepare("SELECT count(login) FROM Utilisateurs WHERE login = ?");
            $tro->execute(array($login));
            $row = $tro->fetch();
            if($row["count(login)"] == "0"){
                $che = parent::$bdd->prepare("SELECT count(email) FROM Utilisateurs WHERE email=?");
                $che->execute(array($email));
                $row2 = $che->fetch();
                if($row2["count(email)"] == "0"){
                    $sth = parent::$bdd->prepare("INSERT INTO Utilisateurs (login,mdp,email,idRole) VALUES (?,?,?,?)");
                    $sth->execute(array($login,password_hash($mdp,PASSWORD_ARGON2I),$email,NULL));
                    echo 'Bienvenue sur notre site : '.$login;
                }else{
                    echo 'Adresse mail déjà utilisé';
                }
            }else{
                echo 'Login déjà utilisé</br>';
            }
        } 


         public  function connexion_dans_la_BD($login,$mdp){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(login) FROM Utilisateurs WHERE login=? OR email=?");
            $sth->execute(array($login,$login));
            $row = $sth->fetch();
            if($row["count(login)"]==0 || $login==NULL)
                echo" nom d'utilisateur ou email inexistant ";
            else{
            $sth = $bdd->prepare("SELECT * FROM Utilisateurs WHERE login=? OR email=?");
            $sth->execute(array($login,$login));
            $row = $sth->fetch();
                if(password_verify($mdp, $row['mdp'])){
                    $_SESSION['login']=$row['login'];
                    $_SESSION['id']=$row['idUtilisateur'];
                    $_SESSION['photo'] = $row['photo'];
                    echo 'connexion réeussi '.$row['login'].'';
                  
                }else{
                    echo"mot de passe incorrecte";
                }         
            }
        }
            
       
        
    }
?>