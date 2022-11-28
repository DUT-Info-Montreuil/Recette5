<?php
    require_once('vue_generique.php');
  
    class VueConnexion extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();         
         }
       
        public function afficher_form_inscription(){ 
            echo
            '
            <form method="post" action="index.php?module=connexion&action=inscription">
                
                <div class="form" align="center">
                <h1>INSCRIVEZ-VOUS</h1>
                    <div class="mb-3" >
                        <label for="exampleInputEmail1" class="form-label">LOGIN</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ADRESSE MAIL</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">MOT DE PASSE</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-primary">Inscription</button>
                    </div>
                </form>';           
        }


        public function afficher_form_connexion(){
            if($_SESSION['login']!=null){
                echo"Vous êtes déjà connecté";
            }else{  
                echo
                '
                
                <form method="post" action="index.php?module=connexion&action=connexion">
                
                <div class="form" align="center">
                <h1>CONNECTEZ-VOUS</h1>
                    <div class="mb-3" >
                        <label for="exampleInputEmail1" class="form-label">LOGIN</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">MOT DE PASSE</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </form>';
            }          
        }

        public function bienvenue(){
            echo '<div align="center" id="bvn">
            <h1 id="bienvenue">BIENVENUE SUR NOTRE SITE</h1>
            </div>';
        }


    }
?>