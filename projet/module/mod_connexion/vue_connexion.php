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
            <input type="hidden" name="token" value='.$_SESSION['token'].' >
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

                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">CONFIRMER VOTRE MOT DE PASSE</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="mdp2">
                </div>

                    <button type="submit" class="btn btn-primary">Inscription</button>
                    </div>
                </form>';           
        }


        public function afficher_form_connexion(){
            if($_SESSION['login']!=null){
                echo"<scirpt> Swal.fire('Vous êtes déja déconnecter')  
                setTimeout(
                   function() 
                   {
                   window.location.href = 'index.php?module=connexion&action=bienvenue';
                   }, 1000); </script>";
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
                    <input type="hidden" name="token" value='.$_SESSION['token'].' >
                </form>';
            }          
        }

        public function bienvenue(){
            echo '<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" align="center">
                <img src="image/test.webp" class="d-block w-80" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Bienvenue dans Recette5</h5>
                </div>
              </div>
              <div class="carousel-item" align="center">
                <img src="image/oui.webp" class="d-block w-80" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Des recettes pour touse</h5>
                </div>
              </div>
              <div class="carousel-item" align="center">
                <img src="image/dessert.webp" class="d-block w-80" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Dans le partage</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>';
        }


    }
?>