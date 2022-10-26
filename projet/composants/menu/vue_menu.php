<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
            if($_SESSION['login'] != null){
            $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=deconnexion">Deconnexion</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=bienvenue">Acceuil</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=recette&action=AfficherFormAjoutRecette">Ajouter Recette</a>';
            $this->menu= $this->menu."\n". '<a href="index.php?module=recette&action=afficherMesRecette"> afficher Mes Recette</a>';

           
            }else{
             $this->menu = $this->menu."\n".'<a href="index.php?module=connexion&action=AfficherFormulaireConnexion">Connexion</a>';
             $this->menu = $this->menu."\n".'<a href="index.php?module=connexion&action=AfficherFormulaireInscription">Inscription</a>';
      
            }
            
            
        return $this->menu;
    }

}
?>