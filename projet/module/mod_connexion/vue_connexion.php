<?php
    require_once('vue_generique.php');
  
    class VueConnexion extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();         
         }
       
        public function afficher_form_inscription(){ 
            echo
            '  </br> </br><form method="post" action="index.php?module=connexion&action=inscription" >
            <h1>Inscrivez-vous</h1>
                <div class="separation"></div>
                <div class="corps-formulaire">
                    <div class="saisie">
                        <label>Login</label>
                        <input type="text" name="login">
                    </div>
                    <div class="saisie">
                        <label>Adresse mail</label>
                        <input type="email" name="email">
                    </div>   
                    <div class="saisie">
                        <label>Mot de passe</label>
                        <input type="password" name="mdp">
                    </div>    
                </div>
                <div class="button" align="center">
                    <button>Envoyer</button>
                </div>
            </form>';           
        }


        public function afficher_form_connexion(){
            if($_SESSION['login']!=null){
                echo"Vous êtes déjà connecté";
            }else{  
                echo
                '</br></br><form method="post" action="index.php?module=connexion&action=connexion" >
                <h1>Connectez-vous</h1>
                <div class="separation"></div>
                <div class="corps-formulaire">
                    <div class="saisie">
                        <label>Votre Login</label>
                        <input type="text" name="login">
                    </div>
                    <div class="saisie">
                        <label>Mot de passe</label>
                        <input type="password" name="mdp">
                    </div>    
                </div>
                <div class="button" align="center">
                    <button>Envoyer</button>
                </div>
                </form>';
            }          
        }


        public function menu(){
        }
    }
?>