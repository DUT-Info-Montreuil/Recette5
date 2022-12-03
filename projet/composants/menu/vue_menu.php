<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){

            if(!isset($_SESSION['photo']))
                $photo = 'profil.png';
            else{
                $photo = $_SESSION['photo'];
            } 

            if($_SESSION['login'] != null){
            
            $this->menu=
            '<nav id="navbar" class="navbar navbar-expand-xxl navbar-dark bg-dark" aria-label="Seventh navbar example">
                <div class="container-fluid">
                <a class="navbar-brand" href="index.php?module=connexion&action=bienvenue"><img id="logo" alt="logo du site" src="image/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div  class="collapse navbar-collapse" id="navbarsExampleXxl" align="center">
                    <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?module=recherche&action=toute">Recette</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="index.php?module=recette&action=AfficherFormAjoutRecette">Ajouter Recette</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=recette&action=afficherLiker">Aimé</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="index.php?module=admin&action=acceuilAdmin">Espace Admin</a>
                 </li>
                    <li class="nav-item dropdown">
                        
                        <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"><img id="pp" alt="pp" src="image/image_utilisateur/'.$photo.'">'.$_SESSION['login'].'</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?module=profil&action=afficherProfil">Profil</a></li>
                        <li><a class="dropdown-item" href="index.php?module=recette&action=afficherMesRecettes">Mes recettes</a></li>
                        <li><a class="dropdown-item" href="index.php?module=profil&action=listeAmis">Amis</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>

                <div class="form-inline my-2 my-lg-0">
                    <div class="input-group">   
                        <input type="search" id="search" class="form-control rounded" placeholder="Recette"/>    
                    </div>

                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Search</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" id="black">voici les resultats</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="barreRecherche">
                        </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                </div>
            </nav>';

           
            }else{

             $this->menu=   

             '<nav id="navbar" class="navbar navbar-expand-xxl navbar-dark bg-dark" aria-label="Seventh navbar example">
             <div class="container-fluid">
             <a class="navbar-brand" href="index.php?module=connexion&action=bienvenue"><img id="logo" alt="logo du site" src="image/logo.png"></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div  class="collapse navbar-collapse" id="navbarsExampleXxl" align="center">
                 <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="index.php?module=recherche&action=toute">Recette</a>
                 </li>
                 <li class="nav-item">
                     <a  class="nav-link" href="index.php?module=connexion&action=AfficherFormulaireConnexion">Connexion</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="index.php?module=connexion&action=AfficherFormulaireInscription">Inscription</a>
                 </li>
                 </ul>
             </div>
             <div class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input type="search" id="search" class="form-control rounded" placeholder="Recette"/>
                    </div>

                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#search">Search</button>
                    <div class="modal fade" id="search" tabindex="-1" aria-labelledby="search" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="search" id="black">Voici les resultats</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="barreRecherche">
                        </div>
                        </div>
                    </div>
                    </div>

                    
                </div>
             </div>
         </nav>';
      
            }
            
            
        return $this->menu;
    }

}
?>