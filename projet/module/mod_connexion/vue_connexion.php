<?php
    require_once('vue_generique.php');
  
    class VueConnexion extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();
             
         }
       
  
       
        public function afficher_form_inscription(){
            echo '</br>INSCRIPTION';
            
            echo'   <form method="post" action="index.php?module=connexion&action=inscription">
            Login : <input type="text" name="login">
            <br />
            Adresse mail : <input type="email" name="email">
            <br />
            Mot de passe : <input type="password" name="mdp">
            <br />
            <input type="submit" value="envoyer">
        </form>';
                     
        }


        public function afficher_form_connexion(){
            if($_SESSION['login']!=null){
                echo"Vous êtes déjà connecté";
            }else{  
                echo '</br>CONNEXION';
                echo'  </br></br>  <form method="post" action="index.php?module=connexion&action=connexion">
                Login ou Adresse mail <input type="text" name="login">
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