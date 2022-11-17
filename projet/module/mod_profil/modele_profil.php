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

        public function profilId($pro){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("SELECT * from Utilisateurs where idUtilisateur = ?");
            $sth->execute(array($pro));
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

        public function modifierDescription($des){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("UPDATE Utilisateurs SET description=? where login=?");
            $sth->execute(array($des, $_SESSION['login']));
        }

        public function modifierNomProfil($nom){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("SELECT count(*) from Utilisateurs where login=?");
            $sth->execute(array($nom));
            $row = $sth->fetch();
            if($row['count(*)']==0){
                $sth2 = $bdd->prepare("UPDATE Utilisateurs SET login=? where login=?");
                $sth2->execute(array($nom,$_SESSION['login']));
                $_SESSION['login'] = $nom;
            }else if($_SESSION['login'] != $nom){
                echo'nom d\'utilisateur déjà utiliser';
                header('index.php?module=profil&action=modiferProfil');
            }
        }

        public function modifierMotDePasse($old , $new , $new2){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("SELECT mdp from Utilisateurs where login=?");
            $sth->execute(array($_SESSION['login']));
            $row = $sth->fetch();
            if(!password_verify($old , $row['mdp'])){
                echo 'votre ancien mdp n\'est pas bon';
            }else if($new != $new2){
               echo 'vous avez mal confimer votre nouveau mdp';
            }else if($old==$new){
                echo 'votre nouveau mdp et pareil que l\'ancien';
            }else{
                $sth2 = $bdd->prepare("UPDATE Utilisateurs SET mdp=? where login=?");
                $sth2->execute( array ( password_hash($new,PASSWORD_ARGON2I) , $_SESSION['login'] ) );
                echo 'mot de passe changer';
            }
        }


        public function ajouterAmi ($idAmis){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("INSERT INTO EtreAmis values ( ? , ?)");
            $sth->execute(array($_SESSION['id'] , $idAmis));
        }

        public function voirAmis(){
            $bdd = parent::$bdd;
            $sth = $bdd->prepare("select * from EtreAmis inner join Utilisateurs on EtreAmis.idUtilisateur_1 = Utilisateurs.idUtilisateur  where EtreAmis.idUtilisateur = ?");
            $sth->execute(array($_SESSION['id'] ));
            $rows = $sth->fetchAll();
            return $rows;
        }
 
    }
?>