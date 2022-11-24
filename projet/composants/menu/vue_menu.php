<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
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
                        <a  class="nav-link" href="index.php?module=recette&action=choisirNbIngredient">Ajouter Recette</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?module=recette&action=afficherLiker">Aimé</a>
                    </li>
                    <li class="nav-item dropdown">
                        
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img id="pp" alt="pp" src="image/image_utilisateur/'.$_SESSION['photo'].'">'.$_SESSION['login'].'</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?module=profil&action=afficherProfil">Profil</a></li>
                        <li><a class="dropdown-item" href="index.php?module=recette&action=afficherMesRecette">Mes recettes</a></li>
                        <li><a class="dropdown-item" href="index.php?module=profil&action=listeAmis">Amis</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>

                <form  class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="recette" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
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
             <form  class="form-inline my-2 my-lg-0">
                 <input class="form-control mr-sm-2" type="search" placeholder="recette" aria-label="Search">
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
             </form>
             </div>
         </nav>';
      
            }
            
            
        return $this->menu;
    }

}
?>