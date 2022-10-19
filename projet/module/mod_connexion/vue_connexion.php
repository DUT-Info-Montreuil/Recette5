<?php
    require_once('vue_generique.php');
  
    class VueConnexion extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
  
       
        public function afficher_form_inscription(){
            echo '</br>inscription';
            
            echo'   <form method="post" action="index.php?module=connexion&action=inscription">
            login : <input type="text" name="login">
            <br />
            Email : <input type="email" name="email">
            <br />
            Mot de passe : <input type="password" name="mdp">
            <br />
            <input type="submit" value="envoyer">
        </form>';
                     
        }


        public function afficher_form_connexion(){
            if($_SESSION['login']!=null){
                echo"vous êtes deja connecter";
            }else{
             
            echo '</br>connexion';
            echo'    <form method="post" action="index.php?module=connexion&action=connexion">
            Pseudo (a-z0-9) : <input type="text" name="login">
            <br />
            Mot de passe : <input type="password" name="mdp">
            <br />
            <input type="submit" value="submit">
        </form>';
            }
                     
        }


        public function menu(){
        
            
        }
    }
?>