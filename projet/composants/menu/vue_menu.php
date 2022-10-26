<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
            if($_SESSION['login'] != null){
            
            $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=bienvenue">Acceuil</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=recette&action=AfficherFormAjoutRecette">Ajouter Recette</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=recette&action=afficherMesRecette"> afficher Mes Recette</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=deconnexion">Deconnexion</a>';

           
            }else{

             $this->menu=  
             '<nav>
                <div class="onglets">
                    <a href="index.php?module=connexion&action=bienvenue">Acceuil</a>
                    <a href="index.php?module=recherche&action=toute">Recette</a>
                </div>
                <div class="profil">
                <a href="index.php?module=connexion&action=AfficherFormulaireConnexion">Se connexion</a>
                <a href="index.php?module=connexion&action=AfficherFormulaireInscription">S\'inscrire</a>
                </div>
             </nav>';
      
            }
            
            
        return $this->menu;
    }

}
?>